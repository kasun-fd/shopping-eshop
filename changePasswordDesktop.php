<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Change Password</title>
    <link rel="stylesheet" href="./changePassword.css">

    <!-- ============== ICON =========================-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-none d-md-block" style="background-color: #eff0f4; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <?php
    if (isset($_COOKIE["name"])) {
    ?>

        <div class="changePasswordMain">
            <div class="hide" id="msgdivCur">
                <div style="width: 100%; position: fixed;  bottom: 0; display: flex; align-items: center; justify-content: center; z-index: 9999;">
                    <div>
                        <div class="alert alert-danger" style="width: 400px; height: 50px; border-radius: 10px;
                    display: flex; align-items: center; justify-content: center;" role="alert">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                            &nbsp;
                            <span style="font-size: 13px; font-weight: 600; text-align: center;" id="msgCur"></span>
                        </div>
                    </div>

                </div>
            </div>


            <div class="changePasswordDesktop d-block ">
                <div class="changePasswordDesktopMainDiv">
                    <div class="mainDiv">
                        <div class="cardStyle">

                            <h2 class="formTitle">
                                Change Password
                            </h2>

                            <div class="inputDiv">
                                <label class="inputLabel" for="passwordCur">Current Password</label>
                                <input type="password" id="passwordCur" class="passwordCur" autocapitalize="off" autocomplete="off" onkeypress="changePassword(event);" required>
                                <i class='bx bx-hide eye-iconCur eyeChange'></i>
                            </div>

                            <div class="inputDiv cur">
                                <label class="inputLabel" for="passwordNew">New Password</label>
                                <input type="password" id="passwordNew" class="passwordNew" autocapitalize="off" autocomplete="off" onkeypress="changePassword(event);" required>
                                <i class='bx bx-hide eye-icon1 eyeChange'></i>
                            </div>

                            <div class="inputDiv">
                                <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                                <input type="password" id="confirmPassword" class="passwordCom" autocapitalize="off" autocomplete="off" onkeypress="changePassword(event);" required>
                                <i class='bx bx-hide eye-icon eyeChange'></i>
                            </div>

                            <div class="buttonWrapper">
                                <button type="submit" id="submitButton" onclick="validateSignupForm();" class="submitButton pure-button pure-button-primary">
                                    <span>Change</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
    } else {
        header("Location: index.php");
    }
    ?>

 
    <script src="./changePassword.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>