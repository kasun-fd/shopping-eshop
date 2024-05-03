<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Manage Account</title>
    <link rel="stylesheet" href="./manageAccount.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body style="background-color: #eff0f4; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;" class="d-none d-md-block">
    <div class="position-sticky top-0 w-100" style="z-index: 9999;">

        <?php

        require "./headerNew.php";

        ?>
    </div>
    <div class="col-12 d-grid justify-content-center align-items-center mt-3">
        <div class="col-12 d-flex align-items-center justify-content-center p-0">
        <div class="col-11 p-0">
            <?php
            if (isset($_COOKIE["name"])) {

            ?>
                <div class="sidebar" style="z-index: 99999;">
                    <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" onclick="myProfile();" class="active" href="#">&nbsp;<i class="fa-regular fa-user fs-3"></i>&nbsp;&nbsp;&nbsp;My Profile</a>
                    <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="./myOrders.php">&nbsp;<i class="fa-solid fa-inbox fs-3"></i>&nbsp;&nbsp;&nbsp;My Orders</a>
                    <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="./myWishlist.php">&nbsp;<i class="fa-regular fa-heart fs-3"></i>&nbsp;&nbsp;&nbsp;Wishlist</a>
                </div>

                <div class="content">
                    <div class="d-block col-12" id="myProfileContent">
                        <?php
                        $email = $_COOKIE["email"];

                        $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                        user.gender_gender_id=gender.gender_id WHERE `email`='" . $email . "'");

                        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");

                        $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                        user_has_address.city_city_id=city.city_id INNER JOIN `district` ON
                        city.district_district_id=district.district_id INNER JOIN `province` ON
                        district.province_province_id=province.province_id WHERE `user_email`='" . $email . "'");

                        $user_details = $details_rs->fetch_assoc();
                        $image_details = $image_rs->fetch_assoc();
                        $address_details = $address_rs->fetch_assoc();

                        ?>

                        <div class="col-12 h-100 d-lg-flex-col align-items-start justify-content-center p-0" style="margin-bottom: 40px;">
                            <div class="col-12 col-lg-12 col-md-12 w-100 mb-4 d-flex" style="height: 70px; background-color: #ffffff; border-radius: 10px; margin-top: 5px;">
                                <div class="col-6 bg d-flex align-items-center justify-content-start" style="height: 70px;">
                                    <?php

                                    if (isset($_COOKIE["name"])) {
                                        $data = $_COOKIE["name"]
                                    ?>

                                        <span id="greetingManage" style="color: #5708e1; font-size: 15px; font-weight: 700; font-family: Arial, Helvetica, sans-serif;"></span>&nbsp;
                                        <span style="color: #191919; font-size: 12px; font-weight: 700; font-family: Arial, Helvetica, sans-serif; margin-top: 3px;"><?php echo $data; ?></span>

                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end gap-3" style="height: 70px;">
                                    <div class="d-none">
                                        <input type="file" id="upoadImage">

                                    </div>
                                    <label class="btn-grad d-flex align-items-center justify-content-center" for="upoadImage" style="color: white; font-size: 10px; cursor: pointer;" onclick="changeProfileImg();">Update Picture</label>

                                    <?php

                                    if (empty($image_details["path"])) {

                                        $data = $_COOKIE["email"];
                                        $query = Database::search("SELECT `gender_gender_id` FROM `user` WHERE `email` = '" . $data . "'");
                                        $d = $query->fetch_assoc();

                                        if ($d["gender_gender_id"] == 1) {
                                    ?>
                                            <img src="./avatar/avatarBoy.jpg" id="img" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 70px; height: 70px; border: 3px solid #9b12ff;">
                                        <?php

                                        } else {
                                        ?>
                                            <img src="./avatar/avatarGirl.jpg" id="img" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 70px; height: 70px; border: 3px solid #9b12ff;">
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <img src="<?php echo $image_details["path"]; ?>" id="img" loading="lazy" class="rounded-circle p-1" alt="avatar Boy" style="object-fit: cover; width: 70px; height: 70px; border: 3px solid #9b12ff;">
                                    <?php
                                    }

                                    ?>
                                    <?php



                                    ?>
                                </div>
                            </div>
                            <div class="d-none" id="comfirmButtons">
                                <div class="col-12 d-flex align-items-center justify-content-end pt-1 pe-5">
                                    <div class=" p-2 d-flex align-items-center justify-content-center rounded-3 gap-2" style="background-color: #f5f5f5;">
                                        <button class="buttonConfirm" style="font-weight: 600;" onclick="confirmDP();">Confirm</button>
                                        <button class="notNowComfirm" style="font-weight: 600;" onclick="notNow();">Not Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 d-flex flex-column align-items-start justify-content-center pb-3 ps-2 pe-2" style="border-radius: 10px; margin-top: 5px; margin-bottom: 5px; background-color: #ffffff; overflow: auto;">
                                <div class="col-12 col-lg-12 d-flex align-items-center justify-content-center ps-0">
                                    <div class="col-6 ps-0">
                                        <h1 class="mt-4 ms-2" style="font-size: 20px; text-align: start;">Manage My Profile</h1>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <span style="font-size: 11px;" class="mt-4">Register Date&nbsp;</span>&nbsp;
                                        <span class="fs-6 fw-bold mt-4">:&nbsp;<?php echo $user_details["joined_date"]; ?></span>
                                    </div>


                                </div>

                                <div class="col-12 col-lg-12" style="border-radius: 10px; height: auto; background-color: #ede4ff;">
                                    <div class="row">
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="fname" value="<?php echo $user_details["fname"]; ?>" style="border: 2px solid #9b12ff; font-size: 14px; height: 50px; border-radius: 8px;">
                                                <label class="fs-5" for="fname">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="lname" value="<?php echo $user_details["lname"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                <label for="lname" class="fs-5">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="mobile" value="<?php echo $user_details["mobile"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                <label for="mobile" class="fs-5">Mobile Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 mt-4" style="border-radius: 10px; height: auto; background-color: #ede4ff;">
                                    <div class="row">
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" value="<?php echo $user_details["email"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;" disabled>
                                                <label for="email" class="fs-5">Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="gender" value="<?php echo $user_details["gender_name"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;" disabled>
                                                <label for="gender" class="fs-5">Gender</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3 d-flex align-items-center justify-content-center">
                                            <button class="btn-grad1 offset-lg-6 col-12 col-lg-6" onclick="changePassword();" style="font-size: 11px; height: 40px; border-radius: 8px; border: none;">Change Password</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 d-flex align-items-center justify-content-center ps-0 mt-3">
                                    <div class="col-6 ps-0">
                                        <h1 class="mt-4 ms-2" style="font-size: 20px; font-weight: 500; text-align: start;">Address Information</h1>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">

                                    </div>


                                </div>
                                <div class="col-12 col-lg-12 mt-4" style="border-radius: 10px; height: auto; background-color: #ede4ff;">
                                    <div class="row">
                                        <?php
                                        if (empty($address_details["line1"])) {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="line1" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label class="fs-5" for="line1">Address Line One</label>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="line1" value="<?php echo $address_details["line1"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label class="fs-5" for="line1">Address Line One</label>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (empty($address_details["line2"])) {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="line2" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label for="line2" class="fs-5">Address Line Two</label>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="line2" value="<?php echo $address_details["line2"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label for="line2" class="fs-5">Address Line Two</label>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (empty($address_details["postal_code"])) {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="pcode" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label for="pcode" class="fs-5">Postal pcode</label>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6 col-lg-4 pt-3 pb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="pcode" value="<?php echo $address_details["postal_code"]; ?>" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;">
                                                    <label for="pcode" class="fs-5">Postal Code</label>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $province_rs = Database::search("SELECT * FROM `province` ORDER BY province_name ASC");
                                        $district_rs = Database::search("SELECT * FROM `district` ORDER BY district_name ASC");
                                        $city_rs = Database::search("SELECT * FROM `city` ORDER BY city_name ASC");
                                        ?>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <select class="form-select fs-5" id="province" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;" aria-label="Floating label select example">
                                                    <option selected value="0">Select Your Province</option>
                                                    <?php
                                                    for ($x = 0; $x < $province_rs->num_rows; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                                                        if (!empty($address_details["province_id"])) {
                                                                                                                            if ($province_data["province_id"] == $address_details["province_id"]) {
                                                                                                                        ?>selected<?php
                                                                                                                                }
                                                                                                                            }
                                                                                                                                    ?>>
                                                            <?php echo $province_data["province_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="province" class="fs-5">Province</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <select class="form-select fs-5" id="district" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;" aria-label="Floating label select example">
                                                    <option selected value="0">Select Your District</option>
                                                    <?php
                                                    for ($x = 0; $x < $district_rs->num_rows; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                                                        if (!empty($address_details["district_id"])) {
                                                                                                                            if ($district_data["district_id"] == $address_details["district_id"]) {
                                                                                                                        ?>selected<?php
                                                                                                                                }
                                                                                                                            }
                                                                                                                                    ?>>
                                                            <?php echo $district_data["district_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <label for="district" class="fs-5">District</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 pt-3 pb-3">
                                            <div class="form-floating">
                                                <select class="form-select fs-5" id="city" style="font-size: 14px; height: 50px; border-radius: 8px; border: 2px solid #9b12ff;" aria-label="Floating label select example">
                                                    <option selected value="0">Select Your City</option>
                                                    <?php
                                                    for ($x = 0; $x < $city_rs->num_rows; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["city_id"]; ?>" <?php
                                                                                                                if (!empty($address_details["city_id"])) {
                                                                                                                    if ($city_data["city_id"] == $address_details["city_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                            ?>>
                                                            <?php echo $city_data["city_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="city" class="fs-5">City</label>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3 col-12 d-flex align-items-center justify-content-start">
                                            <button class="btnUpdate col-12 col-lg-2" style="font-size: 14px; font-weight: 600; height: 40px; border-radius: 8px; border:none;" onclick="updateProfile();">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>


                    <!-- ================================================= CHANGE PASSWORD =============================================-->
                    <div class="d-none col-12" style="margin-top: 7px; width: 100%;" id="changePasswordContent">

                        <link rel="stylesheet" href="./changePassword.css">
                        <div class="col-12 w-100 ps-0 pe-0" style="height: auto; width: 100%; border-radius: 10px; background-color: #ede4ff; ">
                            <div class="col-12 ps-0 ms-0 me-0 pe-0 mb-3" style="height: auto; width: 100%;">
                                <div class="col-12 ms-0 me-0">
                                    <div class="row">
                                        <div class="hide" id="msgdivCur">
                                            <div style="width: 100%; position: absolute;  top: 0; display: flex; align-items: start; justify-content: center; z-index: 9999;">
                                                <div>
                                                    <div class="alert" style="background-color: #f0a8ae; width: 400px; height: 50px; border-radius: 10px;
                                                        display: flex; align-items: start; justify-content: center;" role="alert">
                                                        <span class="material-symbols-outlined">
                                                            report
                                                        </span>
                                                        &nbsp;
                                                        <span style="font-size: 13px; font-weight: 600; text-align: center;" id="msgCur"></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="changePasswordDesktop d-block ms-2 me-2">
                                            <div class="changePasswordDesktopMainDiv">
                                                <div class="mainDiv">
                                                    <div class="cardStyle">

                                                        <h2 class="formTitle">
                                                            Change Password
                                                        </h2>

                                                        <div class="inputDiv">
                                                            <label class="inputLabel" for="passwordCur">Current Password</label>
                                                            <input type="password" id="passwordCur" class="passwordCur" autocapitalize="off" autocomplete="off" onkeypress="changePassword1(event);;" required>
                                                            <i class='bx bx-hide eye-iconCur eyeChange'></i>
                                                        </div>

                                                        <div class="inputDiv cur">
                                                            <label class="inputLabel" for="passwordNew">New Password</label>
                                                            <input type="password" id="passwordNew" class="passwordNew" autocapitalize="off" autocomplete="off" onkeypress="changePassword1(event);;" required>
                                                            <i class='bx bx-hide eye-icon1 eyeChange'></i>
                                                        </div>

                                                        <div class="inputDiv">
                                                            <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                                                            <input type="password" id="confirmPassword" class="passwordCom" autocapitalize="off" autocomplete="off" onkeypress="changePassword1(event);;" required>
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

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================== alert Profile Update =========================-->
                    <div class="hide" id="msgDivUpdateProfile">
                        <div style="width: 100%; position: fixed; left: 0;  bottom: 0; display: flex; align-items: center; justify-content: center; z-index: 9999;">
                            <div class="alert" style="background-color: #f0a8ae; width: 400px; height: 50px; border-radius: 10px;
                    display: flex; align-items: center; justify-content: center;" role="alert">
                                <span class="material-symbols-outlined">
                                    report
                                </span>
                                &nbsp;
                                <span style="font-size: 13px; font-weight: 600; text-align: center;" id="msgProfileUpdate"></span>
                            </div>

                        </div>
                    </div>

                <?php
            } else {
                ?>

                    <script>
                        window.location = "index.php";
                    </script>

                <?php
            }

                ?>
                </div>

        </div>
        </div>
       

        <!-- ===================== footer ======================-->
        

        <script src="./changePassword.js"></script>
        <script src="./manageAccount.js"></script>
        <style>
            @media (min-width: 992px) {
                .back-to-top {
                    width: 35px;
                    height: 40px;
                    position: fixed;
                    display: none;
                    right: 10px;
                    bottom: 30px;
                    z-index: 11;
                    border-radius: 8px;
                    animation: action 1s infinite alternate;
                }

                @keyframes action {
                    0% {
                        transform: translateY(0);
                    }

                    100% {
                        transform: translateY(-15px);
                    }
                }
            }

            @media (max-width: 992px) {
                .back-to-top {
                    width: 30px;
                    height: 30px;
                    position: fixed;
                    display: none;
                    right: 10px;
                    bottom: 30px;
                    z-index: 11;
                    border-radius: 8px;
                    animation: action 1s infinite alternate;
                }

                @keyframes action {
                    0% {
                        transform: translateY(0);
                    }

                    100% {
                        transform: translateY(-15px);
                    }
                }
            }
        </style>
        <!-- Footer Section Begin -->
        <div class="d-none d-lg-block">
            <a href="#" class="btn back-to-top" style="background-color: #a938ff;">
                <div style="width: 100%; height: 100%;" class="d-flex align-items-center justify-content-center">
                    <i class="fa fa-angle-double-up text-white fs-3"></i>
                </div>
            </a>
        </div>
        <div class="d-none d-md-block d-lg-none">
            <a href="#" class="btn back-to-top" style="background-color: #a938ff;">
                <div style="width: 100%; height: 100%;" class="d-flex align-items-center justify-content-center">
                    <i class="fa fa-angle-double-up text-white fs-5"></i>
                </div>
            </a>
        </div>

        <script>
            // Back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 100, 'easeInOutExpo');
                return false;
            });
        </script>
</body>

</html>