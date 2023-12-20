<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

<?php
session_start();
include('../cfg.php');
//=============================================================
// Funkcja FormularzLogowania po wywołaniu wyświetli nam 
// formularz do zalogowania się
//=============================================================

function FormularzLogowania()
{
    echo '
    <form method="post" name="logowanie">
        <label for="login">Login:</label>
        <input type="text" name="login" required><br>
        <label for="pass">Hasło:</label>
        <input type="password" name="pass"><br>
        <input type="submit" value="Zaloguj">
    </form>
    ';
}

//Sprawdzamy poprawność danych w formularzu logowania i jeżeli
// dane są poprawne zostajemy zalogowani, w przeciwnym razie
// otrzymujemy komunikat "Błąd logowania. Spróbuj ponownie."

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === $login && $_POST['pass'] === $pass) {
        $_SESSION['logged_in'] = true;
        echo '<p>Zalogowano pomyślnie.</p><br />';
    } else {

        echo '<p>Błąd logowania. Spróbuj ponownie.</p>';
        FormularzLogowania();
    }
}
// jeżeli nie jesteśmy zalogowani zostaje wyświetlony formularz logowania

elseif (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    FormularzLogowania();
}
// jeśli jesteśmy zalogowani wypisuje nam się taki komunikat
else {
    echo '<p>Zalogowano. Dalsze metody administracyjne.</p><br />';
}

//=================================================================
// Funkcja ListaPodstron po wywołaniu łączy się z naszą bazą danych 
// i wypisuje nam listę podstron w postaci: ID  Tytuł_podstrony
//=================================================================



function ListaPodstron($conn)
{
    if (!isset($_SESSION['status']) || $_SESSION['status'] == 1) {
        $query = "SELECT * FROM page_list ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        echo '<div class="lista">';
        echo '<p>ID tytuł</p>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<p class="item">'. $row['id'] . ' ' . $row['page_title'] .'</p>';
        }
        echo '</div>';
    }
}

//=============================================================
// Funkcja FormularzEdycji po wywołaniu zwróci nam 
// formularz do edytowania wybranej przez nas podstrony
//=============================================================


function FormularzEdycji()
{
    $edit = '
    <div class="edycja">
        <h1 class="heading"><b>Edytuj podstronę<b/></h1>
            <form method="post" name="EditForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="edycja">
                    <tr><td class="edit_4t"><b>Id podstrony: <b/></td><td><input type="text" name="id_strony" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Treść podstrony: <b/></td><td><input type="text" name="page_contetnt" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status" class="edycja" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x2_submit" class="edycja" value="zmien" /></td></tr>
                </table>
            </form>
    </div>
    ';

    return $edit;
}

//=============================================================
// Funkcja EdytujPodstronę zmieni nam podstronę o id podanym 
// w formularzu tak, jak chcieliśmy wypełniając formularz.
// Jeżeli podaliśmy id podstrony, który nie istnieje funkcja 
// nie zrobi nic.
//=============================================================


function EdytujPodstrone()
{
    global $conn;

    if (isset($_POST['x2_submit'])) {
        $id = $_POST['id_strony'];
        $tytul = $_POST['page_title'];
        $tresc = $_POST['page_contetnt'];
        $status = isset($_POST['status']) ? 1 : 0;

        if (!empty($id)) {
            $query = "UPDATE page_list SET page_title = '$tytul', page_contetnt = '$tresc', status = $status WHERE id = $id LIMIT 1";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Edycja zakończona pomyślnie!";
                header("Location: admin.php");
                exit();
            } else {
                echo "Błąd podczas edycji: " . mysqli_error($conn);
            }
        }
    }
}

//=============================================================
// Funkcja FormularzDodawania po wywołaniu zwróci nam 
// formularz do dodania nowej podstrony
//=============================================================


function FormularzDodawania()
{
    $add = '
    <div class="dodaj">
        <h1 class="heading"><b>Dodaj podstronę<b/></h1>
            <form method="post" name="AddForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="dodaj">
                    <tr><td class="add_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t"><b>Treść podstrony: <b/></td><td><input type="text" name="page_contetnt_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status_add" class="dodaj" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x3_submit" class="dodaj" value="dodaj" /></td></tr>
                </table>
            </form>
    </div>
    ';

    return $add;
}


//=============================================================
// Funkcja DodajNowaPodstrone utworzy nam podstronę o następnym 
// id (auto increment), ze tytułem i zawartością 
// tak, jak chcieliśmy wypełniając formularz.
//=============================================================


function DodajNowaPodstrone()
{
    global $conn;
    if (isset($_POST['x3_submit'])) {
        $tytul = $_POST['page_title_add'];
        $tresc = $_POST['page_contetnt_add'];
        $status = isset($_POST['status_add']) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_contetnt, status) VALUES ('$tytul', '$tresc', $status)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Pomyślnie dodano podstronę!";
            header("Location: admin.php");
            exit();
        } else {
            echo "Błąd podczas dodawania podstrony: " . mysqli_error($conn);
        }
    }
}

//=============================================================
// Funkcja FormularzUsuwania po wywołaniu zwróci nam 
// formularz do usunięcia istniejącej już podstrony
//=============================================================


function FormularzUsuwania()
{
    $remove = '
    <div class="usun">
        <h1 class="heading"><b>Usuń podstronę<b/></h1>
            <form method="post" name="DeleteForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="usun">
                    <tr><td class="rem_4t"><b>Id podstrony: <b/></td><td><input type="text" name="id_remove" class="usun" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x4_submit" class="usun" value="usun" /></td></tr>
                </table>
            </form>
    </div>
    ';

    return $remove;
}

//=============================================================
// Funkcja UsunPodstrone usunie z bazy danych podstronę o id,
// które podaliśmy wypełniając formularz.
//=============================================================


function UsunPodstrone()
{
    global $conn;
    if (isset($_POST['x4_submit'])) {
        $id = $_POST['id_remove'];

        $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Pomyślnie usunięto podstronę!";
            header("Location: admin.php");
            exit();
        } else {
            echo "Błąd podczas usuwania podstrony: " . mysqli_error($conn);
        }
    }
}

//=============================================================
// Funkcja wylogowuje użytkownika z systemu.
//=============================================================



function Wyloguj()
{
    session_start();
    session_destroy();
    header('Location: admin.php');
    exit();
}

//================================================================
// Funkcja WylogujButton wyświetla nam przycisk do wylogowania się
//================================================================


function WylogujButton()
{
    echo '<form method="get">
            <input name="akcja" type="submit" value="wyloguj" />
          </form>';
}

//================================================================
// Jeżeli użyliśmy przycisku do wylogowania się program wywoła 
// funkcję Wyloguj, która wyloguje nas z systemu
//================================================================


if(isset($_GET['akcja']) && $_GET['akcja']=='wyloguj')
{
    Wyloguj();
}

//=================================================================
// Jeżeli jesteśmy zalogowani, program wyświetla nam listę podstron,
// a także formularze do dodawania, edycji i usunięcia podstrony, 
// przycisk wylogowania oraz wywoła funkcje oczekujące 
// na potwierdzenie danych poszczególnych formularzy
//=================================================================


if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    ListaPodstron($conn);
    echo FormularzEdycji();
    EdytujPodstrone();
    echo FormularzDodawania();
    DodajNowaPodstrone();
    echo FormularzUsuwania();
    UsunPodstrone();
    WylogujButton();

}









?>
</body>
</html>