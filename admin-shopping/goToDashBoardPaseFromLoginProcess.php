<?php
include "./connection.php";
session_start();

$vcode = $_POST["vcode"];

$query = Database::search("SELECT * FROM `admin` WHERE `vcode` = '" . $vcode . "'");

$num = $query->num_rows;

if ($num == 1) {
    $data = $query->fetch_assoc();
    $name = $data["fname"] . " " . $data["lname"];
    setcookie("adminName", $name, time() + (60 * 60 * 5));
    echo "success";
} else {
    echo "Invalid Verification Code.";
}
