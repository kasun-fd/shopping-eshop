<?php
require "./connection.php";
session_start();

$email = $_POST["e"];
$password = $_POST["p"];

$emailPasswordquery = Database::search("SELECT * FROM seller WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");

$emailPassword_data = $emailPasswordquery->num_rows;

if (empty($email)) {
    echo "Please enter your email address.";
} else if (empty($password)) {
    echo "Please enter your password.";
} else {
    if ($emailPassword_data == 1) {
        $check_query = Database::search("SELECT * FROM seller WHERE `email` = '" . $email . "' AND `password` = '" . $password . "' AND `block_status` != 1");
        $num_check = $check_query->num_rows;

        if ($num_check == 1) {
            $email_fetch = $emailPasswordquery->fetch_assoc();
            $user_name = $email_fetch["user_name"];

            setcookie("emailSeller", "", -1);
            setcookie("sellerName", "", -1);

            setcookie("emailSeller", $email, time() + (60 * 60 * 24 * 365 * 10));
            setcookie("sellerName", $user_name, time() + (60 * 60 * 2));
            setcookie("add", true, time() + (60 * 2));
            echo "success";
        }else{
            echo "This account has been banned!";
        }
    } else {
        echo "Invalid email or password.";
    }
}
