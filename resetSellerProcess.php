<?php
require "./connection.php";

$newPass = $_POST["newPass"];
$comPass = $_POST["comPass"];
$code = $_POST["code"];

$query = Database::search("SELECT * FROM seller WHERE `verification_code` = '" . $code . "'");
$num = $query->num_rows;

if (empty($newPass)) {
    echo "Please enter your new password.";
} else if (!preg_match("/[A-Z]/", $newPass)) {
    echo "Password should have at least 01 capital letter.";
} else if (!preg_match("/[a-z]{2,}/", $newPass)) {
    echo "Password should have at least 02 simple letters.";
} else if (!preg_match("/\d{2,}/", $newPass)) {
    echo "Password should have at least 02 numbers.";
} else if (!preg_match("/\W/", $newPass)) {
    echo "Password should have at least 01 special character.";
} else if (strlen($newPass) < 5 && strlen($newPass) > 20) {
    echo "Password should be minimum 5 characters and maximum 20 characters.";
} else if (empty($comPass)) {
    echo "Please comfirm your password.";
} else if ($newPass != $comPass) {
    echo "Password does not match.";
} else {
    if ($num == 1) {
        Database::iud("UPDATE seller SET `password` = '".$newPass."' WHERE `verification_code` = '".$code."'");
        $alert = true;
        setcookie("alert001",$alert,time() + (4));
        echo "success";
    } else {
        echo "Invalid verification code.";
    }
}
