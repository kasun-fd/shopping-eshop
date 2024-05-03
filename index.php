<?php
require "./connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping | Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100&family=Madimi+One&display=swap" rel="stylesheet">

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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./index.css">

</head>

<body id="indexBody" class="overflow-x-hidden" style="background-color: #f5f5f5; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">



    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!--mobile size ===================================================================================================================================-->


    <!-- <div class="col-12 d-none d-sm-block d-md-none position-fixed top-0" style="margin-top: 10px; z-index: 9999; text-align: center;">


        <div class="col-md-12" style="  display: flex;
        align-items: center;
        justify-content: start;
                                        margin: auto;
                                        width: 100%;
                                        height: 8vw;
                                        box-sizing: border-box;
                                        border: 3px solid #9400FF;
                                        border-radius: 10px;
                                        background-color: white;
                                        color: #ede4ff;
                                        background-position: 10px 10px;   
                                        padding: 12px 12px 12px 50px;">

            <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #9400FF; font-size: 3vw; margin-left: -30px;"></i>

            <input type="text" style="font-size: 2.2vw; margin-left: 3vw; margin-top: 3px; color: #191919; padding-left: 3vw; border-left: 0.1vw solid #8311c9; font-family: Arial, Helvetica, sans-serif;" placeholder="What are you looking for?">
        </div>

    </div> -->

    <div onclick="searchMobile()" class="col-12 d-block d-md-none position-fixed top-0 animate-me" style="margin-top: 10px; z-index: 9999; text-align: center;">

        <div class="col-md-12 animate-on-scroll" style="  
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    margin: auto;
                                    width: 100%;
                                    height: 50px;
                                    box-sizing: border-box;
                                    border: 3px solid #9400FF;
                                    box-shadow: 0px 3px 3px #424769;
                                    border-radius: 10px;
                                    background-color: white;
                                    color: #ede4ff;
                                    background-position: 10px 10px;   
                                    padding: 12px 0px 12px 16px;">

            <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #9400FF; font-size: 20px;"></i>

            <input type="text" name="search" class="searchMobile" style="margin-left: 16px; color: #191919; height: 20px; border-left: 0.1vw solid #8311c9; padding-left: 3vw; font-family: Arial, Helvetica, sans-serif;" placeholder="What are you looking for?">
        </div>


    </div>

    <!-- ===================================================== Medium ===============================================-->


    <script>
        const options = {
            root: null, // Observe entire viewport
            threshold: 0.5, // Trigger when 50% of element is visible
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-on-scroll');
                }
            });
        }, options);

        const elementsToObserve = document.querySelectorAll('.animate-me');
        elementsToObserve.forEach((element) => {
            observer.observe(element);
        });
    </script>

    <style>
        .bottomMenuMainDiv {
            width: 100%;
            background: no-repeat;
            position: fixed;
            bottom: 0;
            height: 55px;
            z-index: 9999;
            background-color: #ede4ff
        }

        .bottomMenuSubDiv {
            align-items: center;
            justify-items: center;
            height: 45px;
            width: 80px;
        }

        .bottomMenuIcon {
            font-size: 25px;
        }

        .bottomMenuSpan {
            font-size: 9px;
        }

        .bottomMenuDot {
            width: 6px;
            height: 6px;
            background-color: #9400ff;
            position: absolute;
            border-radius: 100%;
            margin-top: -40px;
            margin-left: 28px;
        }
    </style>

    <!-- <div style="width: 100%; height: 10vw;" class="d-block d-md-none"> -->
    <div class="d-flex d-block d-md-none justify-content-around pt-2 bottomMenuMainDiv">
        <a class="text-decoration-none" href="#">
            <div class="d-grid bottomMenuSubDiv">
                <i class="fa-solid fa-house-chimney bottomMenuIcon" style="color: #a938ff;"></i>
                <span class="bottomMenuSpan" style="color: #a938ff;">Home</span>
            </div>
        </a>

        <a class="text-decoration-none" style="color: #3e3f41;" href="./categoryListMobile.php">
            <div class="d-grid bottomMenuSubDiv">
                <i class="fa-solid fa-list bottomMenuIcon"></i>
                <span class="bottomMenuSpan">Categories</span>
            </div>
        </a>
        <a class="text-decoration-none" style="color: #3e3f41;" href="./cart.php">
            <div class="d-grid bottomMenuSubDiv">
                <i class="fa-solid fa-bag-shopping bottomMenuIcon"></i>
                <?php
                $email = $_COOKIE["email"];
                $cart_query = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '" . $email . "'");
                $num_cart = $cart_query->num_rows;
                if ($num_cart > 0) {
                    if (isset($_COOKIE["name"])) {
                ?>
                        <div class="bottomMenuDot"></div>
                <?php
                    }
                }
                ?>
                <span class="bottomMenuSpan">Cart</span>
            </div>
        </a>

        <a class="text-decoration-none" style="color: #3e3f41;" href="./mobileAccount.php">
            <div class="d-grid bottomMenuSubDiv">
                <i class="fa-solid fa-user-tie bottomMenuIcon"></i>
                <!-- <div class="bottomMenuDot"></div> -->
                <span class="bottomMenuSpan">Account</span>
            </div>
        </a>

    </div>
    <!-- </div> -->

    <!-- ========================= Carousel ==================================-->

    <?php
    require "./carousel.php";
    ?>

    <!-- ========================= Carousel end ===============================-->

    <div class="d-block d-md-none" style="margin-top: 2vw;">
        <div style="display: flex; align-items: center; justify-content: center;">


            <div style="display: grid; text-align: center; justify-content: center; width: 20%;">
                <a href="#"><img src="./resources/top-10-img/b2034164-d476-4ee7-9789-49eb8a6f8c20.png" class="rounded-5 e" style="display: flex; justify-self: center;"></a>

            </div>

            <div style="display: grid; text-align: center; justify-content: center; width: 20%;">
                <a href="#"><img src="./resources/top-10-img/2.png" class="rounded-5 e" style="display: flex; justify-self: center;"></a>

            </div>

            <div style="display: grid; text-align: center; justify-content: center; width: 20%;">
                <a href="#"><img src="./resources/top-10-img/11.png" class="rounded-5 e" style="display: flex; justify-self: center;"></a>

            </div>

            <div style="display: grid; text-align: center; justify-content: center; width: 20%;">
                <a href="#"><img src="./resources/top-10-img/4.png" class="rounded-5 e" style="display: flex; justify-self: center;"></a>

            </div>

            <div style="display: grid; text-align: center; justify-content: center; width: 20%;">
                <a href="#"><img src="./resources/top-10-img/5.png" class="rounded-5 e" style="display: flex; justify-self: center;"></a>

            </div>

        </div>

        <div style="display: flex; align-items: center; justify-content: center; margin-top: 5px;">


            <div style="display: flex; text-align: center; justify-content: center; width: 20%;">
                <label class="e2" for="">Fashion</label>

            </div>

            <div style="display: flex; text-align: center; justify-content: center; width: 20%;">
                <label class="e2" for="">Beauty</label>

            </div>

            <div style=" display: flex; text-align: center; justify-content: center; width: 20%;">
                <label class="e2" for="">Any 3 From</label>

            </div>

            <div style="display: flex; text-align: center; justify-content: center; width: 20%;">
                <label class="e2" for="">Mart</label>

            </div>

            <div style="display: flex; text-align: center; justify-content: center; width: 20%;">
                <label class="e2" for="">Play & Win</label>

            </div>

        </div>

        <div style="display: flex; align-items: center; justify-content: center; padding: 0; margin-top: -5px;">
            <label class="e2" for="">Rs.1699*</label>
        </div>

    </div>

    <!-- flash sale start (mobile) -->



    <div class="d-block d-md-none">
        <div class="container-fluid" style="display: flex; margin-top: 5px;">
            <div style="width: 50% ; text-align: start;">
                <h1 class="flashOne">Flash Sale</h1>
            </div>
            <div style="width: 50%; display: flex; align-items: center; justify-content: end;">
                <a href="#" class="flashTwo">SHOP NOW</a>
            </div>
        </div>
        <div class="timeFlash" style="background-image: linear-gradient(to right,#8b2be2,#4d02e0); display: flex; align-items: center; justify-content: center;">
            <span class="flashEndIn">Ending in </span>&nbsp;&nbsp;
            <!-- <div id="test">log</div> -->
            <!-- <div id="timer-display"> -->
            <div class="flashNumbers" id="timerhours">00</div>&nbsp;
            <span class="flashDots">:</span>&nbsp;
            <div class="flashNumbers" id="timerminutes">00</div>&nbsp;
            <span class="flashDots">:</span>&nbsp;
            <div class="flashNumbers" id="timerseconds">00</div>
            <!-- </div> -->

        </div>
        <div class="flashContent">
            <?php
            $query3 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN discount_type
            ON product.discount_type_id=discount_type.id_dis WHERE `discount` > 0 ORDER BY RAND() LIMIT 1");
            $num3 = $query3->num_rows;
            if ($num3 > 0) {
                for ($i = 0; $i < $num3; $i++) {
                    $data3 = $query3->fetch_assoc();
            ?>
                    <div class="border-end border-bottom flashContentBig" style="width: 45%; display: grid; align-items: start; justify-content: center;">
                        <div style="cursor: pointer;" onclick="getIndex(<?php echo $data3['product_id']; ?>);">
                            <div>
                                <img src="<?php echo $data3["img_path"]; ?>" class="flashContentMainImage" alt="">
                            </div>
                        </div>
                        <div style="line-height: 8px;">
                            <?php
                            $price = $data3["price"];
                            $discount = $data3["discount"];
                            $process = ($price * $discount) / 100;
                            $newPrice = $price - $process;
                            if ($newPrice < 0) {
                                $newPrice = 0;
                            }
                            $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                            ?>
                            <p class="flashContentPrice"><?php echo $formattedPrice; ?></p>
                            <?php
                            $price = $data3["price"];
                            $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                            ?>
                            <span class="flashContentOldPrice"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span class="flashContentDiscount">-</span><span class="flashContentDiscount"><?php echo $data3["discount"]; ?></span><span class="flashContentDiscount">%</span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <div style="width: 55%;" class="flashContentSub border-bottom">
                <?php
                $query4 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN discount_type
            ON product.discount_type_id=discount_type.id_dis WHERE `discount` > 0 AND `id` != '" . $data3["product_id"] . "' ORDER BY RAND() LIMIT 3");
                $num4 = $query4->num_rows;
                if ($num4 > 0) {
                    for ($i = 0; $i < $num4; $i++) {
                        $data4 = $query4->fetch_assoc();
                ?>
                        <div onclick="getIndex(<?php echo $data4['product_id']; ?>);" style="cursor: pointer; text-decoration: none; width: 100%; height: 33.33%; display: flex; align-items: center; justify-content: start; gap: 15px;">
                            <div>
                                <img src="<?php echo $data4["img_path"]; ?>" class="flashContentSubImages" alt="">
                            </div>
                            <div style="line-height: 8px;">
                                <?php
                                $price = $data4["price"];
                                $discount = $data4["discount"];
                                $process = ($price * $discount) / 100;
                                $newPrice = $price - $process;
                                if ($newPrice < 0) {
                                    $newPrice = 0;
                                }
                                $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                ?>
                                <p class="flashContentPrice"><?php echo $formattedPrice; ?></p>
                                <?php
                                $price = $data4["price"];
                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                ?>
                                <span class="flashContentOldPrice"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span class="flashContentDiscount">-</span><span class="flashContentDiscount"><?php echo $data4["discount"]; ?></span><span class="flashContentDiscount">%</span>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Flash sale End -->

    </div>

    <!-- just for you (mobile) -->

    <div class="d-block d-md-none" style="margin-top: 8vw">
        <div class="col-12 d-flex align-items-center justify-content-center mt-5">
            <div class="col-12 d-flex flex-column align-items-start justify-content-start p-0">
                <h1 class="flashText">Just For You</h1>
                <div class="mainGrid">
                    <?php
                    $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `discount_type_id` != 2 ORDER BY RAND()");
                    $num = $query->num_rows;
                    if ($num > 0) {
                        for ($i = 0; $i < $num; $i++) {
                            $data = $query->fetch_assoc();
                    ?>
                            <div onclick="getIndex(<?php echo $data['id']; ?>);" style="cursor: pointer; text-decoration: none; background-color: #ffffff; width: 100%; border-radius: 8px;" class="polaroid">
                                <div style="width: 100%; border-radius: 8px;">
                                    <div style="width: 100%; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                        <img src="<?php echo $data["img_path"] ?>" style="width: 100%; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0 imgOpt">
                                    </div>
                                    <div class="mt-1 ms-2 titleDiv">
                                        <p class="titleText"><?php echo $data["title"] ?></p>
                                    </div>
                                    <div class="ms-2 priceDiv">
                                        <?php
                                        $price = $data["price"];
                                        $discount = $data["discount"];
                                        $process = ($price * $discount) / 100;
                                        $newPrice = $price - $process;
                                        if ($newPrice < 0) {
                                            $newPrice = 0;
                                        }
                                        $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                        ?>
                                        <p class="priceText"><?php echo $formattedPrice; ?></p>
                                    </div>
                                    <?php
                                    if ($data["discount"] > 0) {
                                    ?>
                                        <div class="ms-2 dicDiv d-flex align-items-center justify-content-between">
                                            <div class="">
                                                <?php

                                                $price = $data["price"];
                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');

                                                ?>
                                                <span style="color: #6c757d; text-decoration: line-through;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600;" class="disText1">-</span><span style="color: #191919; font-weight: 600;" class="disText1"><?php echo $data["discount"]; ?></span><span style="color: #191919; font-weight: 600;" class="disText1">%</span>

                                            </div>
                                            <span style="color: #6c757d;" class="disText1 me-2">20&nbsp;Sold</span>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ms-2 dicDiv">
                                            <span style="color: #6c757d;" class="disText1">20</span>&nbsp;<span style="color: #6c757d;" class="disText1">Sold</span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="ms-2 starsDiv" style="color: #3e3f41;">
                                        <?php
                                        $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $data["id"] . "'");

                                        $rate_num = $review->num_rows;

                                        if ($rate_num == 0) {
                                        ?>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span>0</span>)</span>
                                            <?php
                                        } else {
                                            $rate_data = $review->fetch_assoc();
                                            $rate_1 = $rate_data["rating-1"];
                                            $rate_2 = $rate_data["rating-2"];
                                            $rate_3 = $rate_data["rating-3"];
                                            $rate_4 = $rate_data["rating-4"];
                                            $rate_5 = $rate_data["rating-5"];
                                            $number_1 = 500;
                                            $rate_two = 0;
                                            if ($rate_2 >= $number_1) {
                                                $rate_two = $rate_2 - $number_1;
                                            }
                                            $number_2 = 1000;
                                            $all_rate =  $rate_1 + $rate_2 + $rate_3 + $rate_4 + $rate_5;
                                            $rate = (($rate_1 + $rate_two) / $number_2) * 100;

                                            if ($rate <= 20) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 40) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate;; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 60) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 80) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 100) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- just for you (mobile) end -->


    <!--mobile size end ===================================================================================================================================-->



    <!--Other Devices start ===============================================================================================================================-->

    <!-- <div class="d-none d-md-block"> -->



    <?php
    if (isset($_COOKIE["alert"])) {
    ?>
        <div class="d-none d-md-block">
            <div id="alertSuccess" style="border: 0.3vw solid #74E291; border-radius: 1vw; background-color: #3D3B40; bottom: 0.8vw; left: 0.8vw; width: 12vw; height: 4vw; z-index: 99999; position: fixed; display: flex; align-items: center; justify-content: center;">

                <div style="width: 12vw; height: 4vw; display: flex; align-items: center; justify-content: center; gap: 0.5vw;">
                    <span style="font-size: 1.5vw; color: #74E291;" class="material-symbols-outlined">
                        new_releases
                    </span><strong style="font-size: 0.8vw; color: #74E291;">Signed In Successfully</strong>
                </div>
            </div>
        </div>


        <script>
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "95%"
            }, 3000);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "90%"
            }, 3100);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "80%"
            }, 3200);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "70%"
            }, 3300);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "60%"
            }, 3400);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "50%"
            }, 3500);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "40%"
            }, 3600);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "30%"
            }, 3700);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "20%"
            }, 3800);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "10%"
            }, 3900);
            setTimeout(() => {
                document.getElementById("alertSuccess").style.opacity = "0"
            }, 4000);
        </script>
    <?php
    }
    ?>
    <!-- </div> -->

    <!-- <div class="d-none d-md-block ">
        <div style="display: flex; align-items: center; justify-content: center;">

            <div style="display: flex; align-items: center; justify-content: center; width: 85vw;">
                <a href="#"><img src="./img/fb189780-17d3-4073-86eb-78530a6fb4e5.gif" style="width: 85vw;"></a>
            </div>

        </div>
    </div> -->


    <div class="d-none d-md-block">
        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">

            <?php
            include "./slider2.php";
            ?>

        </div>
    </div>



    <div class="d-none d-md-block position-sticky top-0" style="z-index: 99999; background-color: #f5f5f5;">
        <div class="col-12 bg-white d-flex align-items-center justify-content-center shadow-sm position-sticky top-0" style="height: 86px; z-index:99999;">
            <div class="col-11 d-flex flex-column align-items-center justify-content-start p-0" style="height: 86px;">
                <div class="mt-2" style="height: 18px; width: 100%;">
                    <div class="d-flex align-items-center justify-content-end gap-4 topPart">
                        <?php
                        if (isset($_COOKIE["emailSeller"])) {

                            $email = $_COOKIE["emailSeller"];

                            $query = Database::search("SELECT * FROM seller WHERE `email` = '" . $email . "'");

                            if ($query->num_rows == 1) {
                        ?>
                                <a href="./becomeASellerLoginLogin.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 600; background-color: rgba(169, 56, 255, 1); 
                                padding-left: 15px; padding-right: 15px; padding-top: 5px; margin-top: -5px; border-radius: 0 0 8px 8px; padding-bottom: 5px; color: #ffffff;">My Selling Account</a>
                                <!-- <a href="#" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;">Donates</a> -->
                                <a href="https://www.termsfeed.com/live/ef935ada-c3da-4651-9396-7fdbfaffe61a" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700; margin-top: -5px;">Terms & Conditions</a>
                            <?php
                            } else {
                            ?>
                                <a href="./becomeSellerLoginPage.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 600; background-color: rgba(169, 56, 255, 1); 
                                padding-left: 15px; padding-right: 15px; padding-top: 5px; margin-top: -5px; border-radius: 0 0 8px 8px; padding-bottom: 5px; color: #ffffff;">Become A Seller</a>
                                <!-- <a href="#" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;">Donates</a> -->
                                <a href="https://www.termsfeed.com/live/ef935ada-c3da-4651-9396-7fdbfaffe61a" style="text-decoration: none; color: #8311c9; font-size: 11px; font-weight: 700;  margin-top: -5px;">Terms & Conditions</a>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <a href="./becomeASellerLoginLogin.php" target="_blank" style="text-decoration: none; color: #8311c9; font-size: 12px; font-weight: 600; background-color: rgba(169, 56, 255, 1); 
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
                                <div onclick="clickButtonAndGoProductList();" class="d-flex align-items-center justify-content-center" style="background-color: #ede4ff; width: 80%; height: 33px; border-radius: 8px; cursor: pointer;">
                                    <i class="fa-solid fa-magnifying-glass fa-bounce icon-22" style="color: #9400FF; font-size: 18px;"></i>
                                </div>
                            </div>

                            <div class="position-absolute pt-3 ps-3 pb-2 pe-3" style="display: none; z-index: 9999999; overflow: auto; width: 100%; margin-top: 60px; border-radius: 8px; height: 0; background-color: #f5f5f5; border: 2px solid #a938ff;" id="dropdownSearch">

                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-start ms-2 nameBox">
                        <?php

                        if (isset($_COOKIE["name"])) {

                        ?>
                            <?php

                            include "./dropdown.php";

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

                            if (isset($_COOKIE["name"])) {
                                $email = $_COOKIE["email"];
                                $query = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                WHERE `user_cart_email` = '" . $email . "'");

                                $num = $query->num_rows;

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
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Header Section End -->

    <style>
        .TopMainOneTextBegin:hover .TopMainOneTextAll {
            color: #9400ff;
        }

        .TopMainOneTextBegin:hover .TopMainOneIconArrow {
            display: block;
        }

        @media (min-width: 992px) {
            .catTop {
                height: 345px;
            }

            .catSecDiv {
                width: 270px;
                height: 345px;
            }

            .catThirdDiv {
                height: 345px;
            }

            .TopMainOneText {
                width: 100%;
                height: 345px;
                text-decoration: none;
                padding-top: 7px;
                padding-bottom: 7px;
            }

            .TopMainOneTextBegin {
                width: 100%;
                height: 27.5px;
                color: #3D3B40;
                display: flex;
                align-items: center;
                justify-content: space-between;
                text-decoration: none;
            }

            .TopMainOneTextBegin:hover {
                background-color: #ede4ff;
                border-radius: 5px;
                width: 100%;
                padding-right: 5px;
            }

            .TopMainOneTextAll {
                margin-left: 40px;
                font-size: 13px;
                font-weight: 600;
                color: #6c757d;
                text-decoration: none;
            }

            .iconCat {
                font-size: 20px;
                margin-left: 15px;
                margin-top: 3px;
                background-color: #EEEDED;
                width: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .TopMainOneIconArrow {
                display: none;
                font-size: 13px;
                color: #9400ff;
            }

        }

        @media (max-width: 992px) {
            .catTop {
                height: 300px;
            }

            .catSecDiv {
                width: 240px;
                height: 300px;
            }

            .catThirdDiv {
                height: 300px;
            }

            .TopMainOneText {
                width: 100%;
                height: 300px;
                text-decoration: none;
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .TopMainOneTextBegin {
                width: 100%;
                height: 20px;
                color: #3D3B40;
                display: flex;
                align-items: center;
                justify-content: space-between;
                text-decoration: none;

            }

            .TopMainOneTextBegin:hover {
                background-color: #ede4ff;
                width: 100%;
                padding-right: 5px;
                border-radius: 5px;
            }

            .TopMainOneTextAll {
                margin-left: 30px;
                font-size: 11.5px;
                color: #6c757d;
                text-decoration: none;
                font-weight: 600;
            }

            .iconCat {
                font-size: 15px;
                margin-left: 7px;
                margin-top: 3px;
                background-color: #EEEDED;
                width: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .TopMainOneIconArrow {
                display: none;
                font-size: 10px;
                color: #9400ff;
            }
        }
    </style>

    <!-- Hero Section Begin -->
    <section class="mt-3 d-none d-md-block p-0 catTop">
        <div class="d-flex align-items-start justify-content-center col-12">
            <div class="d-flex align-items-start justify-content-center p-0 gap-3 col-11">
                <div class="d-none d-lg-block">
                    <div class="d-flex align-items-start justify-content-start ms-0 ps-0 catSecDiv">
                        <div style="background-color: #ffffff; border-radius: 10px;" class="col-12 m-0 border border-1 catThirdDiv">
                            <div class="TopMainOneText">
                                <div onclick="goToProductListPageFromCategories(1);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        devices_other
                                    </span>
                                    <span class="TopMainOneTextAll">Electronic Devices</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(2);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        cable
                                    </span>
                                    <span class="TopMainOneTextAll">Electronic Accessories</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(3);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        kitchen
                                    </span>
                                    <span class="TopMainOneTextAll">TV & Home Appliances</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(4);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        surgical
                                    </span>
                                    <span class="TopMainOneTextAll">Health & Beauty</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(5);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        toys
                                    </span>
                                    <span class="TopMainOneTextAll">Babies & Toys</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(6);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        shopping_bag
                                    </span>
                                    <span class="TopMainOneTextAll">Groceries & Pets</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(7);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        chair
                                    </span>
                                    <span class="TopMainOneTextAll">Home & Lifestyle</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(8);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        woman
                                    </span>
                                    <span class="TopMainOneTextAll">Women`s Fashion</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(9);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        man
                                    </span>
                                    <span class="TopMainOneTextAll">Men`s Fashion</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(10);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        watch
                                    </span>
                                    <span class="TopMainOneTextAll">Watches & Accessories</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(11);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        sports_soccer
                                    </span>
                                    <span class="TopMainOneTextAll">Sports & Outdoor</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                                <div onclick="goToProductListPageFromCategories(12);" style="cursor: pointer;" class="TopMainOneTextBegin text-decoration-none">
                                    <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCat">
                                        airport_shuttle
                                    </span>
                                    <span class="TopMainOneTextAll">Automotive & Motorbike</span>
                                    <i class="fa-solid fa-chevron-right TopMainOneIconArrow"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ==================================== NEXT BOX =========================================-->

                <style>
                    .TopMenuSecond {
                        width: 15vw;
                        position: absolute;
                        z-index: 9999;
                        opacity: 0;
                        height: 24vw;
                        margin-left: -35.5vw;
                        transition: opacity 0.3s ease-in-out;
                    }

                    .TopMenuSecond2 {
                        width: 15vw;
                        height: 24vw;
                        z-index: 9999;
                        display: flex;
                        align-items: center;
                        justify-content: end;
                    }

                    .TopMenuSecondSub {
                        width: 95%;
                        background-color: #ffffff;
                        height: 24vw;
                        border-radius: 1.5vw;
                        display: flex;
                        align-items: start;
                        justify-content: start;
                    }
                </style>

                <!-- <div class="TopMenuSecond" id="TopMenuHover">
                    <div class="TopMenuSecond2">
                        <div class="TopMenuSecondSub border border-5">
                            <div class="">
                                <a href="#" class="text-decoration-none">
                                    <span class="TopMainOneTextAll">Electronic Devices</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <span>d</span>
                                </a>
                                <a href="#" class="text-decoration-none">

                                </a>
                            </div>
                        </div>
                    </div>

                </div> -->

                <script>
                    const triggerContainer = document.querySelector('.TopMainOneTextBegin');
                    const newContainer = document.getElementById('TopMenuHover');

                    triggerContainer.addEventListener('mouseover', () => {
                        newContainer.style.opacity = '1';
                    });

                    triggerContainer.addEventListener('mouseout', () => {
                        newContainer.style.opacity = '0';
                    });
                </script>

                <style>
                    @media (min-width: 992px) {
                        .carouselMain {
                            width: 80%;
                            height: 345px;
                        }

                        .slider {
                            border-radius: 10px;
                            height: 345px;
                        }
                    }

                    @media (max-width: 992px) {
                        .carouselMain {
                            width: 100%;
                            height: 345px;
                        }

                        .slider {
                            border-radius: 10px;
                            height: 300px;
                        }
                    }
                </style>

                <!-- ==================================== NEXT BOX =========================================-->

                <div class="carouselMain" id="TopMainHide">

                    <div class="slider">
                        <div class="list">
                            <div class="item">
                                <img src="./resource/carousel-imges/2.jpg" loading="eager" style="object-fit: cover;" alt="">
                            </div>
                            <div class="item">
                                <img src="./resource/carousel-imges/photo-1441986300917-64674bd600d8.avif" loading="eager" style="object-fit: cover;" alt="">
                            </div>
                            <div class="item">
                                <img src="./resource/carousel-imges/3.avif" loading="eager" style="object-fit: cover;" alt="">
                            </div>
                            <div class="item">
                                <img src="./resource/carousel-imges/4.jpg" loading="eager" style="object-fit: cover;" alt="">
                            </div>
                            <div class="item">
                                <img src="./resource/carousel-imges/5.jpg" loading="eager" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="buttons">
                            <button id="prev1"><i class="fa-solid fa-angle-left"></i></button>
                            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
                        </div>
                        <ul class="dots">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>

                    <script>
                        let slider = document.querySelector('.slider .list');
                        let items = document.querySelectorAll('.slider .list .item');
                        let next = document.getElementById('next');
                        let prev = document.getElementById('prev1');
                        let dots = document.querySelectorAll('.slider .dots li');

                        let lengthItems = items.length - 1;
                        let active = 0;
                        next.onclick = function() {
                            active = active + 1 <= lengthItems ? active + 1 : 0;
                            reloadSlider();
                        }
                        prev.onclick = function() {
                            active = active - 1 >= 0 ? active - 1 : lengthItems;
                            reloadSlider();
                        }
                        let refreshInterval = setInterval(() => {
                            next.click()
                        }, 3000);

                        function reloadSlider() {
                            slider.style.left = -items[active].offsetLeft + 'px';
                            // 
                            let last_active_dot = document.querySelector('.slider .dots li.active');
                            last_active_dot.classList.remove('active');
                            dots[active].classList.add('active');

                            clearInterval(refreshInterval);
                            refreshInterval = setInterval(() => {
                                next.click()
                            }, 3000);


                        }

                        dots.forEach((li, key) => {
                            li.addEventListener('click', () => {
                                active = key;
                                reloadSlider();
                            })
                        })
                        window.onresize = function(event) {
                            reloadSlider();
                        };
                    </script>
                </div>
            </div>
        </div>


    </section>
    <!-- Hero Section End -->


    <!-- list start -->

    <!-- <div class="d-none d-lg-block">
        <div style="display: flex; align-items: center; justify-content: center;  margin-top: 15px;" class="col-12">
            <div class="u col-11" style="height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2" id="redirectPage">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/1.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Safe Payments</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/2.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Nationwide Delivary</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/3.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Free Returns</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/4.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Best Price</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/5.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">100% Authentic</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center;" class="col-2">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/6.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Shopping Verified</label>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="d-none d-lg-none">
        <div style="display: flex; align-items: center; justify-content: center;  margin-top: 15px;" class="col-12">
            <div class="u col-11" style="height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div style="display: flex; align-items: center; justify-content: center; width: 20%;" id="redirectPage">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/1.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Safe Payments</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center; width: 20%;">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/2.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Nationwide Delivary</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center; width: 20%;">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/3.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Free Returns</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center; width: 20%;">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/4.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">Best Price</label>
                        </a>

                    </div>

                    <span style="font-weight: 10; color: #b2b2b2;">|</span>

                    <div style="display: flex; align-items: center; justify-content: center; width: 20%;">
                        <a href="#" style="display: flex; align-items: center; justify-content: start; text-decoration: none;  gap: 5px;"><img src="./resources/icon-top/5.png" class="rounded-5 p1">
                            <label class="fontMiddle" style="margin-top: 7px; font-family: Arial, Helvetica, sans-serif; color: #424769;" for="">100% Authentic</label>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <!-- list end -->




    <!-- list-start (md to up) -->
    <div class="d-none d-lg-block down">
        <div class="col-12" style="display: flex; align-items: center; justify-content: center;  margin-top: 15px;">
            <div class="col-11 border border-1 nextBigDiv" style="background-color: #ffffff; border-radius: 10px; display: flex; align-items: center; justify-content: start;">

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;" id="redirectPage">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#" style=" z-index: 9999;"><img src="./resources/top-10-img/b2034164-d476-4ee7-9789-49eb8a6f8c20.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Fashion</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/2.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Beauty</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/3.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Shippong Pay</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/4.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Mart</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/5.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Play & Win</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/6.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Home & Kitchen</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/7.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Tech Gadgets</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/8.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Deals under 999</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/9.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Lotter Tickets</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 10%;">
                    <a href="#"><img src="./resources/top-10-img/10.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Wholesale Deals</p>
                </div>

            </div>
        </div>
    </div>
    <div class="d-none d-md-block d-lg-none down">
        <div class="col-12" style="display: flex; align-items: center; justify-content: center;  margin-top: 15px;">
            <div class="col-11 border border-1 nextBigDiv" style="background-color: #ffffff; border-radius: 10px; display: flex; align-items: center; justify-content: start;">

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;" id="redirectPage">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#" style=" z-index: 9999;"><img src="./resources/top-10-img/b2034164-d476-4ee7-9789-49eb8a6f8c20.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Fashion</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/2.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Beauty</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/3.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Shippong Pay</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/4.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Mart</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/5.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Play & Win</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/6.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Home & Kitchen</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center; border-right: 2px solid #e5e5e5;"></div>
                    <a href="#"><img src="./resources/top-10-img/7.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Tech Gadgets</p>
                </div>

                <div style="display: grid; text-align: center; justify-content: center; width: 12.5%; position: relative;">
                    <div style="width: 100%; height: 3.5vw; position: absolute; display: flex; align-self: center; justify-self: center;"></div>
                    <a href="#"><img src="./resources/top-10-img/8.png" class="rounded-5 pp" style="display: flex; justify-self: center;"></a>
                    <p class="divText" for="">Deals under 999</p>
                </div>

            </div>
        </div>
    </div>
    <!-- list-end -->

    <style>
        @media (max-width: 992px) {
            .flashText {
                font-size: 15px;
                color: #3e3f41;
                font-weight: 600;
            }

            .titleText {
                font-size: 11.5px;
                color: #3D3B40;
                font-weight: 600;
                line-height: 15px;
            }

            .titleText1 {
                font-size: 12px;
                color: #3D3B40;
                font-weight: 600;
                line-height: 15px;
            }

            .titleDiv {
                width: 90%;
                height: 32px;
                overflow: hidden;
            }

            .priceText {
                color: #a938ff;
                font-size: 12px;
            }

            .priceText1 {
                color: #a938ff;
                font-size: 12px;
            }

            .priceDiv {
                margin-top: -0.3vw;
            }

            .dicDiv {
                margin-top: -18px;
            }

            .disText1 {
                font-size: 9px;
            }
        }

        @media (min-width: 992px) {
            .flashText {
                font-size: 20px;
                font-weight: 600;
                color: #3e3f41;
            }

            .titleText {
                font-size: 13px;
                color: #3D3B40;
                font-weight: 600;
                line-height: 18px;
            }

            .titleText1 {
                font-size: 13px;
                color: #3D3B40;
                font-weight: 600;
                line-height: 18px;
            }

            .titleDiv {
                width: 90%;
                height: 33px;
                overflow: hidden;
            }

            .priceText {
                color: #a938ff;
                font-size: 16.5px;
            }

            .priceText1 {
                color: #a938ff;
                font-size: 16px;
            }

            .priceDiv {
                margin-top: 0.5vw;
            }

            .dicDiv {
                margin-top: -15px;
            }

            .disText1 {
                font-size: 9px;
            }
        }

        @media (max-width: 576px) {
            .flashText {
                font-size: 17px;
                font-weight: 600;
                color: #3e3f41;
            }

            .disText1 {
                font-size: 6px;
            }

            .notDis {
                margin-left: 65px;
            }
        }

        @media (min-width: 576px) {
            .flashText {
                font-size: 20px;
                font-weight: 600;
                color: #3e3f41;
            }

            .notDis {
                margin-left: 65px;
            }
        }
    </style>
    <!-- flash sale start (other devices) -->
    <div class="col-12 d-none d-md-block mt-3" style="z-index: -999;">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center p-0">
            <div class="col-11 d-flex flex-column aling-items-start justify-content-center p-0">
                <h1 class="flashText">Flash Sale</h1>
                <div class="bg-white col-12 d-flex mt-2" style="border-radius: 10px 10px 0 0 ; height: 50px;">
                    <div class="col-10 d-flex align-items-center justify-content-start" style="height: 50px;">
                        <span style="color: #a938ff; font-weight: 500; font-size: 14px;">On Sale Now</span>
                        <div class="d-flex align-items-center justify-content-center" style="margin-left: 70px;">
                            <span style="color: #3e3f41; font-size: 12px; font-weight: 600;">Ending in </span>
                            <div class="ms-3 d-flex align-items-center justify-content-center fs-4" style="border-radius: 6px; background-color: #e4d9fa; width: 40px; height: 40px; font-weight: 500;" id="timerhours1">00</div>&nbsp;
                            <span style="color: #3e3f41; font-weight: 600; font-size: 20px;">:</span>&nbsp;
                            <div class="d-flex align-items-center justify-content-center fs-4" style="border-radius: 6px; background-color: #e4d9fa; width: 40px; height: 40px; font-weight: 500;" id="timerminutes1">00</div>&nbsp;
                            <span style="color: #3e3f41; font-weight: 600; font-size: 20px;">:</span>&nbsp;
                            <div class="d-flex align-items-center justify-content-center fs-4" style="border-radius: 6px; background-color: #e4d9fa; width: 40px; height: 40px; font-weight: 500;" id="timerseconds1">00</div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-end p-0" style="height: 50px;">
                        <button class="fs-5" style="cursor: pointer; border: 2px solid #a938ff; color: #a938ff; width: 100px; height: 35px; border-radius: 5px; font-weight: 600;">SHOP NOW</button>
                    </div>
                </div>


                <div class="d-none d-lg-block">
                    <div class="d-flex align-items-center justify-content-center bg-white pt-3 " style="border-radius: 0 0 10px 10px; width: 100%; border: 2px solid #dee2e6;">
                        <div style="width: 98%; gap: 1.7vw;" class="d-flex align-items-start justify-content-start">
                            <?php
                            $query1 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN discount_type
                            ON product.discount_type_id=discount_type.id_dis WHERE `discount` > 0 ORDER BY RAND()  LIMIT 6");
                            $num1 = $query1->num_rows;
                            if ($num1 > 0) {
                                for ($i = 0; $i < $num1; $i++) {
                                    $data1 = $query1->fetch_assoc();
                            ?>
                                    <div onclick="getIndex(<?php echo $data1['product_id']; ?>);" style="cursor: pointer; width: 15%; text-decoration: none; border-radius: 8px; background-color: #f5f5f5;" class="polaroid p-0 mb-4">
                                        <div style="width: 100%;" class="p-0 mb-2">
                                            <div style="width: 100%;" class="p-0 m-0 ">
                                                <img src="<?php echo $data1["img_path"]; ?>" style="width: 100%; height: 13vw; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                            </div>
                                            <div class="mt-1 ms-2 mb-3 titleDiv" style="height: 32px;">
                                                <p class="titleText1" style="font-size: 11px; font-weight: 500; line-height: 15px;"><?php echo $data1["title"]; ?></p>
                                            </div>
                                            <div class="ms-2 priceDiv" style="margin-top: 8px;">
                                                <?php
                                                $price = $data1["price"];
                                                $discount = $data1["discount"];
                                                $process = ($price * $discount) / 100;
                                                $newPrice = $price - $process;
                                                if ($newPrice < 0) {
                                                    $newPrice = 0;
                                                }
                                                $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                                ?>
                                                <p class="priceText1" style="font-size: 12px; font-weight: 600;"><?php echo $formattedPrice; ?></p>
                                            </div>
                                            <div class="ms-2 dicDiv" style="margin-top: -10px;">
                                                <?php
                                                $price = $data1["price"];
                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                                ?>
                                                <span style="color: #6c757d; text-decoration: line-through;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600;" class="disText1">-</span><span style="color: #191919; font-size: 10px;" class="disText1"><?php echo $data1["discount"]; ?></span><span style="color: #191919; font-size: 10px;" class="disText1">%</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="d-none d-md-block d-lg-none">
                    <div class="d-flex align-items-center justify-content-center bg-white pt-3" style="border-radius: 0 0 10px 10px; width: 100%; border: 2px solid #dee2e6;">
                        <div style="width: 98%; gap: 18px;" class="d-flex align-items-start justify-content-start">
                            <?php
                            $query2 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN discount_type
                            ON product.discount_type_id=discount_type.id_dis  WHERE `discount` > 0 ORDER BY RAND()  LIMIT 4");
                            $num2 = $query2->num_rows;
                            if ($num2 > 0) {
                                for ($i = 0; $i < $num2; $i++) {
                                    $data2 = $query2->fetch_assoc();
                            ?>
                                    <div onclick="getIndex(<?php echo $data2['product_id']; ?>);" style="cursor: pointer; width: 25%; text-decoration: none; border-radius: 8px; background-color: #f5f5f5;" class="polaroid p-0 mb-4">
                                        <div style="width: 100%;" class="p-0 mb-2">
                                            <div style="width: 100%;" class="p-0 m-0 ">
                                                <img src="<?php echo $data2["img_path"]; ?>" style="width: 100%; height: 19vw; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                            </div>
                                            <div class="mt-1 mb-3 ms-2 titleDiv">
                                                <p class="titleText1"><?php echo $data2["title"]; ?></p>
                                            </div>
                                            <div class="ms-2 priceDiv">
                                                <?php
                                                $price = $data2["price"];
                                                $discount = $data2["discount"];
                                                $process = ($price * $discount) / 100;
                                                $newPrice = $price - $process;
                                                if ($newPrice < 0) {
                                                    $newPrice = 0;
                                                }
                                                $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                                ?>
                                                <p class="priceText1" style="font-size: 13px; font-weight: 600;"><?php echo $formattedPrice; ?></p>
                                            </div>
                                            <div class="ms-2 dicDiv" style="margin-top: -8px;">
                                                <?php
                                                $price = $data2["price"];
                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                                ?>
                                                <span style="color: #6c757d; text-decoration: line-through; font-size: 9px;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600; font-size: 10px;" class="disText1">-</span><span style="color: #191919; font-size: 10px;" class="disText1"><?php echo $data2["discount"]; ?></span><span style="color: #191919; font-size: 10px;" class="disText1">%</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- flash sale end (other devices) -->

    <script>
        // Access the timer display element:
        // const timerDisplay = document.getElementById("timer-display");
        const timerDisplay = [
            document.getElementById("timerhours"),
            document.getElementById("timerminutes"),
            document.getElementById("timerseconds")
        ];


        let hours = 4;
        let minutes = 59;
        let seconds = 59;

        // Start the timer:
        const intervalId = setInterval(() => {
            // Update timer display:
            timerDisplay[0].textContent = `${hours.toString().padStart(2, '0')}`,
                timerDisplay[1].textContent = `${minutes.toString().padStart(2, '0')}`,
                timerDisplay[2].textContent = `${seconds.toString().padStart(2, '0')}`;

            // document.cookie = "hours=" + hours + "; index.php";
            // document.cookie = "minutes=" + minutes + "; index.php";
            // document.cookie = "seconds=" + seconds + "; index.php";

            // Decrement seconds:
            seconds--;

            // Handle minutes and hours decrement:
            if (seconds < 0) {
                minutes--;
                seconds = 59;
                if (minutes < 0) {
                    hours--;
                    minutes = 59;
                }
            }

            // Stop timer when it reaches zero:
            if (hours === 0 && minutes === 0 && seconds === 0) {
                clearInterval(intervalId);
                // timerDisplay.textContent = "Time's up!";
                timerDisplay[2].textContent = '01';
                setTimeout(() => {
                    timerDisplay[2].textContent = '00';
                }, 1000);


            }
        }, 1000); // Update every second
    </script>

    <style>
        @media (max-width: 992px) {
            .starsAlls {
                font-size: 8px;
            }

            .reviewsNum {
                font-size: 8px;
            }

            .mainGrid {
                grid-template-columns: repeat(4, 1fr);
                display: grid;
                align-items: center;
                width: 100%;
            }

            .imgOpt {
                height: 20vw;
            }

            .starsDiv {
                margin-bottom: 5px;
            }

            .titleText {
                font-size: 11px;
            }

            .titleDiv {
                margin-bottom: 5px;
            }

            .priceText {
                font-size: 13px;
                font-weight: 600;
            }

            .disText1 {
                font-size: 9px;
            }
        }

        @media (min-width: 992px) {
            .starsAlls {
                font-size: 8px;
            }

            .reviewsNum {
                font-size: 10px;
            }

            .mainGrid {
                grid-template-columns: repeat(6, 1fr);
                display: grid;
                align-items: center;
                width: 100%;
                gap: 50px;
            }

            .priceText {
                font-size: 12px;
                font-weight: 600;
            }

            .imgOpt {
                height: 13vw;
            }

            .starsDiv {
                margin-bottom: 5px;
            }

            .titleText {
                font-size: 11px;
                line-height: 15px;
            }

            .disText1 {
                font-size: 9px;
            }
        }

        @media (max-width: 768px) {
            .starsAlls {
                font-size: 8px;
            }

            .reviewsNum {
                font-size: 8px;
            }

            .mainGrid {
                grid-template-columns: repeat(3, 1fr);
                display: grid;
                align-items: center;
                width: 100%;
                gap: 12px;
            }

            .imgOpt {
                height: 30vw;
            }

            .starsDiv {
                margin-bottom: 5px;
            }

            .priceText {
                font-size: 14px;
                font-weight: 500;
            }

            .titleDiv {
                margin-bottom: 5px;
            }

            .titleText {
                font-size: 12px;
                font-weight: 500;
            }

            .disText1 {
                font-size: 9px;
            }

            .dicDiv {
                margin-top: -13px;
            }
        }

        @media (max-width: 576px) {
            .starsAlls {
                font-size: 8px;
            }

            .reviewsNum {
                font-size: 8px;
            }

            .mainGrid {
                grid-template-columns: repeat(2, 1fr);
                display: grid;
                align-items: center;
                width: 100%;
                gap: 13px;
            }

            .imgOpt {
                height: 44vw;
            }

            .starsDiv {
                margin-bottom: 5px;
            }

            .priceText {
                font-size: 14px;
                margin-top: 7px;
            }

            .titleDiv {
                margin-bottom: 5px;
            }

            .titleText {
                font-size: 13px;
                font-weight: 500;
            }

            .disText1 {
                font-size: 10px;
            }

            .dicDiv {
                margin-top: -13px;

            }
        }
    </style>


    <!-- just for me START (Other Devices) -->
    <div class="d-none d-md-block">
        <div class="col-12 d-flex align-items-center justify-content-center mt-5">
            <div class="col-11 d-flex flex-column align-items-start justify-content-start p-0">
                <h1 class="flashText">Just For You</h1>
                <div class="gap-4 mainGrid">
                    <?php
                    $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `discount_type_id` != 2  ORDER BY RAND()");
                    $num = $query->num_rows;
                    if ($num > 0) {
                        for ($i = 0; $i < $num; $i++) {
                            $data5 = $query->fetch_assoc();
                    ?>
                            <div onclick="getIndex(<?php echo $data5['id']; ?>);" style="cursor: pointer; text-decoration: none; background-color: #ffffff; width: 100%; border-radius: 8px;" class="polaroid">
                                <div style="width: 100%; border-radius: 8px;">
                                    <div style="width: 100%; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                        <img src="<?php echo $data5["img_path"] ?>" style="width: 100%; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0 imgOpt">
                                    </div>
                                    <div class="mt-1 ms-2 mb-2 titleDiv">
                                        <p class="titleText"><?php echo $data5["title"] ?></p>
                                    </div>
                                    <div class="ms-2 priceDiv">
                                        <?php
                                        $price = $data5["price"];
                                        $discount = $data5["discount"];
                                        $process = ($price * $discount) / 100;
                                        $newPrice = $price - $process;
                                        if ($newPrice < 0) {
                                            $newPrice = 0;
                                        }
                                        $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                        ?>
                                        <p class="priceText"><?php echo $formattedPrice; ?></p>
                                    </div>
                                    <?php
                                    if ($data5["discount"] > 0) {
                                    ?>
                                        <div class="ms-2 dicDiv d-flex align-items-center justify-content-between" style="margin-top: -10px;">
                                            <div class="">
                                                <?php

                                                $price = $data5["price"];
                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');

                                                ?>
                                                <span style="color: #6c757d; text-decoration: line-through;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600;" class="disText1">-</span><span style="color: #191919; font-weight: 600;" class="disText1"><?php echo $data5["discount"]; ?></span><span style="color: #191919; font-weight: 600;" class="disText1">%</span>

                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="ms-2" style="margin-top: -10px;">
                                            <span style="color: #6c757d; font-size: 9px;" class="disText1">20&nbsp;Sold</span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="ms-2 starsDiv" style="color: #3e3f41;">
                                        <?php
                                        $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $data5["id"] . "'");

                                        $rate_num = $review->num_rows;

                                        if ($rate_num == 0) {
                                        ?>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span>0</span>)</span>
                                            <?php
                                        } else {
                                            $rate_data = $review->fetch_assoc();
                                            $rate_1 = $rate_data["rating-1"];
                                            $rate_2 = $rate_data["rating-2"];
                                            $rate_3 = $rate_data["rating-3"];
                                            $rate_4 = $rate_data["rating-4"];
                                            $rate_5 = $rate_data["rating-5"];
                                            $number_1 = 500;
                                            $rate_two = 0;
                                            if ($rate_2 >= $number_1) {
                                                $rate_two = $rate_2 - $number_1;
                                            }
                                            $number_2 = 1000;
                                            $all_rate =  $rate_1 + $rate_2 + $rate_3 + $rate_4 + $rate_5;
                                            $rate = (($rate_1 + $rate_two) / $number_2) * 100;

                                            if ($rate <= 20) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 40) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate;; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 60) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 80) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                            <?php
                                            } else if ($rate <= 100) {
                                            ?>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span class="fa fa-star checked starsAlls"></span>
                                                <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- just for me END -->

    <!--Other Devices end ===============================================================================================================================-->
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
        // Access the timer display element:
        // const timerDisplay = document.getElementById("timer-display");
        const timerDisplay1 = [
            document.getElementById("timerhours1"),
            document.getElementById("timerminutes1"),
            document.getElementById("timerseconds1")
        ];


        let hours1 = 4;
        let minutes1 = 59;
        let seconds1 = 59;

        // Start the timer:
        const intervalId1 = setInterval(() => {
            // Update timer display:
            timerDisplay1[0].textContent = `${hours1.toString().padStart(2, '0')}`,
                timerDisplay1[1].textContent = `${minutes1.toString().padStart(2, '0')}`,
                timerDisplay1[2].textContent = `${seconds1.toString().padStart(2, '0')}`;

            // document.cookie = "hours=" + hours + "; index.php";
            // document.cookie = "minutes=" + minutes + "; index.php";
            // document.cookie = "seconds=" + seconds + "; index.php";

            // Decrement seconds:
            seconds1--;

            // Handle minutes and hours decrement:
            if (seconds1 < 0) {
                minutes1--;
                seconds1 = 59;
                if (minutes1 < 0) {
                    hours1--;
                    minutes1 = 59;
                }
            }

            // Stop timer when it reaches zero:
            if (hours1 === 0 && minutes1 === 0 && seconds1 === 0) {
                clearInterval(intervalId1);
                // timerDisplay.textContent = "Time's up!";
                timerDisplay1[2].textContent = '01';
                setTimeout(() => {
                    timerDisplay1[2].textContent = '00';
                }, 1000);


            }
        }, 1000); // Update every second
    </script>
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
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65f54395cc1376635adb4236/1hp3100a0';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <?php
    require "./footer.php";
    ?>

    <!-- Footer Section End -->
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