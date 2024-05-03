<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Account</title>

    <!-- =============== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="./mobileAccount.css">

    <!-- =============== -->
</head>

<body id="mobileAccountBody" style="background-color: #f5f5f5; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <?php
    if (isset($_COOKIE["name"])) {
    ?>



    <?php
    }
    ?>

    <!-- ================================== ALERT start  ==================================-->
    <?php
    if (isset($_COOKIE["alert"])) {
    ?>
        <div id="alertBodyMobile">
            <div class="box">
                <div class="image"><img loading="lazy" src="./img/check.png"></div>
                <p class="message">logged successfully</p>
            </div>
        </div>

    <?php
    }
    ?>

    <!-- ================================== HEADER start ==================================-->


    <div class="HeaderMobileMain">
        <div class="HeaderMobileSub01">
            <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
            <span class="HeaderMobileMainText">My Account</span>
        </div>
        <div class="HeaderMobileSub02">
            <?php
            require "./MobileHeader.php";
            ?>
        </div>

    </div>


    <!-- ================================== List Start =======================================-->
    <?php

    ?>

    <div class="AccountMain">
        <div class="AccountMainSub">
            <div class="AccountDivFirst">
                <?php

                require "./connection.php";
                if (isset($_COOKIE["name"])) {
                    $email = $_COOKIE["email"];

                    $query = Database::search("SELECT * FROM user JOIN gender ON gender_gender_id=gender_id WHERE `email`='" . $email . "'");
                    $data = $query->fetch_assoc();

                    $image = Database::search("SELECT * FROM profile_img WHERE `user_email`= '" . $email . "'");
                    $image_data = $image->fetch_assoc();

                    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
                    $image_details = $image_rs->fetch_assoc();
                ?>
                    <span class="AccountName"><span id="greeting" style="color: #5708e1; font-size: 13px;"></span> <span style="color: #191919;"><?php echo $data["fname"]; ?></span></span>
                    <?php

                    if (empty($image_data["path"])) {

                        if ($data["gender_gender_id"] == 1) {
                    ?>
                            <div class="imgIcon">
                                <img loading="lazy" src="./avatar/avatarBoy.jpg" alt="profile-img" class="profile-img">
                            </div>
                        <?php

                        } else {
                        ?>
                            <div class="imgIcon">
                                <img loading="lazy" src="./avatar/avatarGirl.jpg" alt="profile-img" class="profile-img">
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="imgIcon">
                            <img loading="lazy" src="<?php echo $image_data["path"]; ?>" alt="profile-img" class="profile-img">
                        </div>
                    <?php
                    }

                    ?>
                    <?php



                    ?>
                <?php
                } else {
                ?>
                    <span class="AccountName"><span style="color: #191919;">Hello,</span> Welcome to Shopping</span>
                    <button class="btn-grad" onclick="goingToLogin();">LOGIN / SIGNUP</button>
                <?php
                }
                ?>


            </div>
            <?php
            if (isset($_COOKIE["name"])) {
            ?>

                <a href="./mobileProfileInfo.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-user AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Account Information</span>
                    </div>
                </a>
                <a href="./addressBook.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-compass AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Address Book</span>
                    </div>
                </a>
                <a href="./mobileMyOrder.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <span class="material-symbols-outlined AccountIcon1">
                            inventory_2
                        </span>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">My Orders</span>
                    </div>
                </a>
                <a href="./mobileMyWishlist.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-heart AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">My Wishlist</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <span class="material-symbols-outlined AccountIcon1">
                            chat
                        </span>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Message</span>
                    </div>
                </a>
                <a href="./mobileSettings.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <span class="material-symbols-outlined AccountIcon1">
                            settings
                        </span>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Settings</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-file-lines AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Policies</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-circle-question AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Help Center</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-solid fa-headset AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Contact Us</span>
                    </div>
                </a>

            <?php
            } else {
            ?>

                <a href="./mobileMyOrder.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <span class="material-symbols-outlined AccountIcon1">
                            inventory_2
                        </span>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">My Orders</span>
                    </div>
                </a>
                <a href="./mobileMyWishlist.php" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-heart AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">My Wishlist</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-file-lines AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Policies</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-regular fa-circle-question AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Help Center</span>
                    </div>
                </a>
                <a href="#" class="AccountDivOthers">
                    <div class="AccountIconsDiv">
                        <i class="fa-solid fa-headset AccountIcon"></i>
                    </div>
                    <div class="AccountIconsTextDiv">
                        <span class="AccountIconText">Contact Us</span>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <br>
    <br>

   

    <script src="./script.js"></script>
    <script src="./mobileAccount.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>