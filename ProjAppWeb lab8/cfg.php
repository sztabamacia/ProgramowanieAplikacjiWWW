<?php
$servername = "localhost";
$login = "root"; 
$pass = ""; 
$dbname = "moja_strona164434";

$config = array(
    'smtp_host' => 'smtp.gmail.com',
    'smtp_auth' => true,
    'smtp_username' => 'x',
    'smtp_password' => 'x ',
    'smtp_secure' => 'tls',
    'smtp_port' => 587,
);

// cos 

// Tworzenie połączenia
$conn = new mysqli($servername, $login, $pass,$dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
