<?php
include "./connection.php";

$id = $_GET["x"];

$query = Database::search("SELECT * FROM brand WHERE `product_id` = '".$id."'");
$data = $query->fetch_assoc();

echo $data["brand_name"];

?>