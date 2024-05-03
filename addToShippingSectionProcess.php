<?php
include "./connection.php";
session_start();

$x = $_GET["x"];

Database::iud("UPDATE `order` SET `order_status_id` = 2 WHERE `id_order` = '" . $x . "'");

// setcookie("orderAlert", true, time() + (60 * 2));

echo "success";
