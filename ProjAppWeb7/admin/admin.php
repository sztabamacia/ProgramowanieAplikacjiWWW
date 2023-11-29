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
        <input type="password" name="pass" required><br>
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
    echo 'Zalogowano. Dalsze metody administracyjne.';
}








?>