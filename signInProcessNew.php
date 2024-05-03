<?php

session_start();
include "./connection.php";

$email = trim($_POST["e"]);
$password = trim($_POST["p"]);

if (empty($email)) {
    echo "Please Enter Your Email Address.";
} else if (strlen($email) > 100) {
    echo ("Incorrect Email Address.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Not A Valid Email Address.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Incorrect Password.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");

    $n = $rs->num_rows;

    if ($n == 1) {

        $query = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `block_status_user` = 1");

        $num_user = $query->num_rows;

        if ($num_user == 1) {
            echo "This account has been banned!";
        } else {
            if (isset($_COOKIE["ridirect"])) {
                echo "singleProductprocess.php";
                setcookie("ridirect", false, time() - 1);
            } else if (isset($_COOKIE["buyNow"])){
                echo "buyNow";
                setcookie("buyNow",false,time() - 1);
            } else if (isset($_COOKIE["cartPage"])) {
                echo "cart.php";
                setcookie("cartPage", false, time() - 1);
            } else if (isset($_COOKIE["myWishlist"])) {
                echo "wishlist.php";
                setcookie("myWishlist", false, time() - 1);
            } else if (isset($_COOKIE["watchAdd"])) {
                echo "watchAdd";
                setcookie("watchAdd", false, time() - 1);
            } else if (isset($_COOKIE["checkoutPage"])) {
                echo "checkout";
                setcookie("checkoutPage", false, time() - 1);
            } else if (isset($_COOKIE["myOrder"])) {
                echo "myOrder";
                setcookie("myOrder", false, time() - 1);
            } else {
                echo "success";
            }



            $d = $rs->fetch_assoc();
            // $_SESSION["u"] = $d;
            $data = $d["fname"];

            // if($rememberme == "true"){
            setcookie("email", $email, time() + (60 * 60 * 3));
            // setcookie("password", $password, time() + (60 * 60 * 2));

            setcookie("name", $data, time() + (60 * 60 * 2));

            $alert = true;

            setcookie("alert", $alert, time() + (4));
        }
        // }
        // else{
        //     setcookie("email","",-1);
        //     setcookie("password","",-1);
        // }

    } else {
        echo ("Invalid Email Address or Password");
    }
}
