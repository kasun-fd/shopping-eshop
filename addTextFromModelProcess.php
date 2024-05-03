<?php
include "./connection.php";

$id = $_GET["x"];

$query = Database::search("SELECT * FROM model WHERE `product_id` = '".$id."'");
$data = $query->fetch_assoc();

echo $data["model_name"];

?>