<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./headerNew.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100&family=Madimi+One&display=swap" rel="stylesheet">

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .animate-me {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s ease-in-out;
        }

        .animate-me.animate-on-scroll {
            opacity: 1;
            transform: translateY(0);
        }

        .hidden-content {
            /* Optionally style the hidden content while waiting to load */
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .hidden-content.loaded {
            opacity: 1;
        }
    </style>

</head>

<body style="background-color: #f5f5f5;">

    <div class="d-none d-md-block position-sticky top-0" style="z-index: 99999;">
        <div class="col-12 bg-white d-flex align-items-center justify-content-center border border-bottom-5 position-sticky top-0" style="height: 86px; z-index:99999;">
            <div class="col-11 d-flex flex-column align-items-center justify-content-start p-0" style="height: 86px;">
                <div class="mt-2" style="height: 18px; width: 100%;">
                    <div class="d-flex align-items-center justify-content-end gap-4 topPart">
                        <?php
                        require "./connection.php";
                        if (isset($_COOKIE["emailSeller"])) {

                            $email = $_COOKIE["emailSeller"];

                            $query = Database::search("SELECT * FROM seller WHERE `email` = '" . $email . "'");

                            if ($query->num_rows == 1) {
                        ?>
                                <a href="./becomeASellerLoginLogin.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 500; background-color: rgba(169, 56, 255, 1); 
                                padding-left: 15px; padding-right: 15px; padding-top: 5px; margin-top: -5px; border-radius: 0 0 8px 8px; padding-bottom: 5px; color: #ffffff;">My Selling Account</a>
                                <!-- <a href="#" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;">Donates</a> -->
                                <a href="https://www.termsfeed.com/live/ef935ada-c3da-4651-9396-7fdbfaffe61a" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700; margin-top: -5px;">Terms & Conditions</a>
                            <?php
                            } else {
                            ?>
                                <a href="./becomeSellerLoginPage.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 500; background-color: rgba(169, 56, 255, 1); 
                                padding-left: 15px; padding-right: 15px; padding-top: 5px; margin-top: -5px; border-radius: 0 0 8px 8px; padding-bottom: 5px; color: #ffffff;">Become A Seller</a>
                                <!-- <a href="#" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;">Donates</a> -->
                                <a href="https://www.termsfeed.com/live/ef935ada-c3da-4651-9396-7fdbfaffe61a" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;  margin-top: -5px;">Terms & Conditions</a>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <a href="./becomeASellerLoginLogin.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 500; background-color: rgba(169, 56, 255, 1); 
                                padding-left: 15px; padding-right: 15px; padding-top: 5px; margin-top: -5px; border-radius: 0 0 8px 8px; padding-bottom: 5px; color: #ffffff;">Become A Seller</a>
                            <!-- <a href="#" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;">Donates</a> -->
                            <a href="https://www.termsfeed.com/live/ef935ada-c3da-4651-9396-7fdbfaffe61a" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;  margin-top: -5px;">Terms & Conditions</a>
                        <?php
                        }
                        ?>


                    </div>
                </div>
                <style>
                    @media (min-width: 992px) {
                        .nameBox {
                            height: 60px;
                            width: 160px;
                        }

                        /* .langBox {
                        height: 60px;
                        width: 25.6%;
                    } */
                        .iconMain {
                            font-size: 2.5vw;
                            font-weight: 600;
                            display: flex;
                            align-items: center;
                            justify-content: start;
                            color: #a938ff;
                            margin-top: 10px;
                            font-family: "Madimi One", sans-serif;
                        }

                        .iconSub {
                            margin-top: -5px;
                            font-size: 3vw;
                        }
                    }

                    @media (max-width: 992px) {
                        .nameBox {
                            height: 60px;
                            width: 160px;
                        }

                        /* .langBox {
                        height: 60px;
                        width: 25.6%;
                    } */
                        .iconMain {
                            font-size: 3vw;
                            font-weight: 600;
                            display: flex;
                            align-items: center;
                            justify-content: start;
                            color: #a938ff;
                            margin-top: 10px;
                            font-family: "Madimi One", sans-serif;
                        }

                        .iconSub {
                            margin-top: -5px;
                            font-size: 3.8vw;
                        }
                    }
                </style>
                <div class="d-flex align-items-center justify-center-start" style="height: 68px; width: 100%;">
                    <a href="./index.php" class="d-flex align-items-center justify-content-center" style="text-decoration: none; height: 60px; width: 25%; background-color: #ede4ff; border-radius: 8px; margin-bottom: 16px;">
                        <!-- <img src="" alt="" style="width: 100%;"> -->
                        <p class="iconMain"><i class="bi bi-shop  iconSub"></i>&nbsp;SHOPPING</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center ms-2" style="height: 60px; width: 52%;">
                        <div class="d-flex align-items-center justify-content-start position-relative" style="width: 98%; height: 45px; border-radius: 10px; border: 2px solid #a938ff;">
                            <div class="position-relative" style="width: 95%; height: 45px;">
                                <input autocapitalize="off" autofocus="off" autocomplete="off" type="search" class="ps-3" style="width: 100%; height: 45px; font-size: 14px; margin-top: -1px;" id="mainSearch" onkeyup="mainSearch(event);" placeholder="What are you looking for?">

                            </div>
                            <div class="d-flex align-items-center justify-content-center" style="width: 70px; height: 45px;">
                                <div onclick="clickButtonAndGoProductList();" class="d-flex align-items-center justify-content-center" style="cursor: pointer; background-color: #ede4ff; width: 80%; height: 33px; border-radius: 8px;">
                                    <i class="fa-solid fa-magnifying-glass fa-bounce" style="color: #9400FF; font-size: 18px;"></i>
                                </div>
                            </div>
                            <div class="position-absolute pt-3 ps-3 pb-2 pe-3" style="display: none; z-index: 9999999; overflow: auto; width: 100%; margin-top: 60px; border-radius: 8px; height: 0; background-color: #f5f5f5; border: 2px solid #a938ff;" id="dropdownSearch">
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">phone</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">tv</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">laptop</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">tablet</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">watches</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">keyboard</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">Mouse</div>
                                <div style="font-size: 14px; font-weight: 600;" class="ps-3 pt-2 pb-2 mb-1 suggesion">speakers</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-start ms-2 nameBox">
                        <?php

                        if (isset($_COOKIE["name"])) {

                        ?>
                            <?php

                            include "./singleDropdown.php";

                            ?>
                        <?php

                        } else {

                        ?>
                            <?php
                            include "./dropdownNext.php";

                            ?>
                        <?php

                        }

                        ?>
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="d-flex align-items-center justify-content-start langBox ms-4">
                            <?php require "./langSet.php"; ?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end ms-4" style="width: 30px;">
                        <a href="./cart.php">
                            <i style="font-size: 30px; color: #191919;" class="fa-solid fa-bag-shopping"></i>
                            <?php
                            $email = $_COOKIE["email"];
                            $query = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                            WHERE `user_cart_email` = '" . $email . "'");

                            $num = $query->num_rows;
                            if (isset($_COOKIE["name"])) {

                            ?>
                                <div class="position-absolute  rounded-5" style="background-color: #a938ff; 
                                width: 18px; 
                                height: 18px; 
                                display: flex; 
                                align-items: center; 
                                justify-content: center;
                                margin-top: -38px;
                                margin-left: 20px;
                                padding: 5px;
                                color: white;" id='lblCartCount'><?php echo $num; ?></div>
                            <?php
                            } else {
                                ?>
                                <div class="position-absolute  rounded-5" style="background-color: #a938ff; 
                                width: 18px; 
                                height: 18px; 
                                display: flex; 
                                align-items: center; 
                                justify-content: center;
                                margin-top: -38px;
                                margin-left: 20px;
                                padding: 5px;
                                color: white;" id='lblCartCount'>0</div>
                                <?php
                            }

                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============= JS ================-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>