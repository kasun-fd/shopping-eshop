<?php
include "./connection.php";
session_start();

$id = $_GET["x"];

setcookie("category_num", $id, time() + (60 * 60 * 24 * 365 * 10));

$query = Database::search("SELECT * FROM category WHERE `cat_id` = '".$id."'");
$data = $query->fetch_assoc();

$_SESSION["j"] = $data["cat_name"];

echo "success";
