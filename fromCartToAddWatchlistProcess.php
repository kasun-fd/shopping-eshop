<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$id = $_GET["x"];

$cart_query = Database::search("SELECT * FROM cart WHERE `product_id` = '" . $id . "' AND `user_cart_email` = '" . $email . "'");

$data = $cart_query->fetch_assoc();

Database::search("INSERT INTO watchlist(`qty_wishlist`,`option_qty_wishlist`,`user_watch_email`,`product_id`) 
    VALUES ('" . $data["qty_cart"] . "','" . $data["option_qty"] . "','" . $email . "','" . $id . "')");
echo "success";
