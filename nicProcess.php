<?php
require "./connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$nic = $_POST["n"];

if (empty($nic)) {
    echo "Please enter your NIC.";
} else {
    $nicquery = Database::search("SELECT * FROM seller WHERE `nic` = '" . $nic . "'");
    $nic_num = $nicquery->num_rows;

    if ($nic_num == 1) {

        $data = $nicquery->fetch_assoc();
        $email = $data["email"];

        $code = uniqid();

        Database::iud("UPDATE `seller` SET `verification_code` = '" . $code . "' WHERE `nic` = '" . $nic . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fernandokasun672@gmail.com';
        $mail->Password = 'xeta ajtx asnp ndxo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('fernandokasun672@gmail.com', 'Reset Password');
        $mail->addReplyTo('fernandokasun672@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Shopping Seller Forgot Password Verification Code';
        $bodyContent = '<h4 style="color:black; font-family: Courier New, Courier, monospace; ">Your verification code is <span style=" text-decoration: underline; color:#75C2F6;">' . $code . '</span> </h4>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Verification Code Sending Failed.");
        } else {
            echo ("success");
        }
    } else {
        echo "Invalid NIC and please try again.";
    }
}
