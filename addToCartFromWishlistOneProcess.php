<?php
include "./generate_id.php";
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$id = $_GET["x"];

$wishlist_query = Database::search("SELECT * FROM watchlist WHERE `product_id` = '".$id."' AND `user_watch_email` = '".$email."'");

$data = $wishlist_query->fetch_assoc();

$cart_query = Database::search("SELECT * FROM cart WHERE `product_id` = '".$id."' AND `user_cart_email` = '".$email."'");

$num = $cart_query->num_rows;

if($num == 1){

    $data_cart = $cart_query->fetch_assoc();

    $total = $data_cart["qty_cart"] += $data["qty_wishlist"];

    Database::iud("UPDATE cart SET `qty_cart` = '".$total."' WHERE `product_id` = '".$id."' AND `user_cart_email` = '".$email."'");
    
    echo "success";

    
}else{
    $id_gen = generateID();
    Database::iud("INSERT INTO cart(`qty_cart`,`option_qty`,`user_cart_email`,`product_id`,`generated_id`) 
    VALUES ('".$data["qty_wishlist"]."','".$data["option_qty_wishlist"]."','".$email."','".$id."','".$id_gen."')");
    
     echo "success";
     
}

?>