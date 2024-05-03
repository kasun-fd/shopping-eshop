<?php
require "./connection.php";
session_start();
$email = $_COOKIE["email"];

$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$province = $_POST["province"];
$district = $_POST["district"];
$city = $_POST["city"];
$pcode = $_POST["pcode"];

if (empty($province)) {
    echo "Please Select Your Province.";
} else if (empty($district)) {
    echo "Please Select Your District.";
} else if (empty($city)) {
    echo "Please Select Your City.";
} else if (empty($line1)) {
    echo "Please Enter Your Address.";
} else if (empty($line2)) {
    echo "Please Enter Your Address.";
} else if (empty($pcode)) {
    echo "Please Enter Your Postal Code.";
} else {
    $check = Database::search("SELECT * FROM user_has_address WHERE `user_email` = '" . $email . "'");

    if ($check->num_rows == 1) {
        Database::iud("UPDATE user_has_address SET `user_email` = '" . $email . "' , `city_city_id` = '" . $city . "' ,
 `line1` = '" . $line1 . "' , `line2` = '" . $line2 . "' , `postal_code` = '" . $pcode . "' WHERE `user_email` = '".$email."'");

        $alert = true;
        setcookie("alert2", $alert, time() + (4));
        echo "Updated";
    } else {
        Database::iud("INSERT INTO user_has_address (`user_email`,`city_city_id`,`line1`,`line2`,`postal_code`) VALUES 
('" . $email . "','" . $city . "','" . $line1 . "','" . $line2 . "','" . $pcode . "')");

        $alert = true;
        setcookie("alert3", $alert, time() + (4));
        echo "Saved";
    }
}
