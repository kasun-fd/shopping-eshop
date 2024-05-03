<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- ========= bootstrap ============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="./mobileSettings.css">
</head>

<body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">
    <!-- ================================== HEADER start ==================================-->
    <div class="HeaderMobileMain">
        <div class="HeaderMobileSub01">
            <a href="./mobileAccount.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
            <span class="HeaderMobileMainText">Settings</span>
        </div>
        <div class="HeaderMobileSub02">
            <?php
            require "./MobileHeader.php";
            ?>
        </div>

    </div>

    <div class="mobileSettingMain">
        <div class="mobileSeettingSub">
            <a href="./changePassword.php" class="mobileSettingDiv">
                <div class="mobileSettingDiv1">
                    <span class="mobileSettingChangePasswordText">Change Password</span>
                </div>
                <div class="mobileSettingDiv2">
                    <i class="fa-solid fa-chevron-right mobileSettingIcon"></i>
                </div>
            </a>
            <a href="#" onclick="mobileLogout();" class="mobileSettingDivtwo">
                <div class="mobileSettingLogoutFirst">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal mobileSettingIcon2"></i>
                </div>
                <div class="mobileSettingLogoutSecond">
                    <div class="mobileSettingLogoutMainTextDiv">
                        <span class="mobileSettinglogoutText">Logout</span>
                    </div>
                    <div class="mobileSettingLogoutSubTextDiv">
                        <?php
                        if (isset($_COOKIE["email"])) {
                            $data = $_COOKIE["email"];
                        ?>
                            <span class="mobileSettinglogoutEmail"><?php echo $data; ?></span>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </a>

        </div>
    </div>

    <script src="./mobileSettings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>