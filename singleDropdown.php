<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .profile-img {
            border-radius: 100px;
            width: 35px;
            height: 35px;
            object-fit: cover;
        }

        .imgIcon {
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: black; */
            height: 43px;
            width: 43px;
            border: 2px solid #9707ff;
            border-radius: 100px;
            margin-left: 2px;
            margin-right: 3px;
        }

        .contentTop {
            /* background-color: green; */
            height: 45px;
            width: 90px;
            overflow: hidden;

        }

        .contentOne {
            /* background-color: orange; */
            height: 22.5px;
            width: 90px;
            display: flex;
            align-items: end;
            justify-content: start;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #9400ff;
        }

        .contentTwo {
            /* background-color: red; */
            height: 22.5px;
            width: 90px;
            display: flex;
            align-items: start;
            justify-content: start;
            font-size: 11px;
            font-weight: 500;
            font-family: Arial, Helvetica, sans-serif;
        }

        .contentThree {
            /* background-color: black; */
            display: flex;
            align-items: center;
            justify-content: end;
            width: 15px;
            height: 45px;
        }

        .contentThree i {
            font-size: 12px;
        }

        .dropbtn {
            color: black;
            font-size: 13px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: start;
            width: 160px;
            height: 43px;
            border-radius: 10px;
            background-color: #f2f2f2;
            cursor: pointer;
        }

        .dropdown {
            display: flex;
            background-color: #f2f2f2;
            width: 160px;
            height: 43px;
            border-radius: 8px;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 992px) {
            .dropdown-content {
                display: none;
                position: relative;
                width: 220px;
                z-index: 99999;
                color: black;
                margin-top: 2000px;
                border-radius: 1vw;
                padding-top: 1vw;
                padding-bottom: 1vw;
                padding-left: 0.5vw;
                padding-right: 1vw;
                background-color: #ede4ff;
                transition: all 1s;
            }
            .arrowIcon{
                margin-top: -30px;
                height: 30px; 
                width: 100%;
            }
        }

        @media (max-width: 992px) {
            .dropdown-content {
                display: none;
                position: absolute;
                width: 220px;
                z-index: 99999;
                color: black;
                margin-top: 295px;
                border-radius: 1vw;
                padding-top: 1vw;
                padding-bottom: 1vw;
                padding-left: 15px;
                padding-right: 1vw;
                background-color: #ede4ff;
                transition: all 1s;
            }
            .arrowIcon{
                margin-top: -18px;
                height: 20px;
                width: 100%;
                margin-left: -10px;
                display: flex;
                align-items: start;
                justify-content: center;
            }
        }


        .dropdown-content a {
            color: black;
            padding: 1vw 1vw;
            text-decoration: none;
            display: block;
            font-size: 13px;
            width: 220px;
            border-radius: 10px;

            transition: all 1s;
        }

        .logout {
            color: black;
            padding: 1vw 1vw;
            text-decoration: none;
            display: block;
            font-size: 13px;
            width: 220px;
            border-radius: 10px;
        }

        .txtAll {
            font-size: 13px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .iconAll {
            font-size: 20px;
            transition: all 0.2s;

        }

        .logoutFont {
            font-weight: bold;
        }

        .dropdown-content a:hover {
            background-color: #ffffff;
            box-shadow: -0.5vw 0.5vw 0.3vw 0 rgba(0, 0, 0, 0.2);
            transition: all 0.5s;
            padding-left: 15px;

            .txtAll {
                font-size: 14px;
            }

            .iconAll {
                font-size: 25px;
            }
        }

        .dropdown-content .logout:hover {
            background-color: #842029;
            box-shadow: -0.5vw 0.5vw 0.3vw 0 rgba(0, 0, 0, 0.2);

            .iconAll {
                font-size: 25px;
            }
        }

        .dropdown-content .logout:hover .logoutTxt {
            color: wheat;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ede4ff;
        }
    </style>
</head>

<body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <?php
    $email = $_COOKIE["email"];
    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
    $image_details = $image_rs->fetch_assoc();
    ?>

    <div class="dropdown">
        <div class="dropbtn">
            <?php


            /*if (isset($_COOKIE["email"])) {
                $data = $_COOKIE["email"];
                $query = Database::search("SELECT `profile_picture` FROM `user` WHERE `email` = '" . $data . "'");
                $num = $query->num_rows;
                $d = $query->fetch_assoc();

                if ($d["profile_picture"] != null) {
                    ?>
                    <div class="imgIcon">
                        <img src="<?php echo $d["profile_picture"]; ?>" alt="profile-img" class="profile-img">
                    </div>
                    <?php
                    
                } else {
                    $data = $_COOKIE["email"];
                    $query = Database::search("SELECT `gender_gender_id` FROM `user` WHERE `email` = '" . $data . "'");
                    $d = $query->fetch_assoc();

                    if ($d["gender_gender_id"] == 1) {
                        ?>
                        <div class="imgIcon">
                            <img src="./avatar/avatarBoy.jpg" alt="profile-img" class="profile-img">
                        </div>
                        <?php
                        
                    } else {
                        ?>
                        <div class="imgIcon">
                            <img src="./avatar/avatarGirl.jpg" alt="profile-img" class="profile-img">
                        </div>
                        <?php
                    }
                }
            }*/


            if (empty($image_details["path"])) {

                $data = $_COOKIE["email"];
                $query = Database::search("SELECT `gender_gender_id` FROM `user` WHERE `email` = '" . $data . "'");
                $d = $query->fetch_assoc();

                if ($d["gender_gender_id"] == 1) {
            ?>
                    <div class="imgIcon">
                        <img src="./avatar/avatarBoy.jpg" alt="profile-img" class="profile-img">
                    </div>
                <?php

                } else {
                ?>
                    <div class="imgIcon">
                        <img src="./avatar/avatarGirl.jpg" alt="profile-img" class="profile-img">
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="imgIcon">
                    <img src="<?php echo $image_details["path"]; ?>" alt="profile-img" class="profile-img">
                </div>
            <?php

            }
            ?>
            <div class="contentTop">
                <div class="contentOne">
                    <?php
                    $data = $_COOKIE["name"];
                    ?>
                    <span>Hi, <?php echo $data ?></span>
                </div>
                <div class="contentTwo">
                    <span>Orders & Account</span>
                </div>
            </div>
            <!-- <div class="contentThree">
                <i class="fa-solid fa-chevron-down fa-beat-fade"></i>
            </div> -->
        </div>

        <!-- <div class="dropdown-content">
            <div class="arrowIcon" style="width: 220px; display: flex; align-items: center; justify-content: center; position: absolute;">
                <i style="font-size: 60px; color: #ede4ff; " class="fa-solid fa-caret-up"></i>
            </div>
            <a href="./manageAccount.php" style="display: flex; align-items: center; justify-content: start; width: 220px; height: 40px;">
                <div style="display: flex; align-items: center; justify-content: end; width: 20px; "> -->
                    <!-- <div> -->
                    <!-- <i class="fa-regular fa-face-grin-beam iconAll"></i> -->
                    <!-- </div> -->
                <!-- </div>
                <div style="display: flex; align-items: center; justify-content: start; width: 200px;">
                    <span style="margin-left: 1vw;" class="txtAll">Manage Account</span>
                </div>
            </a>
            <a href="./myOrders.php" style="display: flex; align-items: center; justify-content: start; width: 220px; height: 40px;">
                <div style="display: flex; align-items: center; justify-content: end; width: 20px;">
                    <span class="material-symbols-outlined iconAll">
                        inventory_2
                    </span>
                </div>
                <div style="display: flex; align-items: center; justify-content: start; width: 200px;">
                    <span style="margin-left: 1vw;" class="txtAll">My Orders</span>
                </div>
            </a>
            <a href="./myWishlist.php" style="display: flex; align-items: center; justify-content: start; width: 220px; height: 40px;">
                <div style="display: flex; align-items: center; justify-content: end; width: 20px;">
                    <i class="fa-regular fa-heart iconAll"></i>
                </div>
                <div style="display: flex; align-items: center; justify-content: start; width: 200px;">
                    <span style="margin-left: 1vw;" class="txtAll">My Wishlist</span>
                </div>
            </a>
            <a href="#" style="display: flex; align-items: center; justify-content: start; width: 220px; height: 40px;">
                <div style="display: flex; align-items: center; justify-content: end; width: 20px;">
                    <i class="fa-solid fa-headset iconAll"></i>
                </div>
                <div style="display: flex; align-items: center; justify-content: start; width: 200px;">
                    <span style="margin-left: 1vw;" class="txtAll">Contact Us</span>
                </div>
            </a>
            <a class="logout" href="#" onclick="signout();" style="display: flex; align-items: center; justify-content: start; width: 220px; height: 40px;">
                <div style="display: flex; align-items: center; justify-content: end; width: 20px;">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal logoutTxt iconAll"></i>
                </div>
                <div style="display: flex; align-items: center; justify-content: start; width: 200px;">
                    <span class="logoutTxt logoutFont" style="margin-left: 1vw; font-size: 13px; font-weight: bold;">Logout</span>
                </div>
            </a>
        </div> -->
    </div>

    <script src="./script.js"></script>
</body>

</html>