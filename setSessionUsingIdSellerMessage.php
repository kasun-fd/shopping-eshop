<?php
include "./connection.php";
session_start();

$id = $_POST["x"];

$query = Database::search("SELECT * FROM seller_and_product_message JOIN product ON seller_and_product_message.product_id = product.id 
JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path
 WHERE product.id = '" . $id . "'");

$data = $query->fetch_assoc();

$_SESSION["p"] = $data;


echo "success";
