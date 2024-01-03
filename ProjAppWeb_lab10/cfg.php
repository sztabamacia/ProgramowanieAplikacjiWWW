<?php

//=====================================================
// deklarujemy tu zmienne używane potem w programie
// służące do łączenia się z bazą danych, logowania
//=====================================================


$servername = "localhost";
$login = "root"; 
$pass = ""; 
$dbname = "moja_strona164434";

//=====================================================
// Tworzymy zmienną typu tablicowego do przechowywania
// informacji wykorzystywanych przez contact.php
//=====================================================


$config = array(
    'smtp_host' => 'smtp.gmail.com',
    'smtp_auth' => true,
    'smtp_username' => 'x',
    'smtp_password' => 'x ',
    'smtp_secure' => 'tls',
    'smtp_port' => 587,
);


// Tworzymy połączenie z bazą danych
$conn = new mysqli($servername, $login, $pass,$dbname);

// Sprawdzamy połączenie z bazą danych
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
