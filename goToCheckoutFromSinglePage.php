<?php
session_start();
require "connection.php";
setcookie("checkoutCart", false, time() - 1);
if(isset($_COOKIE["name"])){
    $email = $_COOKIE['email'];

    $query = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '$email'");
    $num = $query->num_rows;
    if($num > 0){
            $qty = $_POST["qty"];
            $id = $_POST["x"];
            $option = $_POST["option"];

            setcookie("qtySingle", $qty, time() + (60 * 60 * 24 * 365 * 10));
            setcookie("pro_id", $id, time() + (60 * 60 * 24 * 365 * 10));
            setcookie("option_checkout", $option, time() + (60 * 60 * 24 * 365 * 10));
            echo "success";
    }else{
        echo "address info not fount";
    }

}else{
    setcookie("buyNow",true, time() + (60 * 60 * 24));
    echo "gotologin";
}

