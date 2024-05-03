<?php

require "./connection.php";
session_start();

$index = $_GET["x"];

$query = Database::search("SELECT * FROM product_img JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN product ON product.id = product_img.product_id JOIN category ON product.category_cat_id = category.cat_id WHERE `product_id` = '" . $index . "'");
$num = $query->num_rows;

if ($num > 0) {
    $data = $query->fetch_assoc();
    $_SESSION["p"] = $data;
    echo "success";

} else {
    echo "Somethig went wrong.";
}

?>