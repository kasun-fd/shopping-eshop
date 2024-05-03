<?php
include "./connection.php";

$name = $_POST["name"];
$num = $_POST["number"];
$id = $_POST["id"];

Database::iud("UPDATE `courier_service` SET `name` = '".$name."' , `number` = '".$num."' WHERE `id` = '".$id."'");
echo "success";

?>