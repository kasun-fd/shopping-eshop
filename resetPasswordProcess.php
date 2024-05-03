<?php

require "connection.php";

$email = $_POST["e"];
$new_pw = $_POST["np"];
$retyped_pw = $_POST["rnp"];
$v_code = $_POST["vc"];

$pattern = '/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>?]/'; // Common special characters
$patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; // email validate
$patternTrim = '/^[^\s]+(\s+[^\s]+)*$/'; // Matches words separated by whitespace

if (empty($new_pw)) {
    echo "Please Enter Your Password.";
} else if (!preg_match('/[A-Z]/', $new_pw)) {
    echo "Password must contains at least one capital letter.";
} else if (!preg_match('/[a-z]/', $new_pw)) {
    echo "Password must contains at least one simple letter.";
} else if (!preg_match('/[0-9]/', $new_pw)) {
    echo "Password must contains at least one number.";
}    else if (!preg_match($pattern, $new_pw)) {
    echo "Password must contains at least one special character.";
} else if (strlen($new_pw) < 5 || strlen($new_pw) > 20) {
    echo "Password Length Must Be Between 5 - 20 Characters.";
}else if(empty($retyped_pw)){
    echo "Please Retype the New Password";
}else if($new_pw != $retyped_pw){
    echo "Password does not matched";
}else if(empty($v_code)){
    echo "Please enter your verification code";
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `verification_code`='".$v_code."'");

    $n = $rs->num_rows;

    if($n == 1){
        Database::iud("UPDATE `user` SET `password`='".preg_replace('/\s+/', '', $new_pw)."' WHERE `email`='".$email."' 
        AND `verification_code`='".$v_code."'");
        
        setcookie("email","",-1);
        // setcookie("password","",-1);

        setcookie("email", $email, time() + (60 * 60 * 3));
        // setcookie("password", $retyped_pw, time() + (60 * 60 * 1));
        echo "success";
    }else{
        echo "Invalid user details";
    }

}
?>