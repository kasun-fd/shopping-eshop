<?php
include "./connection.php";
session_start();

$text = $_GET["text"];

$query = Database::search("SELECT * FROM brand WHERE `brand_name` = '" . $text . "'");

$query_2 = Database::search("SELECT * FROM model WHERE `model_name` = '".$text."'");

$_SESSION["j"] = $data_1["brand_name"];
$_SESSION["j"] = $data_2["model_name"];

if ($query->num_rows > 0) {
    $data_1 = $query->fetch_assoc();
    $_SESSION["j"] = $data_1["brand_name"];
    $product_query_1 = Database::search("SELECT * FROM product WHERE `id` = '" . $data_1["product_id"] . "'");
    $product_data_1 = $product_query_1->fetch_assoc();
    $cat = $product_data_1["category_cat_id"];
    setcookie("category_num", $cat, time() + (60 * 60 * 24 * 365 * 10));
    echo "success";
}else if($query_2->num_rows > 0){
    $data_2 = $query_2->fetch_assoc();
    $_SESSION["j"] = $data_2["model_name"];
    $product_query_2 = Database::search("SELECT * FROM product WHERE `id` = '" . $data_2["product_id"] . "'");
    $product_data_2 = $product_query_2->fetch_assoc();
    $cat = $product_data_2["category_cat_id"];
    setcookie("category_num", $cat, time() + (60 * 60 * 24 * 365 * 10));
    echo "success";
}
