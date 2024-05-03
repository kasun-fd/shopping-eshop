<?php
include "./connection.php";
session_start();

$x = $_GET["x"];

Database::iud("UPDATE `order` SET `order_status_id` = 3 WHERE `id_order` = '".$x."'");

?>