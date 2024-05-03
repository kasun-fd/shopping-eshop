<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

if(isset($_COOKIE["checkoutCart"])){
   $cart = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '".$email."'");
   $num_cart = $cart->num_rows;
   for ($i=0; $i < $num_cart; $i++) { 
        $data_cart = $cart->fetch_assoc();
        $product = Database::search("SELECT * FROM product WHERE `id` = '".$data_cart["product_id"]."'");
        $data_product = $product->fetch_assoc();
        $process = $data_product["qty"] - $data_cart["qty_cart"];
        Database::iud("UPDATE product SET `qty` = '".$process."' WHERE `id` = '".$data_cart["product_id"]."'");
        // echo "success";
   }
}

if(isset($_COOKIE["qtySingle"])){
    $qty_order = $_COOKIE["qtySingle"];
    $id = $_COOKIE["pro_id"];
    $option = $_COOKIE["option_checkout"];

    $product_query = Database::search("SELECT * FROM product WHERE `id` = '".$id."'");
    $data_product_single = $product_query->fetch_assoc();

    $process_single = $data_product_single["qty"] - $qty_order;

    $product_single = Database::iud("UPDATE product SET `qty` = '".$process_single."' WHERE `id` = '".$id."'");
    // echo "success";
}

?>