<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if (empty($email)){
        echo "Please Enter Your Email";
    }else if($n == 1){
        
        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

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
            $mail->Subject = 'Shopping Forgot Password Verification Code';
            $bodyContent = '<h4 style="color:black; font-family: Courier New, Courier, monospace; ">Your verification code is <span style=" text-decoration: underline; color:#75C2F6;">'.$code.'</span> </h4>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo ("Verification Code Sending Failed.");
            }else{
                echo ("success");
            }

    }else{
        echo ("Invalid Email Address.");
    }

}else{
    echo ("Please enter your Email Address First.");
}

?>