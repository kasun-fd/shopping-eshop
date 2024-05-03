<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Seller-Login</title>
    <link rel="stylesheet" href="./becomeASellerLoginLogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- =================================== LOGIN ==================================-->
    <!-- <a href="./index.php" style="width: 50px; height: 50px; margin-right: 10px; margin-top: -450px;">
        <i class="fa-solid fa-circle-left" style="color: #c251c1; font-size: 50px;"></i>
    </a> -->

    <div class="wrapper">
        <div style="display: block; width: 100%;" id="loginDiv">
            <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                <div style="position: absolute; display: none;" id="sellerLoginDiv">
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                        <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; background-color: #f0a8ae; position: fixed; width: 350px; height: 50px; top: 0; display: flex; align-items: center; justify-content: center;">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                            &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="sellerLogin"></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            session_start();
            if (isset($_COOKIE["alert001"])) {
            ?>
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    <div style="position: absolute; display: block;" id="sellerLoginDiv11">
                        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                            <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; background-color: #8ebea7; position: fixed; width: 350px; height: 50px; top: 0; display: flex; align-items: center; justify-content: center;">
                                <span class="material-symbols-outlined">
                                    verified
                                </span>
                                &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="sellerLogin">Password successfully reset.</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>


            <script>
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "95%"
                }, 3000);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "90%"
                }, 3100);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "80%"
                }, 3200);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "70%"
                }, 3300);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "60%"
                }, 3400);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "50%"
                }, 3500);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "40%"
                }, 3600);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "30%"
                }, 3700);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "20%"
                }, 3800);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "10%"
                }, 3900);
                setTimeout(() => {
                    document.getElementById("sellerLoginDiv11").style.opacity = "0"
                }, 4000);
            </script>

            <div class="title">
                Seller Login
            </div>
            <div class="form">
                <div class="field">
                    <input type="text" onkeypress="pressLogin(event)" id="email" required>
                    <label>Email Address</label>
                </div>
                <div class="field">
                    <input type="password" onkeypress="pressLogin(event)" id="password" required>
                    <label>Password</label>
                </div>
                <div class="content">
                    <div class="pass-link">
                        <a onclick="forgotPasswordSeller();" href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="field">
                    <input type="submit" onclick="sellerLogin();" value="Login">
                </div>
                <?php
                if (!isset($_COOKIE["emailSeller"])) {
                ?>
                    <div class="signup-link">
                        Not a member? <a href="./becomeSellerLoginPage.php">Signup now</a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
        <div style="display: none;" id="nicDiv">
            <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                <div style="position: absolute; display: none;" id="sellerNicDiv">
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                        <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; background-color: #f0a8ae; position: fixed; width: 350px; height: 50px; top: 0; display: flex; align-items: center; justify-content: center;">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                            &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="sellerNic"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form">
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 20px; font-weight: 500;">Enter Your NIC</span>
                </div>
                <div class="field">
                    <input type="text" onkeypress="pressNic(event)" id="nicCheck" required>
                    <label>NIC</label>
                </div>
                <div class="field">
                    <input type="submit" onclick="nicCheck();" value="Continue">
                </div>
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    Go to Login?&nbsp;&nbsp; <a style="text-decoration: none;" href="./becomeASellerLoginLogin.php">Login</a>
                </div>
            </div>
        </div>
        <div style="display: none;" id="resetDiv">
            <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                <div style="position: absolute; display: none;" id="resetPassSellerDiv">
                    <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                        <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; background-color: #f0a8ae; position: fixed; width: 350px; height: 50px; top: 0; display: flex; align-items: center; justify-content: center;">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                            &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="resetPass"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form">
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 20px; font-weight: 500;">Reset Password</span>
                </div>
                <div class="field">
                    <input type="text" onkeypress="pressReset(event)" id="resetSellerNew" required>
                    <label>New Password</label>
                </div>
                <div class="field">
                    <input type="text" onkeypress="pressReset(event)" id="resetSellerCom" required>
                    <label>Comfirm Password</label>
                </div>
                <div class="field">
                    <input type="text" onkeypress="pressReset(event)" id="varCode" required>
                    <label>Verification Code</label>
                </div>
                <div class="field">
                    <input type="submit" onclick="resetSeller();" value="Change">
                </div>
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    Go to Login?&nbsp;&nbsp; <a style="text-decoration: none;" href="./becomeASellerLoginLogin.php">Login</a>
                </div>
            </div>
        </div>

    </div>
    <script src="./becomeASellerLoginLogin.js"></script>
</body>

</html>