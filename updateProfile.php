<?php
session_start();
require "./connection.php";

$email = $_COOKIE["email"];

$fn = $_POST["fname"];
$ln = $_POST["lname"];
$m = $_POST["mobile"];
$l1 = $_POST["line1"];
$l2 = $_POST["line2"];
$p = $_POST["province"];
$d = $_POST["district"];
$c = $_POST["city"];
$code = $_POST["pcode"];

// echo $fn;
// echo $l1;
// echo $m;
// echo $l1;
// echo $l2;
// echo $p;
// echo $d;
// echo $c;
// echo $code;
// echo $img;

$user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

if ($user_rs->num_rows == 1) {
    Database::iud("UPDATE user SET `fname` = '" . $fn . "' , `lname` = '" . $ln . "' , `mobile` = '" . $m . "' WHERE `email` = '" . $email . "'");
    
    echo "update";

    $address = Database::search("SELECT * FROM user_has_address WHERE `user_email` = '" . $email . "'");
    if ($address->num_rows == 1) {
        Database::iud("UPDATE user_has_address SET `user_email` = '" . $email . "' , `city_city_id` = '" . $c . "' , `line1` = '" . $l1 . "' , `line2` = '" . $l2 . "' , `postal_code` = '" . $code . "' WHERE `user_email` = '" . $email . "'");
        echo "update";
    } else {
        if (!empty($l1)) {
            if (empty($l2)) {
                echo "Please Enter Your Address Line two.";
            } else if (empty($code)) {
                echo "Please Enter Your Postal Code.";
            } else if (empty($p)) {
                echo "Please Select Your Province.";
            } else if (empty($d)) {
                echo "Please Select Your District.";
            } else if (empty($c)) {
                echo "Please Select Your City.";
            } else {
                Database::iud("INSERT INTO user_has_address (`user_email`,`city_city_id`,`line1`,`line2`,`postal_code`) VALUES ('" . $email . "','" . $c . "','" . $l1 . "','" . $l2 . "','" . $code . "')");
                echo "save";
            }
        }
    }
} else {
    echo ("Invalid user.");
}

// $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

// if ($user_rs->num_rows == 1) {

//     Database::iud("UPDATE `user` SET `fname`='" . $fn . "',`lname`='" . $ln . "',`mobile`='" . $m . "' WHERE 
//     `email`='" . $email . "'");

//     echo "Updated";

//     $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "'");

//     if ($address_rs->num_rows == 1) {

//         Database::iud("UPDATE `user_has_address` SET `city_city_id`='" . $c . "',`line1`='" . $l1 . "',
//         `line2`='" . $l2 . "',`postal_code`='" . $code . "' WHERE `user_email`='" . $email . "'");

//         echo "Updated";
//     } else {

//         if (!empty($l1)) {
//             if (empty($l2)) {
//                 echo "Please Enter Your Address Line two.";
//             } else if (empty($code)) {
//                 echo "Please Enter Your Postal Code.";
//             } else if (empty($p)) {
//                 echo "Please Select Your Province.";
//             } else if (empty($d)) {
//                 echo "Please Select Your District.";
//             } else if (empty($c)) {
//                 echo "Please Select Your City.";
//             } else {
//                 Database::iud("INSERT INTO `user_has_address`(`user_email`,`city_city_id`,`line1`,`line2`,`postal_code`) 
//             VALUES ('" . $email . "','" . $c . "','" . $l1 . "','" . $l2 . "','" . $code . "')");
//             }
//         }

//         echo "Saved";
//     }
// } else {
//     echo ("Invalid user.");
// }
