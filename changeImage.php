<?php
require "./connection.php";
session_start();

$index = $_GET["x"];

$query = Database::search("SELECT * FROM product_img WHERE `product_id` = '".$_SESSION["p"]["product_id"]."' AND `index_id` = '".$index."'");
$data = $query->fetch_assoc();

echo $data["img_path"];


?>