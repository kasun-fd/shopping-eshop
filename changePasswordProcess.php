<?php
require "./connection.php";
session_start();

$curP = $_POST["curP"];
$newP = $_POST["newP"];
$cimP = $_POST["comP"];

$email = $_COOKIE["email"];

$pattern = '/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>?]/'; // Common special characters

if (empty($curP)) {
    echo "Please Enter Your Current Password.";
    return;
} else if (empty($newP)) {
    echo "Please Enter Your New password.";
    return;
} else if (!preg_match('/[A-Z]/', $newP)) {
    echo "Password must contains at least one capital letter.";
    return;
} else if (!preg_match('/[a-z]/', $newP)) {
    echo "Password must contains at least one simple letter.";
    return;
} else if (!preg_match('/[0-9]/', $newP)) {
    echo "Password must contains at least one number.";
    return;
} else if (!preg_match($pattern, $newP)) {
    echo "Password must contains at least one special character.";
    return;
} else if (strlen($newP) < 5 || strlen($newP) > 20) {
    echo "Password Length Must Be Between 5 - 20 Characters.";
    return;
} else if (empty($cimP)) {
    echo "Please Comfirm Your Password.";
    return;
} else if ($newP != $cimP) {
    echo "Password Not Match.";
    return;
} else {
    $query = Database::search("SELECT * FROM user WHERE `email`= '" . $email . "' AND `password`= '" . $curP . "'");
    $num = $query->num_rows;

    if ($num == 0) {
        echo "Invalid Current Password.";
        return;
    } else {

        Database::iud("UPDATE user SET `password` = '" . $newP . "' WHERE `email`= '".$email."'");

        echo "success";
    }
}
