<?php

$c_id = "";

if(isset($_GET['id'])){
    $c_id = $_GET['id'];
}
include '../../includes/db.php';

$sql1 = "DELETE FROM products WHERE category_id = $c_id";
$conn->query($sql1);

$sql2 = "DELETE FROM categories WHERE id = $c_id";
$conn->query($sql2);

header("location: ../../categories.php");
exit;

?>