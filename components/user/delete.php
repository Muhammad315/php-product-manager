<?php

$u_id = "";

if(isset($_GET['id'])){
    $u_id = $_GET['id'];
}
include '../../includes/db.php';

$sql = "DELETE FROM users WHERE id = $u_id";
$conn->query($sql);

header("location: ../../users.php");
exit;

?>