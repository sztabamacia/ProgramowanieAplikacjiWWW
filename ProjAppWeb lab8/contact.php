<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('cfg.php');

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';


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
            echo 'Wiadomość została wysłana.';
        } catch (Exception $e) {
            echo 'Błąd: Wiadomość nie została wysłana. Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Wypełnij wszystkie pola.';
    }
}



PokazKontakt();

WyslijMailKontakt();

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
