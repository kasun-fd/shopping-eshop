<?php
include "./connection.php";
session_start();

$x = $_GET["x"];

$query = Database::search("SELECT * FROM `order` WHERE `id_order` = '".$x."'");
$data = $query->fetch_assoc();

$query_2 = Database::search("SELECT * FROM `user` WHERE `email` = '".$data["customer_email"]."'");
$data_2 = $query_2->fetch_assoc();
// Get the original phone number
$originalNumber = $data_2["mobile"];

$formattedNumber1 = substr($originalNumber, 1);

// Prepend the country code with a plus sign "+"
$countryCode = "+94";

// Combine the country code and the original number
$formattedNumber = $countryCode . $formattedNumber1;

$_SESSION["v"] = "tel:"+$formattedNumber;
?>