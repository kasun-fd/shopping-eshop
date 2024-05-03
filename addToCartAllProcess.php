<?php
include "./generate_id.php";
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$watchlist_query = Database::search("SELECT * FROM watchlist WHERE `user_watch_email` = '".$email."'");


$num = $watchlist_query->num_rows;
// $num_cart = $cart_query->num_rows;

for ($i=0; $i < $num; $i++) { 
    $data_watch = $watchlist_query->fetch_assoc();
    // $data_cart = $cart_query->fetch_assoc();
    $cart_query = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '".$email."' AND `product_id` = '".$data_watch["product_id"]."'");
    $cart_num = $cart_query->num_rows;
    if($cart_num == 1){
        $cart_dara = $cart_query->fetch_assoc();
        $total = $cart_dara["qty_cart"] += $data_watch["qty_wishlist"];
        Database::iud("UPDATE cart SET `qty_cart` = '".$total."' WHERE `product_id` = '".$data_watch["product_id"]."' 
        AND `user_cart_email` = '".$email."'");

        echo "success";
    }else{
        $id_gen = generateID();
        Database::iud("INSERT INTO cart(`qty_cart`,`option_qty`,`user_cart_email`,`product_id`,`generated_id`) 
        VALUES ('".$data_watch["qty_wishlist"]."','".$data_watch["option_qty_wishlist"]."','".$email."','".$data_watch["product_id"]."',
        '".$id_gen."')");
        echo "success";
    }
}

?>