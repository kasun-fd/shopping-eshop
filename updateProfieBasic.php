<?php
session_start();
require "./connection.php";

$email = $_COOKIE["email"];

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$mobile = $_POST["m"];



$user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

if ($user_rs->num_rows == 1) {

    $update = Database::iud("UPDATE user SET `fname` = '" . $fname . "' , `lname` = '" . $lname . "' WHERE `email` = '" . $email . "'");
    $alert = true;
    setcookie("alert2", $alert, time() + (4));
    echo "updated";
} else {
    $save = Database::iud("INSERT INTO user (`fname`,`lname`,`mobile`) VALUES ('" . $fname . "','" . $lname . "')");
    $alert = true;
    setcookie("alert3", $alert, time() + (4));
    echo "saved";
}
