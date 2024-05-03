<?php
include "./connection.php";
include "./generate_id.php";
session_start();
$email = $_COOKIE["email"];

$gen_id = generateID();

date_default_timezone_set('Asia/Colombo');
$formattedTime = date('Y-m-d H:i:s');

// // Define the character set for the ID (digits only)
// $characterSet = "0123456789";

// // Get a random string of length 5
// $randomString = "";
// for ($i = 0; $i < 5; $i++) {
//   $randomString .= $characterSet[rand(0, strlen($characterSet) - 1)];
// }

// // Convert the random string to an integer (may lead to leading zeros)
// $intID = (int) $randomString;

// // Handle leading zeros (optional)
// if (strlen($intID) < 5) {
//   $intID = str_pad($intID, 5, "0", STR_PAD_LEFT);
// }

$total_price = 0;

if(isset($_COOKIE["checkoutCart"])){
    $query_cart = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '".$email."'");
    $num = $query_cart->num_rows;
    $divide = $_SESSION["c"] / $num;
    for ($i=0; $i < $num; $i++) { 
        $data_cart = $query_cart->fetch_assoc();
        $query_product = Database::search("SELECT * FROM product WHERE `id` = '".$data_cart["product_id"]."'");
        $data_product = $query_product->fetch_assoc();
        $cart_unit = ($data_product["current_price"] * $data_cart["qty_cart"]);
        $query_order = Database::search("SELECT * FROM color WHERE `clr_id` = '".$data_cart["option_qty"]."'");
        $data_order = $query_order->fetch_assoc();
        $_SESSION["k"] = $gen_id;
        $total_price += $cart_unit;
        Database::iud("INSERT INTO `order`(`qty_order`,`option_order`,`paid_status`,`unit_total_price`,`delivery_cost`,`date_time`,`order_status_id`,`generated_id`,`product_id`,`customer_email`) 
        VALUES ('".$data_cart["qty_cart"]."','".$data_order["clr_name"]."',1,'".$cart_unit."','".$divide."','".$formattedTime."',1,'".$gen_id."','".$data_cart["product_id"]."','".$email."')");
        // echo $data_cart["product_id"];
    }
    // echo "multiple";
    $total_price += $_SESSION["c"];
}

if(isset($_COOKIE["qtySingle"])){
    $qty_order = $_COOKIE["qtySingle"];
    $id = $_COOKIE["pro_id"];
    $option = $_COOKIE["option_checkout"];
    $query_product_single = Database::search("SELECT * FROM product WHERE `id` = '".$id."'");
    $data_product_single = $query_product_single->fetch_assoc();
    $cart_unit_single = ($data_product_single["current_price"] * $qty_order);
    $query_order = Database::search("SELECT * FROM color WHERE `clr_id` = '".$option."'");
    $data_single_order = $query_order->fetch_assoc();
    $_SESSION["k"] = $gen_id;
    $total_price = $cart_unit_single;
    Database::iud("INSERT INTO `order` (`qty_order`,`option_order`,`paid_status`,`unit_total_price`,`delivery_cost`,`date_time`,`order_status_id`,`generated_id`,`product_id`,`customer_email`)  
    VALUES ('".$qty_order."','".$data_single_order["clr_name"]."',0,'".$cart_unit_single."','".$_SESSION["c"]."','".$formattedTime."',1,'".$gen_id."','".$id."','".$email."')");
    // echo "single";
}
// echo $total_price;
$item = "Order ID " . $_SESSION["k"];
$amount = $total_price;
$_SESSION["o"] = $total_price;
$merchant_id = "1226316";
$order_id = $_SESSION["k"];
$merchant_secret = "MTc0NTkwMjgwMzQ1MzIwNjM3MjE4NTQ0MjM4MzE2MDg1MTM1ODg=";
$currency = "LKR";

$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);

$user = Database::search("SELECT * FROM user WHERE `email` = '".$email."'");
$data_user = $user->fetch_assoc();

$address = Database::search("SELECT * FROM user_has_address WHERE `user_email` = '".$email."'");
$data_address = $address->fetch_assoc();

$array = [];

$array["items"] = $item;
$array["first_name"] = $data_user["fname"];
$array["last_name"] = $data_user["lname"];
$array["email"] = $email;
$array["phone"] = $data_user["mobile"];
$array["address"] = $data_address["line1"] . ", " . $data_address["line2"];
$array["city"] = "";
// $array["return_url"] = "http://127.0.0.1/4/order_successfully.php";
// $array["cancel_url"] = "http://127.0.0.1/4/order_failed.php";

$array["amount"] = $amount;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;

$jsonObj = json_encode($array);

echo $jsonObj;

?>