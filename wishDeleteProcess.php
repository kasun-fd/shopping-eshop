<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$qty = $_POST["qty"];
$id = $_POST["x"];

Database::iud("DELETE FROM watchlist WHERE `user_watch_email` = '" . $email . "' and `product_id` = '" . $id . "'");
setcookie("watchAdd", false, time() - 1);
echo "success";
