<?php
require "./connection.php";
session_start();
$email = $_COOKIE["emailSeller"];

$title = $_POST["title"];
$desc = $_POST["desc"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$qty = $_POST["qty"];
$condition = $_POST["condition"];
$cat = $_POST["cat"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$color = $_POST["color"];
$whichImage = $_POST["whichImage"];
$discount_type = $_POST["discount_type"];

if (empty($title)) {
    echo "Please enter product title first.";
} else if (empty($desc)) {
    echo "Please enter product description first.";
} else if (empty($price)) {
    echo "Please enter unit price first.";
} else if (preg_match("/[A-Za-z]/", $price)) {
    echo "Please do not use letters in the price field.";
} else if (preg_match("/\W/", $price)) {
    echo "Please do not use special characters or leave spaces in the price field.";
} else if (strpos($price, "%") !== false) {
    echo "Please do not use precentage mark in the price field.";
} else if (preg_match("/[A-Za-z]/", $discount)) {
    echo "Please do not use letters in the discount field.";
} else if (strpos($discount, "%") !== false) {
    echo "Please do not use precentage mark in the discount field.";
} else if ($discount > 99.99) {
    echo "Please do not enter numbers above 99.99%.";
} else if (empty($qty)) {
    echo "Please enter quantity first.";
} else if (preg_match("/[A-Za-z]/", $qty)) {
    echo "Please do not use letters in the quantity field.";
} else if (preg_match("/\W/", $qty)) {
    echo "Please do not use special characters or leave spaces in the quantity field.";
} else if (empty($cat)) {
    echo "Please select product category first.";
} else if (empty($brand)) {
    echo "Please enter product brand first.";
} else if (strlen($brand) > 50) {
    echo "Content should be less than 50 words.";
} else if (empty($model)) {
    echo "Please enter product model first.";
} else if (strlen($model) > 50) {
    echo "Content should be less than 50 words.";
} else if (empty($color)) {
    echo "Please enter product colors.";
} else {
    
    if (empty($discount)) {
        $discount = 0;
    }
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    $price_after = $price;

    if (!empty($discount)) {
        $price_process = ($price * $discount) / 100;
        $price_after = $price - $price_process;
        if($price_after <= 0){
            $price_after = 0;
        }
    }

    Database::iud("INSERT INTO product (`price`,`current_price`,`discount`,`qty`,`title`,`description`,`datetime_added`,
    `category_cat_id`,`condition_condition_id`,`status_status_id`,`user_email`,`discount_type_id`) VALUES ('" .  preg_replace('/\s+/', '', $price) . "','" . $price_after . "','" .  preg_replace('/\s+/', '', $discount)  ."',
    '" .  preg_replace('/\s+/', '', $qty)  . "','" . htmlspecialchars($title, ENT_QUOTES) . "','" . htmlspecialchars($desc, ENT_QUOTES) . "','" . $date . "','" . $cat . "','" . $condition . "','" . $status . "','" . $email . "','" . $discount_type . "')");

    // echo "success";

    $product_id = Database::$connection->insert_id;

    Database::iud("INSERT INTO brand (`brand_name`,`product_id`) VALUES ('" . htmlspecialchars($brand, ENT_QUOTES) . "','" . $product_id . "')");

    Database::iud("INSERT INTO model (`model_name`,`product_id`) VALUES ('" . htmlspecialchars($model, ENT_QUOTES) . "','" . $product_id . "')");

    $myArray = explode(",", $color);

    for ($i = 0; $i < count($myArray); $i++) {
        $colors = $myArray[$i];
        $trimmed_data = trim($colors);
        $data = ucfirst(strtolower($trimmed_data));


        Database::iud("INSERT INTO color (`clr_name`,`product_id`) VALUES ('" .  $data  . "','" . $product_id . "')");
    }

    // echo ("success");

    $index = 0;

    $length = sizeof($_FILES);

    if ($length <= 4 && $length > 0) {

        $allowed_image_extensions = array("image/jpeg", "image/jpg", "image/png", "image/svg+xml");

    //     // $text = "success";

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extension = $image_file["type"];

                if (in_array($file_extension, $allowed_image_extensions)) {

                    $new_img_extension;

                    if ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($file_extension == "image/jpg") {
                        $new_img_extension = ".jpg";
                    } else if ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($file_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }


                    $file_name = "product_images/" . "_" . $product_id . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    

                    Database::iud("INSERT INTO `product_img`(`img_path`,`product_id`,`index_id`) VALUES 
                    ('" . $file_name . "','" . $product_id . "','" . $x . "')");


                    if ($x == $whichImage) {
                        Database::iud("INSERT INTO indeximage (`index`,`product_img_path`) VALUES ('" . $whichImage . "','" . $file_name . "')");
                    }
                } else {
                    echo ("Only JPEG, PNG, JPG and SVG images are allowed.");
                }
            }
        }

        echo "success";
        
    } else {
        echo ("Please insert product images.");
    }
}
