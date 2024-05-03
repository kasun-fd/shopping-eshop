<?php
session_start();
include './connection.php';


$qty = $_POST['qty'];
$id = $_POST['x'];
$option = $_POST['option'];

if (isset($_COOKIE['name'])) {
    $email = $_COOKIE['email'];
    Database::iud("INSERT INTO watchlist (qty_wishlist,option_qty_wishlist,user_watch_email,product_id) 
    VALUES ('$qty','$option','$email','$id')");

    echo "success";
} else {
    setcookie('watchAdd', true, time() + (60 * 60 * 24));
    echo "notSet";
}
