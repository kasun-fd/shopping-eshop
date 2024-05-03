<?php
session_start();
include "./connection.php";

$email = $_COOKIE["email"];

$id = $_POST["x"];
$qty = $_POST["qty"];

$query = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '".$email."' AND `product_id` = '".$id."'");

$data = $query->fetch_assoc();

$cart = $data["qty_cart"];

$cart += $qty;

Database::iud("UPDATE cart SET `qty_cart` = '".$cart."' WHERE `user_cart_email` = '".$email."' AND `product_id` = '".$id."'");

// setcookie("createCookie",false,time() - 1);
echo "success";

?>