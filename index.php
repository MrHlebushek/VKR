<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Ошибка: " . $conn->connect_error);
}

$conn->set_charset("utf");

echo "Подключено"
?>
