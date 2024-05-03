<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$email = $_COOKIE["email"];
// include "./connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | My Orders</title>
    <link rel="stylesheet" href="./myOrders.css">
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
    <div class="col-12 d-flex justify-content-center align-items-center mt-3">
        <div class="col-12 d-flex justify-content-center align-items-center p-0 ">
            <div class="col-11 p-0 ">
                <?php

                if (isset($_COOKIE["name"])) {

                ?>
                    <div class="sidebar" style="z-index: 99999;">
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" onclick="myProfile();" href="./manageAccount.php">&nbsp;<i class="fa-regular fa-user fs-3"></i>&nbsp;&nbsp;&nbsp;My Profile</a>
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="#" class="active">&nbsp;<i class="fa-solid fa-inbox fs-3"></i>&nbsp;&nbsp;&nbsp;My Orders</a>
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="./myWishlist.php">&nbsp;<i class="fa-regular fa-heart fs-3"></i>&nbsp;&nbsp;&nbsp;Wishlist</a>
                    </div>
                    <?php
                    $query = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $email . "' ORDER BY `id_order` DESC");
                    $num_order = $query->num_rows;
                    ?>
                    <div class="content">
                        <?php
                        if ($num_order > 0) {
                        ?>
                            <h2 style="font-weight: 500; font-size: 20px;">My Orders</h2>
                            <div class="bg-white col-12 mt-3 pt-2 pb-2 mb-3" style="border-radius: 8px;">
                                <div class="col-12 d-flex align-items-center justify-content-start" style="height: 50px; background-color: #f2f2f2; border-radius: 8px;">
                                    <span style="font-size: 14px; font-weight: 600;">Show&nbsp;:</span>
                                    <select class="ms-3 ps-2" style="width: 150px; height: 40px; font-size: 14px; font-weight: 600; border: 2px solid #a938ff; border-radius: 8px;" id="orderDate">
                                        <option onclick="list();" value="5">Last 05 orders</option>
                                        <option onclick="list();" value="15">Last 05 days</option>
                                        <option onclick="list();" value="30">Last 30 days</option>
                                        <option onclick="list();" value="all">All Orders</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12" style="border-radius: 8px;">
                                <div class="row d-flex justify-content-center ps-4 pe-4 pb-3" style="border-radius: 8px; background-color: #ede4ff;" id="addContent">


                                    <?php
                                    for ($i = 0; $i < $num_order; $i++) {
                                        $data_order = $query->fetch_assoc();
                                        $query_status = Database::search("SELECT * FROM order_status WHERE `id` = '" . $data_order["order_status_id"] . "'");
                                        $data_status = $query_status->fetch_assoc();
                                        $query_product = Database::search("SELECT * FROM product WHERE `id` = '" . $data_order["product_id"] . "'");
                                        $data_product = $query_product->fetch_assoc();
                                        $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON img_path = product_img_path WHERE `product_id` = '" . $data_order["product_id"] . "'");
                                        $data_img = $query_img->fetch_assoc();
                                        $query_seller = Database::search("SELECT * FROM seller WHERE `email` = '" . $data_product["user_email"] . "'");
                                        $data_seller = $query_seller->fetch_assoc();

                                    ?>
                                        <div class="col-12 bg-white mt-3 pt-1 pb-3" style="border-radius: 8px;">
                                            <div class="col-12 p-0 d-flex border-bottom" style="height: 40px;">
                                                <div class="col-6 d-flex flex-column">
                                                    <span style="font-size: 13px; font-weight: 600;">Order ID&nbsp;&nbsp;<span class="text-primary" style="font-size: 13px; font-weight: 500;"><?php echo $data_order["generated_id"]; ?></span></span>
                                                    <span style="font-size: 11px; color: #79758a;">Placed on <?php echo $data_order["date_time"]; ?></span>
                                                </div>
                                                <?php
                                                // Get the original phone number
                                                $originalNumber = $data_seller["mobile"];

                                                $formattedNumber1 = substr($originalNumber, 1);

                                                // Prepend the country code with a plus sign "+"
                                                $countryCode = "94";

                                                // Combine the country code and the original number
                                                $formattedNumber = $countryCode . $formattedNumber1;
                                                ?>
                                                <a href="https://wa.me/<?php echo $formattedNumber; ?>" target="_blank" class="col-6 d-flex align-items-center justify-content-end text-decoration-none">

                                                    <span class="material-symbols-outlined fs-2" style="color: #a938ff;">
                                                        forum
                                                    </span>

                                                    <span style="font-size: 12px; font-weight: 600; color: #a938ff;">&nbsp;Chat with seller</span>
                                                </a>
                                            </div>
                                            <div class="col-12 mt-2 d-flex p-0" style="height: 100px;">
                                                <div class="col-9 p-0 d-flex align-items-center justify-content-start" style="width: 100%;">
                                                    <div style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; margin-right: 13px;">
                                                        <img onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="cursor: pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 8px;" src="<?php echo $data_img["product_img_path"]; ?>" alt="">
                                                    </div>

                                                    <div class="d-flex flex-column titleOrder" style="gap: px;">
                                                        <div onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="width: 100%; height: 40px; overflow: hidden; font-size: 12px; font-weight: 600; text-align: start; display: flex; align-items: start; justify-content: start; cursor: pointer;"><?php echo $data_product["title"]; ?></div>
                                                        <?php
                                                        if ($data_order["option_order"] != null) {
                                                        ?>
                                                            <div style="width: 90%; height: 14px; font-size: 9px; font-weight: 600; color: #79758a; overflow: hidden;">Option:&nbsp;<?php echo $data_order["option_order"]; ?></div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div style="font-size: 9px; font-weight: 600; color: #79758a;">Qty:&nbsp;<?php echo $data_order["qty_order"]; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-3 d-flex align-items-center justify-content-end p-0">
                                                    <span class="ps-3 pe-3 pt-2 pb-2 rounded-3 d-flex align-items-center justify-content-center text-white me-1" style="font-size: 12px; font-weight: 600; background-color: #a938ff;"><?php echo $data_status["status_type"]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="col-12 rounded-3 bg-white d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <span style="font-size: 14px; font-weight: 600;">Empty Order Page</span>
                            <button onclick="goToIndexFromOrder();" class="p-4 mt-2 rounded-3 text-white fw-bold" style="background-color: #a938ff; font-size: 14px;">Continue Shopping</button>
                        </div>
                            <?php
                        }
                        ?>

                        <!-- ============================== alert Profile Update =========================-->
                        <!-- <div class="hide" id="msgDivUpdateProfile">
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
                    </div> -->

                    <?php
                } else {

                    // include "./session.php";
                    // header("Location: login.php");
                    ?>
                        <script>
                            window.location.href = "login.php";
                        </script>
                    <?php
                }

                    ?>
                    </div>

            </div>
        </div>


    </div>
    <!-- ===================== footer ======================-->

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

    <script src="./myOrders.js"></script>
</body>

</html>