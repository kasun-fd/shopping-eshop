<?php
session_start();
require "./connection.php";

$email = $_COOKIE["email"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Profile Information</title>

    <!-- =============== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="./mobileProfileInfo.css">

    <!-- =============== -->
</head>

<body class="textNotCopy">

    <?php

    if (isset($_COOKIE["name"])) {
    ?>
        <!-- ========================== QUERY ===================================-->
        <?php

        $query = Database::search("SELECT * FROM user JOIN gender ON gender_gender_id=gender_id WHERE `email`='" . $email . "'");
        $data = $query->fetch_assoc();

        $image = Database::search("SELECT * FROM profile_img WHERE `user_email`= '" . $email . "'");
        $image_data = $image->fetch_assoc();
        ?>


        <!-- ================================== ALERT start  ==================================-->
        <?php
        if (isset($_COOKIE["alert2"])) {
        ?>
            <div id="alertBodyMobile">
                <div class="box">
                    <div class="image"><img loading="lazy" src="./img/check.png"></div>
                    <p class="message">Successfully updated</p>
                </div>
            </div>

        <?php
        }
        if (isset($_COOKIE["alert3"])) {
        ?>
            <div id="alertBodyMobile">
                <div class="box">
                    <div class="image"><img loading="lazy" src="./img/check.png"></div>
                    <p class="message">Successfully Saved</p>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- ================================== HEADER start ==================================-->


        <div class="HeaderMobileMain">
            <div class="HeaderMobileSub01">
                <a href="./mobileAccount.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                <span class="HeaderMobileMainText">Profile</span>
            </div>
            <div class="HeaderMobileSub02">
                <?php
                require "./MobileHeader.php";
                ?>
            </div>
        </div>

        <div class="col-12 mt-2 d-flex flex-column align-items-center justify-content-center">
            <div class="col-11 d-flex align-items-center justify-content-between mb-2" style="background-color: #ede4ff; height: 55px; border-radius: 50px 8px 8px 50px;">
                <div class="col-6 d-flex align-items-center justify-content-start ps-2">
                    <?php

                    if (empty($image_data["path"])) {

                        if ($data["gender_gender_id"] == 1) {
                    ?>
                            <img src="./avatar/avatarBoy.jpg" id="imgMobile" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 60px; height: 60px; 
                            border: 3px solid #9b12ff;">
                        <?php

                        } else {
                        ?>
                            <img src="./avatar/avatarGirl.jpg" id="imgMobile" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 60px; height: 60px; 
                            border: 3px solid #9b12ff;">
                        <?php
                        }
                    } else {
                        ?>
                        <img src="<?php echo $image_data["path"]; ?>" id="imgMobile" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 60px; height: 60px; 
                        border: 3px solid #9b12ff;">
                    <?php
                    }

                    ?>
                    <?php



                    ?>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-end">
                    <div class="d-none">
                        <input type="file" id="upoadImageMobile">

                    </div>
                    <label class="btn-gradMobile d-flex align-items-center justify-content-center me-2 rounded-2" for="upoadImageMobile" style="color: white; font-size: 10px; cursor: pointer; 
                    width: 90px; height: 40px;" onclick="changeProfileImgMobile();">Update Picture</label>
                </div>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center mb-2 d-none" id="buttoncon">
                <div class="col-12 mb-2 d-flex align-items-center justify-content-center gap-2">
                    <button class="buttonConfirm" onclick="updateProfile();">Confirm</button>
                    <button class="notNowComfirm" onclick="notNowCon();">Not Now</button>
                </div>
            </div>
            <div class="col-12 d-flex flex-column align-items-center justify-content-start pt-3 pb-3" style="background-color: #e3e3e3;">

                <!-- ========================= OFFCANVAS 01======================-->

                <div class="col-11 d-flex align-items-center justify-content-start offcan01" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom1" aria-controls="offcanvasBottom">
                    <div class="col-4 ps-2 d-flex align-items-center justify-content-start" style="font-weight: 500; font-size: 14px;">Full Name</div>
                    <?php
                    if (empty($data["fname"])) {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center" 
                        style="margin-bottom: 1px;">Not Set</span>
                        <i class="fa-solid fa-chevron-right ms-2 fs-6"></i></div>
                    <?php
                    } else {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center" 
                        style="margin-bottom: 1px;">
                        <?php echo $data["fname"] ?><span>&nbsp;</span><?php echo $data["lname"] ?></span><i class="fa-solid fa-chevron-right ms-2 fs-6"></i></div>
                    <?php
                    }
                    ?>
                </div>

                <!-- ========================== OFFCANVAS 01 BOX =================-->
                <div class="offcanvas offcanvas-bottom" style="height: 300px;" tabindex="-1" id="offcanvasBottom1" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Full Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small pt-1">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-11 d-flex flex-column align-items-center justif-content-center">
                                <div class="col-12 d-flex flex-column">
                                    <span class="mb-1" style="font-size: 12px;">First Name</span>
                                    <input type="text" class="col-12" style="height: 40px; font-size: 16px;" id="fname" value="<?php echo $data["fname"]; ?>" onkeypress="pressProfile(event);">
                                </div>
                                <div class="col-12  d-flex flex-column mt-3">
                                    <span class="mb-1" style="font-size: 12px;">Last Name</span>
                                    <input type="text" class="col-12" style="height: 40px; font-size: 16px;" id="lname" value="<?php echo $data["lname"]; ?>" onkeypress="pressProfile(event);">
                                </div>
                                <div class="col-12 d-flex flex-column mt-3">
                                    <button style="height: 40px; border: none; font-size: 15px;" class="fullNameSave" onclick="saveProfile();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================================================================================================== -->

                <!-- ========================= OFFCANVAS 02 ======================-->
                <a href="./changePassword.php" class="col-11 d-flex align-items-center justify-content-start offcan01 text-decoration-none text-dark">
                    <div class="col-8 ps-2 d-flex align-items-center justify-content-start" style="font-weight: 500; font-size: 14px;">Change Password</div>
                    <div class="col-4 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><i class="fa-solid fa-chevron-right ms-2 fs-6"></i></div>
                </a>
            </div>

            <div class="col-12 d-flex flex-column align-items-center justify-content-start pt-3 pb-3 mt-2" style="background-color: #e3e3e3;">
                <!-- ================================================================================================== -->

                <!-- ========================= OFFCANVAS 03======================-->
                <div class="col-11 d-flex align-items-center justify-content-start offcan01" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom3" aria-controls="offcanvasBottom">
                    <div class="col-4 ps-2 d-flex align-items-center justify-content-start" style="font-weight: 500; font-size: 14px;">Mobile Number</div>
                    <?php
                    if (empty($data["mobile"])) {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center" style="margin-bottom: 1px;">Not Set</span><i class="fa-solid fa-chevron-right ms-2 fs-6"></i></div>
                    <?php
                    } else {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center" style="margin-bottom: 1px;"><?php echo $data["mobile"]; ?></span><i class="fa-solid fa-chevron-right ms-2 fs-6"></i></div>
                    <?php
                    }
                    ?>

                </div>

                <!-- ========================== OFFCANVAS 03 BOX =================-->
                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom3" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Mobile Number</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small pt-1">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-11 d-flex flex-column align-items-center justif-content-center">
                                <div class="col-12 d-flex flex-column">
                                    <span class="mb-1" style="font-size: 12px;">Mobile</span>
                                    <input type="text" class="col-12" style="height: 40px; font-size: 16px;" id="mobile" value="<?php echo $data["mobile"]; ?>" onkeypress="pressProfile(event);">
                                </div>
                                <div class="col-12 d-flex flex-column mt-3">
                                    <button style="height: 40px; border: none; font-size: 15px;" class="fullNameSave" onclick="saveProfile();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================================================================================================== -->

                <!-- ========================= OFFCANVAS 04 ======================-->
                <div class="col-11 d-flex align-items-center justify-content-start offcan01">
                    <div class="col-4 ps-2 d-flex align-items-center justify-content-start textNotCopy" style="font-weight: 500; font-size: 14px;">Email</div>
                    <?php
                    if (empty($data["email"])) {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center textNotCopy" style="margin-bottom: 1px;">Not Set</span></div>
                    <?php
                    } else {
                    ?>
                        <div class="col-8 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center textNotCopy" style="margin-bottom: 1px;"><?php echo $data["email"]; ?></span></div>
                    <?php
                    }
                    ?>

                </div>

                <!-- ================================================================================================== -->

                <!-- ========================= OFFCANVAS 05 ======================-->
                <div class="col-11 d-flex align-items-center justify-content-start offcan01">
                    <div class="col-6 ps-2 d-flex align-items-center justify-content-start textNotCopy" style="font-weight: 500; font-size: 14px;">Gender</div>
                    <?php
                    if (empty($data["gender_gender_id"])) {
                    ?>
                        <div class="col-6 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center textNotCopy" style="margin-bottom: 1px;">Not Set</span></div>
                    <?php
                    } else {
                    ?>
                        <div class="col-6 d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;"><span class="d-flex align-items-center justify-content-center textNotCopy" style="margin-bottom: 1px;"><?php echo $data["gender_name"]; ?></span></div>
                    <?php
                    }
                    ?>

                </div>

            </div>




        </div>
        
    <?php
    } else {
        header("Location: login.php");
    }

    ?>

    <script src="./mobileProfileInfo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>