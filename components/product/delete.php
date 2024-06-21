<?php

$p_id = "";

if(isset($_GET['id'])){
    $p_id = $_GET['id'];
}
include '../../includes/db.php';

$sql = "DELETE FROM products WHERE id = $p_id";
$conn->query($sql);

header("location: ../../products.php");
exit;

?>