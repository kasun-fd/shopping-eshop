<?php
require "./connection.php";
session_start();

$f_name = $_POST["fullName"];
$u_name = $_POST["uName"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$nic = $_POST["nic"];
$male = $_POST["male"];
$female = $_POST["female"];

$aName = $_POST["aName"];
$aNum = $_POST["aNum"];
$bank = $_POST["bank"];
$branch = $_POST["branch"];

// echo $aName;
// echo $aNum;
// echo $bank;
// echo $branch;
// echo $mobile;
// echo $nic;
// echo $male;
// echo $female;

$rs = Database::search("SELECT * FROM seller WHERE `user_name` = '" . $u_name . "'");
$emailquery = Database::search("SELECT * FROM seller WHERE `email` = '" . $email . "'");
$mobilequery = Database::search("SELECT * FROM seller WHERE `mobile` = '" . $mobile . "'");
$nicquery = Database::search("SELECT * FROM seller WHERE `nic` = '" . $nic . "'");
$user_name = $rs->num_rows;
$email_data = $emailquery->num_rows;
$mobile_data = $mobilequery->num_rows;
$nic_data = $nicquery->num_rows;

if (empty($f_name)) {
    echo "Please enter name.";
} else if (empty($u_name)) {
    echo "Please enter user name.";
} else if (preg_match("/[A-Z]/", $u_name)) {
    echo "Please do not use capital letters and user name should Contain at least 05 characters.";
} else if (strlen($u_name) < 5) {
    echo "User name should contain at least 05 characters.";
} else if ($user_name == 1) {
    echo "User name already exists.";
} else if (empty($email)) {
    echo "Please enter email address.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
} else if ($email_data == 1) {
    echo "Email already exists.";
} else if (empty($password)) {
    echo "Please enter password.";
} else if (!preg_match("/[A-Z]/", $password)) {
    echo "Password should have at least 01 capital letter.";
} else if (!preg_match("/[a-z]{2,}/", $password)) {
    echo "Password should have at least 02 simple letters.";
} else if (!preg_match("/\d{2,}/", $password)) {
    echo "Password should have at least 02 numbers.";
} else if (!preg_match("/\W/", $password)) {
    echo "Password should have at least 01 special character.";
} else if (strlen($password) < 5 && strlen($password) > 20) {
    echo "Password should be minimum 5 characters and maximum 20 characters.";
} else if (empty($mobile)) {
    echo "Please enter your mobile number.";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo "Invalid mobile number.";
} else if (strlen($mobile) != 10) {
    echo "Mobile number should contain 10 characters.";
} else if ($mobile_data == 1) {
    echo "Mobile number already exists.";
} else if (empty($nic)) {
    echo "Please enter your NIC.";
} else if ($nic_data == 1) {
    echo "NIC already exists.";
} else if (empty($aName)) {
    echo "Please enter your account name.";
} else if (empty($aNum)) {
    echo "Please enter your account number.";
} else if (empty($bank)) {
    echo "Please enter bank name.";
} else if (empty($branch)) {
    echo "Please enter branch name.";
} else {
    $gender = 0;
    if ($male == "true") {
        $gender = 1;
    } else {
        $gender = 2;
    }
    Database::iud("INSERT INTO seller(`full_name`,`user_name`,`mobile`,`email`,`password`,`nic`,`gender_gender_id`) 
        VALUES ('" . $f_name . "','" . $u_name . "','" . $mobile . "','" . $email . "','" . $password . "','" . $nic . "','" . $gender . "')");

    Database::search("INSERT INTO `seller_bank_info` (`account_name`,`account_number`,`bank`,`branch`,`seller_email`) VALUES ('".$aName."','".$aNum."','".$bank."','".$branch."','".$email."')");
    echo "success";

    setcookie("emailSeller", $email, time() + (60 * 60 * 24 * 365 * 10));
    setcookie("sellerName", $u_name, time() + (60 * 60 * 2));
    setcookie("add", true, time() + (60 * 2));
}
