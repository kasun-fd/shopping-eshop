<?php
include "./connection.php";
session_start();

$email = $_COOKIE["email"];

date_default_timezone_set('Asia/Colombo');

$currentTime = date('Y-m-d H:i:s');

if(isset($_COOKIE["checkoutCart"])){
    
    // $total_cart = 0;
    $query_cart = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '".$email."'");
    $num = $query_cart->num_rows;
    for ($i=0; $i < $num; $i++) { 
        $data_cart = $query_cart->fetch_assoc();
        $product = Database::search("SELECT * FROM product WHERE `id` = '".$data_cart["product_id"]."'");
        $data_product = $product->fetch_assoc();
        $price = ($data_product["current_price"] * $data_cart["qty_cart"]);
        $price_process = ($price * 10) / 100;
        Database::iud("INSERT INTO `admin_income` (`income`,`date_time_admin`,`generated_id_admin`) 
        VALUES ('".$price_process."','".$currentTime."','".$_SESSION["k"]."')");
    }
}

if(isset($_COOKIE["qtySingle"])){
    $qty_order = $_COOKIE["qtySingle"];
    $id = $_COOKIE["pro_id"];
    $option = $_COOKIE["option_checkout"];
    $query_product_single = Database::search("SELECT * FROM product WHERE `id` = '".$id."'");
    $data_product_single = $query_product_single->fetch_assoc();
    $cart_unit_single = ($data_product_single["current_price"] * $qty_order);
    $sinple_price = ($cart_unit_single * 10) / 100;
    Database::iud("INSERT INTO `admin_income` (`income`,`date_time_admin`,`generated_id_admin`) 
    VALUES ('".$sinple_price."','".$currentTime."','".$_SESSION["k"]."')");
}

?>