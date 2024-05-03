<?php
include "./connection.php";
session_start();

$id = $_GET["x"];

$brand_query = Database::search("SELECT * FROM brand WHERE `product_id` = '" . $id . "'");
$data_brand = $brand_query->fetch_assoc();
$_SESSION["j"] = $data_brand["brand_name"];

$query = Database::search("SELECT * FROM product WHERE `id` = '" . $id . "'");
$data = $query->fetch_assoc();

// $query_2 = Database::search("SELECT * FROM product WHERE `category_cat_id` = '".$data["category_cat_id"]."'");
// $data_2 = $query_2->fetch_assoc();
$cat = $data["category_cat_id"];

setcookie("category_num", $cat, time() + (60 * 60 * 24 * 365 * 10));


echo "success";
