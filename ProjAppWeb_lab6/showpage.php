<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include 'cfg.php';

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($database_name); // Dodaj tę linię

$strona = isset($_GET['idp']) ? $_GET['idp'] : '';

$query = "SELECT * FROM page_list WHERE page_title = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $strona);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<h1>' . $row['page_title'] . '</h1>';
    echo $row['page_content'];
} else {
    echo 'Strona nie istnieje.';
}

$stmt->close();
$conn->close();
?>
