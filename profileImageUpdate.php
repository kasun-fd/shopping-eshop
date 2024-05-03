<?php
require "./connection.php";
$email = $_COOKIE["email"];

$query = Database::search("SELECT fname FROM user WHERE `email`='".$email."'");
$fnData = $query->fetch_assoc();
$fn = $fnData["fname"];

if (sizeof($_FILES) == 1) {

    $image = $_FILES["img"];
    $image_extension = $image["type"];

    $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

    if (in_array($image_extension, $allowed_image_extensions)) {
        $new_img_extension;

        if ($image_extension == "image/jpeg") {
            $new_img_extension = ".jpeg";
        } else if ($image_extension == "image/png") {
            $new_img_extension = ".png";
        } else if ($image_extension == "image/svg+xml") {
            $new_img_extension = ".svg";
        }

        $file_name = "resource//profile_images//" . $fn . "_" . uniqid() . $new_img_extension;
        move_uploaded_file($image["tmp_name"], $file_name);

        $profile_img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");

        if ($profile_img_rs->num_rows == 1) {

            Database::iud("UPDATE `profile_img` SET `path`='" . $file_name . "' WHERE `user_email`='" . $email . "'");
            $alert = true;
            setcookie("alert", $alert, time() + (4));
            echo ("Updated");
            
        } else {

            Database::iud("INSERT INTO `profile_img`(`path`,`user_email`) VALUES ('" . $file_name . "','" . $email . "')");
            $alert = true;
            setcookie("alert", $alert, time() + (4));
            echo ("Saved");
            
        }
    }
}

?>