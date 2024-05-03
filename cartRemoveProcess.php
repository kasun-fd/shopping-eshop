<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$id = $_GET["x"];

Database::iud("DELETE FROM cart WHERE `product_id` = '".$id."' AND `user_cart_email` = '".$email."'");
echo "success";

?>