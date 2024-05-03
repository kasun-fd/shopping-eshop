<?php
session_start();
include "./connection.php";
$email = $_COOKIE["email"];

$m = $_POST["m"];
$l1 = $_POST["l1"];
$l2 = $_POST["l2"];
$pcode = $_POST["pcode"];

Database::iud("UPDATE user SET `mobile` = '".$m."' WHERE `email` = '".$email."'");
Database::iud("UPDATE user_has_address SET `line1` = '".$l1."' , `line2` = '".$l2."' , `postal_code` = '".$pcode."' WHERE `user_email` = '".$email."'");

echo "success";

?>