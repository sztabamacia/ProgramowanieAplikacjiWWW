<?php
$servername = "localhost";
$username = "root"; // Tutaj ustaw nazwę użytkownika
$password = ""; // Tutaj ustaw hasło
$dbname = "moja_strona164434";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password,$dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
