<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <link rel="stylesheet" type="text/css" href="./css/contact.css">
</head>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Wczytanie pliku z konfiguracją
include('cfg.php');

// Wczytanie wymaganych klas PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

//===========================================================
// funkcja PokazKontakt wyświetla po wywołaniu formularz,
// który wypełniamy w celu wysłania maila pod wskazany adres
//===========================================================

function PokazKontakt()
{
    echo '
    <form method="post">
        <label for="imie">Imie</label>
        <input type="text" name="imie" required><br>

        <label for="email">Adres e-mail:</label>
        <input type="email" name="email" required><br>

        <label for="temat">Temat:</label>
        <input type="text" name="temat" required><br>

        <label for="wiadomosc">Wiadomość</label>
        <textarea name="wiadomosc" required></textarea><br>

        <input type="submit" name="wyslij" value="Wyslij">
    </form>
    ';
}

//===========================================================
// funkcja WyslujMailKontakt tworzy wiadomość email z danych
// zebranych w formularzu, a następnie wysyła wiadomość do
// podanego odbiorcy
//===========================================================


function WyslijMailKontakt()
{

    global $config;

    $odbiorca = "jddisy@gmail.com";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wyslij'])) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();
            $mail->Host = $config['smtp_host'];
            $mail->SMTPAuth = $config['smtp_auth'];
            $mail->Username = $config['smtp_username'];
            $mail->Password = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port = $config['smtp_port'];

            $mail->setFrom($_POST['email'], $_POST['imie']);
            $mail->addAddress($odbiorca);

            $mail->isHTML(false);
            $mail->Subject = $_POST['temat'];
            $mail->Body = $_POST['wiadomosc'];

            $mail->send();
            echo '<p class="success">Wiadomość została wysłana.</p>';
        } catch (Exception $e) {
            echo '<p class="error">Błąd: Wiadomość nie została wysłana. Mailer Error:. </p> ' . $mail->ErrorInfo;
        }
    } else {
        echo '<p class="tilt_user">Wypełnij wszystkie pola.</p>';
    }
}

//===========================================================
// Wywołanie funkcji PokazKontakt i WyslijMailKontakt
//===========================================================


PokazKontakt();

WyslijMailKontakt();

//===========================================================
// funkcja Zapomniane_haslo wyświetla po wywołaniu formularz,
// który wypełniamy w celu wysłania maila pod wskazany adres,
// który zawiera informacje o haśle, którego zapomnieliśmy
//===========================================================


function Zapomniane_haslo()
{
    $wynik = '
    <div class="Zapomniane_haslo">
        <h1 class="heading">wyslij mail:</h1>
        <div class="formularzZapomniane">
            <form method="post" name="mail" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="formularz">
                    <tr><td class="for4_t">email:</td><td><input type="text" name="emailf" class="formularzZapomniane" /></td></tr>
                    <tr><td class="for4_t">na jaki mail?:</td><td><input type="text" name="emaild" class="formularzZapomniane" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x5_submit" class="formularzZapomniane" value="wyslij" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

//===========================================================
// funkcja PrzypomnijHaslo tworzy i wysyła na email podany
// w formularzu wiadomość, zawierającą brakujące hasło
//===========================================================


function PrzypomnijHaslo()
{
    global $link;
    echo Zapomniane_haslo();
    global $config;

    if (isset($_POST['x5_submit'])) {
        $email = $_POST['emailf'];
        $emaild = $_POST['emaild'];
        $query = "SELECT haslo FROM tabela_uzytkownikow WHERE email = '$email' LIMIT 1";

        $wynik = mysqli_query($link, $query);

        if (mysqli_num_rows($wynik) > 0) {
            $row = mysqli_fetch_assoc($wynik);
            $haslo = $row['haslo'];

            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = $config['smtp_host'];
                $mail->SMTPAuth = $config['smtp_auth'];
                $mail->Username = $config['smtp_username'];
                $mail->Password = $config['smtp_password'];
                $mail->SMTPSecure = $config['smtp_secure'];
                $mail->Port = $config['smtp_port'];

                $mail->setFrom($config['smtp_username'], 'Formularz kontaktowy');
                $mail->addAddress($emaild);

                $mail->isHTML(false);
                $mail->Subject = 'Przypomnienie hasła';
                $mail->Body = 'Twoje hasło: ' . $haslo;

                $mail->send();
                echo '[wiadomosc_wyslana]';
                header("Location: wyslij.php");
                exit();
            } catch (Exception $e) {
                echo 'Wiadomość nie została wysłana: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'Podany email nie istnieje w bazie danych.';
        }

        mysqli_close($link);
    } else {
        echo 'Wypełnij pola.';
    }
}



?>
</body>
</html>