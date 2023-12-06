<?php
session_start();
include('cfg.php');

function FormularzLogowania()
{
    echo '
    <form method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" required><br>
        <label for="pass">Hasło:</label>
        <input type="password" name="pass"><br>
        <input type="submit" value="Zaloguj">
    </form>
    ';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === $login && $_POST['pass'] === $pass) {
        $_SESSION['logged_in'] = true;
        echo 'Zalogowano pomyślnie.';
    } else {

        echo 'Błąd logowania. Spróbuj ponownie.';
        FormularzLogowania();
    }
}
 elseif (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    FormularzLogowania();
} 
else {
    echo 'Zalogowano. Dalsze metody administracyjne.<br />';
}

function ListaPodstron($conn)
{
    if (!isset($_SESSION['status']) || $_SESSION['status'] == 1) {
        $query = "SELECT * FROM page_list ORDER BY id ASC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo $row['id'] . ' ' . $row['page_title'] . '<br/>';
        }
    }
}

function FormularzEdycji()
{
    $edit = '
    <div class="edycja">
        <h1 class="heading"><b>Edytuj podstronę<b/></h1>
        <div class="edycja">
            <form method="post" name="EditForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="edycja">
                    <tr><td class="edit_4t"><b>Id podstrony: <b/></td><td><input type="text" name="id_strony" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Treść podstrony: <b/></td><td><input type="text" name="page_content" class="edycja" /></td></tr>
                    <tr><td class="edit_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status" class="edycja" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x2_submit" class="edycja" value="zmien" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $edit;
}

function EdytujPodstrone()
{
    global $conn;

    if (isset($_POST['x2_submit'])) {
        $id = $_POST['id_strony'];
        $tytul = $_POST['page_title'];
        $tresc = $_POST['page_content'];
        $status = isset($_POST['status']) ? 1 : 0;

        if (!empty($id)) {
            $query = "UPDATE page_list SET page_title = '$tytul', page_content = '$tresc', status = $status WHERE id = $id LIMIT 1";

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


function FormularzDodawania()
{
    $add = '
    <div class="dodaj">
        <h1 class="heading"><b>Dodaj podstronę<b/></h1>
        <div class="dodaj">
            <form method="post" name="AddForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="dodaj">
                    <tr><td class="add_4t"><b>Tytuł podstrony: <b/></td><td><input type="text" name="page_title_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t"><b>Treść podstrony: <b/></td><td><input type="text" name="page_content_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t"><b>Status podstrony: <b/></td><td><input type="checkbox" name="status_add" class="dodaj" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x3_submit" class="dodaj" value="dodaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $add;
}

function DodajNowaPodstrone()
{
    global $conn;
    if (isset($_POST['x3_submit'])) {
        $tytul = $_POST['page_title_add'];
        $tresc = $_POST['page_content_add'];
        $status = isset($_POST['status_add']) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
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


function FormularzUsuwania()
{
    $remove = '
    <div class="usun">
        <h1 class="heading"><b>Usuń podstronę<b/></h1>
        <div class="usun">
            <form method="post" name="DeleteForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="usun">
                    <tr><td class="rem_4t"><b>Id podstrony: <b/></td><td><input type="text" name="id_remove" class="usun" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x4_submit" class="usun" value="usun" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $remove;
}

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



if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    ListaPodstron($conn);
    echo FormularzEdycji();
    EdytujPodstrone();
    echo FormularzDodawania();
    DodajNowaPodstrone();
    echo FormularzUsuwania();
    UsunPodstrone();
}









?>