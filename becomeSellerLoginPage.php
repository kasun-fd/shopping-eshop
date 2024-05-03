<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Seller-SignUp</title>
    <link rel="stylesheet" href="./becomeSellerLogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    session_start();
    if (!isset($_COOKIE["emailSeller"])) {
    ?>
        <!-- <a href="./index.php" style="width: 50px; height: 50px; margin-top: -590px;">
            <i class="fa-solid fa-circle-left" style="color: #c251c1; font-size: 50px;"></i>
        </a> -->

        <div style="position: absolute; display: none;" id="sellersignupDiv">
            <div style="width: 100%; display: flex; align-items: center; justify-content: center; padding: 10px;">
                <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; background-color: #f0a8ae; position: fixed; width: 350px; height: 50px; top: 0; display: flex; align-items: center; justify-content: center;">
                    <span class="material-symbols-outlined">
                        report
                    </span>
                    &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="sellersignup"></span>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="title">Become a seller</div>
            <div class="content">
                <div class="user-details" style="height: 350px; overflow-y: auto;">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" autofocus="off" autocomplete="off" id="fullName" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">User name</span>
                        <input type="text" placeholder="Enter your username" autocapitalize="off" autocomplete="off" autofocus="off" id="userName" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" autocapitalize="off" autocomplete="off" autofocus="off" id="email" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" onclick="showText();" autocapitalize="off" autocomplete="off" autofocus="off" onkeypress="pressSignup(event)" placeholder="Enter your Password" id="password">
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile</span>
                        <div class="col-12" style="font-size: 12px; padding-bottom: 10px;">Must be able to chat with Whatsapp</div>
                        <input type="text" placeholder="Enter your Mobile Number" autocapitalize="off" autocomplete="off" autofocus="off" id="mobile" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">National ID Number</span>
                        <input type="text" placeholder="Enter your NIC" autocapitalize="off" autocomplete="off" autofocus="off" id="nic" onkeypress="pressSignup(event)">
                    </div>

                    <div style="background-image: linear-gradient(to left,#4f73e6,#8b55e8);  border-radius: 10px; display: flex; align-items: center; justify-content: center; width: 100%; margin-bottom: 20px; margin-top: 20px; font-weight: 600; font-size: 20px;">
                        <div style="color: white; padding: 10px;">Bank Informations</div>
                    </div>

                    <div class="input-box">
                        <span class="details">Account Name</span>
                        <input type="text" placeholder="Enter your account name" autofocus="off" autocomplete="off" id="aName" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">Account Number</span>
                        <input type="text" placeholder="Enter your account number" autocapitalize="off" autocomplete="off" autofocus="off" id="aNumber" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">Bank Name</span>
                        <input type="email" placeholder="Enter bank name" autocapitalize="off" autocomplete="off" autofocus="off" id="bank" onkeypress="pressSignup(event)">
                    </div>
                    <div class="input-box">
                        <span class="details">Branch Name</span>
                        <input type="text" autocapitalize="off" autocomplete="off" autofocus="off" onkeypress="pressSignup(event)" placeholder="Enter branch name" id="branch">
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" checked name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div style="display: none;" id="showContentPassword">
                        <div style="width: 100%; display: flex; align-items: center; justify-content: end;">
                            <div style="background-color: #f0a8ae; font-weight: 500; padding: 5px; border-radius: 8px; width: 70%; margin-top: -40px; font-size: 13px;">Password should have at least 01 capital letter, 02 simple letters, 02 decimal numbers and 01 special character.</div>
                        </div>
                    </div>

                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                    <div class="button">
                        <input type="submit" onclick="sellerSignup();" value="Register">
                    </div>
                    <div style="margin-top: -20px; width: 100%; display: flex; align-items: center; justify-content: center;">
                        Already have an account?&nbsp;&nbsp; <a href="./becomeASellerLoginLogin.php">Login now</a>
                    </div>
                </div>
            </div>
        <?php
    } else {
        header("Location: becomeASellerLoginLogin.php");
    }
        ?>


        <script src="./becomeSellerLogin.js"></script>
</body>

</html>