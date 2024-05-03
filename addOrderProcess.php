<?php
include "./connection.php";
include "./generate_id.php";
session_start();
$email = $_COOKIE["email"];

Database::iud("DELETE FROM `order` WHERE `generated_id` = '".$_SESSION["k"]."'");

?>