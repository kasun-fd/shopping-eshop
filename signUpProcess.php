<?php

session_start();
require "connection.php";

$fname1 = $_POST["fname"];
$lname1 = $_POST["lname"];
$email1 = $_POST["email"];
$password1 = $_POST["password"];
$mobile1 = $_POST["mobile"];
$gender1 = $_POST["gender"];

$fname = $fname1;
$lname = $lname1;
$email = $email1;
$password = $password1;
$mobile = $mobile1;
$gender = $gender1;

$pattern = '/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>?]/'; // Common special characters
$patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // email validate
$patternTrim = '/^[^\s]+(\s+[^\s]+)*$/'; // Matches words separated by whitespace

if (empty($fname)) {
    echo "Please Enter Your First Name.";
} else if (strlen($fname) > 45) {
    echo "First Name Must Have Less than 45 Characters.";
} else if (empty($lname)) {
    echo "Please Enter Your Last Name.";
} else if (strlen($lname) > 45) {
    echo "Last Name Must Have Less Than 45 Characters.";
} else if (empty($mobile)) {
    echo "Please Enter Your Mobile Number.";
} else if (strlen($mobile) != 10) {
    echo "Mobile Number Must Be Contain 10 Characters.";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo "Invalid Mobile Number.";
} else if (empty($gender)) {
    echo "Please Select Your Gender";
} else if (empty($email)) {
    echo "Please Enter Your Email Address.";
} else if (strlen($email) > 100) {
    echo "Email Must Have Less Than 100 Characters.";
} else if (!preg_match($patternEmail, $email)) {
    echo "Invalid email address.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
} else if (!preg_match('/[A-Z]/', $password)) {
    echo "Password must contains at least one capital letter.";
} else if (!preg_match('/[a-z]/', $password)) {
    echo "Password must contains at least one simple letter.";
} else if (!preg_match('/[0-9]/', $password)) {
    echo "Password must contains at least one number.";
} else if (!preg_match($pattern, $password)) {
    echo "Password must contains at least one special character.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password Length Must Be Between 5 - 20 Characters.";
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;
    if ($n > 0) {
        echo "User with the same Email Address or same Mobile Number already exists.";
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        // $mysqli = new mysqli("localhost", "root", "r=k=2005", "google_login");
        // Check if the email has a Gravatar
        // $gravatarUrl = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=200";
        // $gravatarExists = get_headers($gravatarUrl)[0] !== 'HTTP/1.0 404 Not Found';

        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status_status_id`,`gender_gender_id`) VALUES ('" . preg_replace('/\s+/', '', $fname) . "','" . preg_replace('/\s+/', '', $lname) . "',
        '" . strtolower($email) . "','" . preg_replace('/\s+/', '', $password) . "','" . preg_replace('/\s+/', '', $mobile) . "','" . $date . "','1','" . $gender . "')");



        // Store data in the database
        // Database::iud("UPDATE user SET profile_picture = '$gravatarUrl' WHERE `email`= '" . $email . "'");
        if (isset($_COOKIE["ridirect"])) {
            echo "singleProductprocess.php";
            setcookie("ridirect", false, time() - 1);
        } else if ($_COOKIE["cartPage"]) {
            echo "cart.php";
            setcookie("cartPage", false, time() - 1);
        } else if (isset($_COOKIE["myWishlist"])) {
            echo "wishlist.php";
            setcookie("myWishlist", false, time() - 1);
        } else if (isset($_COOKIE["watchAdd"])) {
            echo "watchAdd";
            setcookie("watchAdd", false, time() - 1);
        } else if(isset($_COOKIE["checkoutPage"])){
            echo "checkout";
            setcookie("checkoutPage",false,time() - 1);
        } else if(isset($_COOKIE["myOrder"])){
            echo "myOrder";
            setcookie("myOrder",false,time() - 1);
        } else {
            echo "Success";
        }

        setcookie("email", "", -1);
        // setcookie("password", "", -1);
        setcookie("name", "", -1);

        // Assuming the session cookie name is 'PHPSESSID'
        // Expires 1 hour ago

        setcookie("email", strtolower($email), time() + (60 * 60 * 3));
        // setcookie("password", $password, time() + (60 * 60 * 1));

        $alert = true;

        setcookie("alert", $alert, time() + (4));

        $rss = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $password . "'");
        $nn = $rss->num_rows;

        $data = $rss->fetch_assoc();
        // $_SESSION["u"] = $data;
        setcookie("name", $data["fname"], time() + (60 * 60 * 2));




        // setcookie("email", "", -1);
        // setcookie("password", "", -1);


    }
    // $rss = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `password`='" . $password . "'");
    // $nn = $rss->num_rows;
    // if ($nn == 1) {
    //     setcookie("email", "", -1);
    //     setcookie("password", "", -1);
    //     unset($_SESSION["u"]);
    //     $data = $rss->fetch_assoc();
    //     $_SESSION["u"] = $data;
    // setcookie("emailSignUp", $email, time() + (60 * 60 * 24));
    // setcookie("passwordSignUp", $password, time() + (60 * 60 * 24));
    // }
}
