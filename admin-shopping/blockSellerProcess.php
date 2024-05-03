<?php
include "./connection.php";
session_start();

$id = $_GET["id"];

$query = Database::search("SELECT * FROM product WHERE `id` = '".$id."'");

$data = $query->fetch_assoc();

Database::iud("UPDATE seller SET `block_status` = 1 WHERE `email` = '".$data["user_email"]."'");

echo "success";

?>