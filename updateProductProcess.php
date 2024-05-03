<?php
require "./connection.php";
session_start();
$email = $_COOKIE["emailSeller"];
$product = $_SESSION["p"];

$t = $_POST["t"];
$d = $_POST["d"];
$p = $_POST["p"];
$dis = $_POST["dis"];
$dis_type = $_POST["dis_type"];
$qty = $_POST["qty"];
$color = $_POST["color"];
$whichImage = $_POST["whichImage"];


if (empty($t)) {
    echo "Please enter product title first.";
} else if (empty($d)) {
    echo "Please enter product description first.";
} else if (empty($p)) {
    echo "Please enter unit price first.";
} else if (preg_match("/[A-Za-z]/", $p)) {
    echo "Please do not use letters in the price field.";
} else if (preg_match("/\W/", $p)) {
    echo "Please do not use special characters or leave spaces in the price field.";
} else if (strpos($p, "%") !== false) {
    echo "Please do not use precentage mark in the price field.";
} else if (empty($qty)) {
    echo "Please enter quantity first.";
} else if (preg_match("/[A-Za-z]/", $qty)) {
    echo "Please do not use letters in the quantity field.";
} else if (preg_match("/\W/", $qty)) {
    echo "Please do not use special characters or leave spaces in the quantity field.";
} else {

    $price_after = $p;

    if (empty($dis)) {
        $dis = 0;
    } else {
        $price_process = ($p * $dis) / 100;
        $price_after = $p - $price_process;
        if ($price_after <= 0) {
            $price_after == 0;
        }
    }

    if ($dis_type == "delete") {
        $dis_type = 0;
    }

    $dd = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $dd->setTimezone($tz);
    $date = $dd->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("UPDATE product SET `title` = '" . htmlspecialchars($t, ENT_QUOTES) . "' , `description` = '" . htmlspecialchars($d, ENT_QUOTES) . "' , `price` = '" . $p . "', `current_price` = '" . $price_after . "' , `discount` = '" . $dis . "' ,
    `qty` = '" . $qty . "' , `datetime_added` = '" . $date . "' , `discount_type_id` = '" . $dis_type . "' WHERE `user_email` = '" . $email . "' AND `id` = '" . $product["id"] . "'");



    $product_id = Database::$connection->insert_id;



    if (!empty($color)) {

        Database::iud("DELETE FROM color WHERE `product_id` = '" . $product["id"] . "'");

        $myArray = explode(",", $color);

        for ($i = 0; $i < count($myArray); $i++) {
            $colors = $myArray[$i];
            $trimmed_data = trim($colors);
            $data = ucfirst(strtolower($trimmed_data));
            Database::iud("INSERT INTO color (`clr_name`,`product_id`) VALUES ('" . $data . "','" . $product["id"] . "')");
        }
    }

    $index = 0;

    $length = sizeof($_FILES);

    if ($length <= 4 && $length > 0) {

        $allowed_image_extensions = array("image/jpeg", "image/jpg", "image/png", "image/svg+xml");

        $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product["id"] . "'");
        $img_num = $img_rs->num_rows;

        for ($y = 0; $y < $img_num; $y++) {
            $img_data = $img_rs->fetch_assoc();

            unlink($img_data["img_path"]);
            Database::iud("DELETE FROM `product_img` WHERE `product_id`='" . $product["id"] . "'");
            Database::iud("DELETE FROM `indeximage` WHERE `product_img_path`='" . $img_data["img_path"] . "'");
        }

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

                    $file_name = "resource//mobile_images//" . "_" . "Product_Id" . "-" . $product_id . "_" . $x . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);


                    Database::iud("INSERT INTO `product_img`(`img_path`,`product_id`,`index_id`) VALUES 
                    ('" . $file_name . "','" . $product["id"] . "','" . $x . "')");


                    if ($x == $whichImage) {
                        Database::iud("INSERT INTO indeximage (`index`,`product_img_path`) VALUES ('" . $whichImage . "','" . $file_name . "')");
                    }
                } else {
                    echo ("Only JPEG, PNG, JPG and SVG images are allowed.");
                }
            }
        }
    }



    $get_query = Database::search("SELECT * FROM product WHERE `id` = '" . $product["id"] . "' AND `user_email` = '" . $email . "'");
    $get_data = $get_query->fetch_assoc();

    $_SESSION["p"] = $get_data;

    echo ("success");
}
