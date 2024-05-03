<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$id = $_GET["x"];

Database::iud("DELETE FROM watchlist WHERE `product_id` = '".$id."' AND `user_watch_email` = '".$email."'");

echo "success";
?>