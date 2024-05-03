<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

Database::iud("DELETE FROM cart WHERE `user_cart_email` = '".$email."'");
echo "success";

?>