<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pms_db_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
