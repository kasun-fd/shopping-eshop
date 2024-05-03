<?php
include "./connection.php";
session_start();

$id = $_GET["id"];

$query = Database::search("SELECT * FROM `order` WHERE `id_order` = '".$id."'");

$data = $query->fetch_assoc();

Database::iud("UPDATE user SET `block_status_user` = 0 WHERE `email` = '".$data["customer_email"]."'");

echo "success";

?>