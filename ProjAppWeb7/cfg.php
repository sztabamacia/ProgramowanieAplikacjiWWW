<?php
$servername = "localhost";
$login = "root"; 
$pass = ""; 
$dbname = "moja_strona164434";

// Tworzenie połączenia
$conn = new mysqli($servername, $login, $pass,$dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
