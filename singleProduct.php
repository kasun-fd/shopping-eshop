<?php
session_start();
$session_data = $_SESSION["p"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping | <?php echo $session_data["title"]; ?></title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="./MobileHeader.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./singleProduct.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        ul.breadcrumb {
            list-style: none;
            background-color: #eee;
            margin-left: 55px;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 12px;
        }

        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }

        ul.breadcrumb li a {
            color: black;
            text-decoration: none;
        }

        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }
    </style>
</head>

<body style="background-color: #eff0f5;">

    <?php

    require "./singleHeader.php";
    if (isset($_SESSION["p"])) {
    ?>

        <!-- ================================== HEADER start ==================================-->


        <div class="d-block d-md-none">
            <div class="HeaderMobileMain">
                <div class="HeaderMobileSub01">
                    <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                    <div style="width: 100%; white-space: nowrap; overflow: hidden;" class="HeaderMobileMainText"><?php echo $session_data["title"]; ?></div style="background-color: #01447e;">
                </div>
                <div class="HeaderMobileSub02">

                </div>

            </div>
        </div>



        <div class="page-wrapper">

            <main class="main">

                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-12 col-md-11 d-flex align-items-center justify-content-start ps-0">
                        <div class="ps-2 pe-2 d-flex align-items-center justify-content-center mt-3 mb-3" style="height: 20px; background-color: #ffffff; border-radius: 5px;">
                            <ul class="d-flex align-items-center justify-content-start pt-3 ps-0">
                                <?php
                                $cat = Database::search("SELECT * FROM product JOIN category ON product.category_cat_id = category.cat_id WHERE `id` = '" . $session_data["product_id"] . "'");
                                $cat_data = $cat->fetch_assoc();
                                ?>
                                <li style="color: black; font-size: 11px;"><a style="color: black;" href="./index.php">Home</a></li>
                                <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
                                <li><a style="color: #a938ff; font-size: 11px;" href="#"><?php echo $cat_data["cat_name"]; ?></a></li>
                        </div>

                        </ul>
                    </div>

                </div>


                <div class="page-content col-12 d-flex align-items-center justify-content-center">
                    <div class="col-12 col-md-11 p-0">
                        <div class="product-details-top" style="background-color: #ffffff; padding: 10px; border-radius: 8px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery product-gallery-vertical">
                                        <div class="row">
                                            <?php
                                            $index = Database::search("SELECT * FROM product_img JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `product_id` = '" . $session_data["product_id"] . "'");
                                            $fetch = $index->fetch_assoc();
                                            ?>
                                            <div class="product-main-image">
                                                <img src="<?php echo $fetch["img_path"]; ?>" id="imageChange" alt="product image">
                                            </div><!-- End .product-main-image -->

                                            <div id="product-zoom-gallery" class="product-image-gallery">
                                                <a class="product-gallery-item active" onclick="change(<?php echo $fetch['index_id']; ?>);" href="#">
                                                    <img src="<?php echo $fetch['img_path']; ?>" alt="product side">
                                                </a>
                                                <?php
                                                $test = Database::search("SELECT * FROM product_img WHERE `product_id` = '" . $session_data["product_id"] . "' AND `index_id` != '" . $fetch["index_id"] . "'");
                                                $num = $test->num_rows;
                                                for ($i = 0; $i < $num; $i++) {
                                                    $data = $test->fetch_assoc();
                                                ?>
                                                    <a class="product-gallery-item" onclick="change(<?php echo $data['index_id']; ?>);" href="#">
                                                        <img src="<?php echo $data["img_path"]; ?>" alt="product side">
                                                    </a>
                                                <?php
                                                }
                                                ?>

                                                <!-- 
                                            <a class="product-gallery-item" href="#">
                                                <img src="./resources/cat_img/11.jpg" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#">
                                                <img src="./resources/cat_img/3.jpg" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#">
                                                <img src="./resources/cat_img/5.webp" alt="product back">
                                            </a> -->
                                            </div><!-- End .product-image-gallery -->
                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details">
                                        <?php
                                        $query1 = Database::search("SELECT * FROM product WHERE `id` = '" . $session_data["product_id"] . "'");
                                        $data1 = $query1->fetch_assoc();
                                        $_SESSION["e"] = $data1["title"];
                                        ?>
                                        <h1 class="product-title" style="font-weight: 600;"><?php echo $data1["title"]; ?></h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <?php
                                            $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                            $rate_num = $review->num_rows;

                                            if ($rate_num == 0) {
                                            ?>
                                                <span class="fa fa-star starsAlls"></span>
                                                <span class="fa fa-star starsAlls"></span>
                                                <span class="fa fa-star starsAlls"></span>
                                                <span class="fa fa-star starsAlls"></span>
                                                <span class="fa fa-star starsAlls"></span>
                                                <a class="ratings-text" href="#product-review-link" id="review-link">( 0 Reviews )</a>
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
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $all_rate; ?> Reviews )</a>
                                                <?php
                                                } else if ($rate <= 40) {
                                                ?>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $all_rate; ?> Reviews )</a>
                                                <?php
                                                } else if ($rate <= 60) {
                                                ?>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $all_rate; ?> Reviews )</a>
                                                <?php
                                                } else if ($rate <= 80) {
                                                ?>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star starsAlls"></span>
                                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $all_rate; ?> Reviews )</a>
                                                <?php
                                                } else if ($rate <= 100) {
                                                ?>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $all_rate; ?> Reviews )</a>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div><!-- End .rating-container -->


                                        <?php
                                        if ($data1["discount"]) {
                                        ?>
                                            <div class="product-price mt-5" style="color: #a938ff; font-weight: 600; font-size: 25px;">
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
                                                <?php echo $formattedPrice; ?>
                                            </div><!-- End .product-price -->
                                            <div class="mb-5" style="margin-top: -10px;">
                                                <?php
                                                $price = $data1["price"];
                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                                ?>
                                                <span style="text-decoration: line-through; color: #9e9e9e; font-size: 14px; font-weight: 600;"><?php echo $formattedPrice1; ?>&nbsp;</span>
                                                <span style="font-size: 14px; font-weight: 600;">&nbsp;-<?php echo $data1["discount"] . "%"; ?></span>
                                            </div>

                                        <?php
                                        } else {
                                        ?>

                                            <div class="product-price mt-5 mb-4" style="color: #a938ff; font-weight: 600; font-size: 25px;">
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
                                                <?php echo $formattedPrice; ?>
                                            </div><!-- End .product-price -->

                                        <?php
                                        }
                                        ?>


                                        <!-- <div class="details-filter-row details-row-size">
                                            <label for="size">Color:</label>
                                            <div class="select-custom">
                                                <select style="font-size: 13px; font-weight: 600;" class="form-control">
                                                    <option value="0">Select a color</option> -->

                                        <?php
                                        // $color_query = Database::search("SELECT * FROM color WHERE `product_id` = '" . $session_data["product_id"] . "'");
                                        // $num_colors = $color_query->num_rows;
                                        // for ($i = 0; $i < $num_colors; $i++) {
                                        //     $data01 = $color_query->fetch_assoc();
                                        ?>
                                        <!-- text -->
                                        <?php
                                        // }
                                        ?>
                                        <!-- </select>
                                            </div>
                                        </div> -->


                                        <div class="col-12 d-flex align-items-center justify-content-start mb-4 p-0" style="z-index: 9999;">
                                            <label for="category" style="color: #666666; font-size: 12px; font-weight: 400;">Option:</label>
                                            <select id="option_cart" class="ps-2" style="margin-left: 35px; border-radius: 5px; height: 40px; width: 130px; border: 1px solid #a938ff; font-size: 12px; font-weight: 500; color: #666666;" id="category">
                                                <option value="0">Select a Option</option>
                                                <?php
                                                $category_rs = Database::search("SELECT * FROM color WHERE `product_id` = '" . $session_data["product_id"] . "'");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["clr_id"]; ?>">
                                                        <?php echo $category_data["clr_name"]; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <!-- <div class="col-12 d-flex align-items-center justify-content-start mb-4 p-0" style="z-index: 9999;">
                                            <label for="category" style="color: #666666; font-size: 14px; font-weight: 400; margin-right: 39px;">Size:</label>
                                            <select class="ps-2" style="border-radius: 5px; height: 40px; width: 130px; border: 1px solid #a938ff; font-size: 12px; font-weight: 500; color: #666666;" id="category">
                                                <option value="0">Select a Size</option>
                                                <?php
                                                // $category_rs = Database::search("SELECT * FROM color WHERE `product_id` = '" . $session_data["product_id"] . "'");
                                                // $category_num = $category_rs->num_rows;

                                                // for ($x = 0; $x < $category_num; $x++) {
                                                //     $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="
                                                    <?php
                                                    // echo $category_data["clr_id"]; 
                                                    ?>
                                                    ">
                                                        <?php
                                                        // echo $category_data["clr_name"]; 
                                                        ?>
                                                    </option>
                                                <?php
                                                // }
                                                ?>
                                            </select>

                                        </div> -->


                                        <!-- <div class="mt-2 d-flex mb-4">
                                            <span style="font-size: 13px; color: #666666;">Colors:</span>
                                            <div class="ms-5 col-10 row" style="gap: 3px;">
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                                <span class="col-4 fs-4" style="background-color: #666666; border-radius: 8px; padding: 5px;">color name</span>
                                            </div>
                                        </div> -->

                                        <!-- <div class="details-filter-row details-row-size">
                                            <label>Color:</label>

                                            <div class="product-nav product-nav-thumbs">
                                                <a href="#" class="active">
                                                    <img src="assets/images/products/single/1-thumb.jpg" alt="product desc">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                                </a>
                                                
                                            </div>
                                        </div> -->



                                        <div class="details-filter-row details-row-size">
                                            <label for="qty" style="font-size: 12px;">Qty:</label>
                                            <div class="product-details-quantity d-flex ms-3">
                                                <?php

                                                $qtyQuery = Database::search("SELECT * FROM product WHERE `id` = '" . $session_data["product_id"] . "'");
                                                $data = $qtyQuery->fetch_assoc();
                                                ?>
                                                <input type="number" id="qty" max="<?php echo $data["qty"]; ?>" class="form-control fs-5" value="1" min="1" max="10" step="1" data-decimals="0" required>

                                            </div><!-- End .product-details-quantity -->
                                            <span class="ms-4 fs-6" style="color: #a938ff;"><?php echo $data["qty"]; ?> in stock</span>
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action mt-5">
                                            <button onclick="buyNowProduct(<?php echo $session_data['product_id']; ?>)" class="d-flex align-items-center justify-content-center btn-buy text-decoration-none"><span class="text-btn">Buy Now</span></button>
                                            <div class="details-action-wrapper">
                                                <?php

                                                $cart_query = Database::search("SELECT * FROM cart WHERE `user_cart_email` = '" . $email . "' AND `product_id` = '" . $session_data["product_id"] . "'");
                                                $num = $cart_query->num_rows;

                                                if ($num == 1) {
                                                ?>

                                                    <div onclick="cartDelete(<?php echo $session_data['product_id']; ?>);" class="text-decoration-none d-flex align-items-center justify-content-center" style="cursor: pointer; text-decoration: none; color: #777777;" title="cart"><i class="bi bi-bag-plus fs-2">&nbsp;</i><span style="text-decoration: none;" class="ext-decoration-none fs-5">Add to Cart</span></div>


                                                <?php
                                                } else {
                                                ?>

                                                    <div onclick="cart(<?php echo $session_data['product_id']; ?>);" class="text-decoration-none d-flex align-items-center justify-content-center" style="cursor: pointer; text-decoration: none; color: #777777;" title="cart"><i class="bi bi-bag-plus fs-2">&nbsp;</i><span style="text-decoration: none;" class="ext-decoration-none fs-5">Add to Cart</span></div>


                                                <?php
                                                }

                                                ?>

                                                <span style=" color: #777777;">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                <?php

                                                $cart_query = Database::search("SELECT * FROM watchlist WHERE `user_watch_email` = '" . $email . "' AND `product_id` = '" . $session_data["product_id"] . "'");
                                                $num = $cart_query->num_rows;

                                                if ($num == 1) {
                                                ?>

                                                    <a onclick="watchDelete(<?php echo $session_data['product_id']; ?>);" href="#" class="text-decoration-none d-flex align-items-center justify-content-center" style="text-decoration: none; color: #a938ff;" title="wishlist"><i class="bi bi-heart fs-3"></i>&nbsp;<span class="fs-5">Remove from Wishlist</span></a>


                                                <?php
                                                } else {
                                                ?>

                                                    <a onclick="watchAdd(<?php echo $session_data['product_id']; ?>);" href="#" class="text-decoration-none d-flex align-items-center justify-content-center" style="text-decoration: none; color: #777777;" title="wishlist"><i class="bi bi-heart fs-3"></i>&nbsp;<span class="fs-5">Add to Wishlist</span></a>


                                                <?php
                                                }

                                                ?>


                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="d-none" id="buyNowButtonAlert">
                                            <div style="background-color: #EFF0F6;" class="col-12 pt-3 rounded-3 d-flex align-items-center justify-content-center">
                                                <p class="text-danger fw-bold fs-5 text-justify">First, You need to fill in your address information.&nbsp<b onclick="goToAddressPage();" style="cursor:pointer; color: #777777;" class="text-decoration-underline">go to address info page</b></p>
                                            </div>
                                        </div>

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Category:</span>
                                                <a href="#"><?php echo $session_data["cat_name"]; ?></a>
                                            </div><!-- End .product-cat -->

                                            <div class="social-icons social-icons-sm bg-white pe-3 shadow p-3 mt-5 mt-md-0 rounded-4">
                                                <div class="d-grid">
                                                    <div class="pb-2 fs-5" style="font-weight: 600;">Do you need to any help on buying?</div>
                                                    <div class="d-flex align-items-center justify-content-around">
                                                        <?php

                                                        $query = Database::search("SELECT * FROM product WHERE `id` = '" . $session_data["product_id"] . "'");
                                                        $data = $query->fetch_assoc();

                                                        $query2 = Database::search("SELECT * FROM seller WHERE `email` = '" . $data["user_email"] . "'");
                                                        $data2 = $query2->fetch_assoc();

                                                        // Get the original phone number
                                                        $originalNumber = $data2["mobile"];

                                                        $formattedNumber1 = substr($originalNumber, 1);

                                                        // Prepend the country code with a plus sign "+"
                                                        $countryCode = "94";

                                                        // Combine the country code and the original number
                                                        $formattedNumber = $countryCode . $formattedNumber1;

                                                        ?>
                                                        <a target="_blank" href="https://wa.me/<?php echo $formattedNumber; ?>" style="text-decoration: none; border: 2px solid #25d366; border-radius: 8px; font-size: 12px; font-weight: 600; color: #25d366;" class="ps-4 pe-4 pt-1 pb-1 d-flex align-items-center justify-content-center"><i class="fa-brands fa-whatsapp fs-2" style="color: #25d366;"></i>&nbsp;Chat</a>
                                                        <?php

                                                        $query = Database::search("SELECT * FROM product WHERE `id` = '" . $session_data["product_id"] . "'");
                                                        $data = $query->fetch_assoc();

                                                        $query2 = Database::search("SELECT * FROM seller WHERE `email` = '" . $data["user_email"] . "'");
                                                        $data2 = $query2->fetch_assoc();

                                                        // Get the original phone number
                                                        $originalNumber = $data2["mobile"];

                                                        $formattedNumber1 = substr($originalNumber, 1);

                                                        // Prepend the country code with a plus sign "+"
                                                        $countryCode = "+94";

                                                        // Combine the country code and the original number
                                                        $formattedNumber = $countryCode . $formattedNumber1;

                                                        ?>
                                                        <a href="tel:<?php echo $formattedNumber; ?>" style="text-decoration: none; border: 2px solid #387ADF; border-radius: 8px; font-size: 12px; font-weight: 600; color: #387ADF;" class="ps-4 pe-4 pt-1 pb-1 d-flex align-items-center justify-content-center"><i class="fa-solid fa-phone-volume fs-2" style="color: #387ADF;"></i>&nbsp;&nbsp;Call</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->

                        <div class="d-none d-md-block mb-4 mt-5">
                            <div class="col-12 d-flex flex-column align-items-center justify-content-center pt-0 pb-4 ps-0 pe-0 mt-4 " style="background-color: #ffffff; padding: 10px; border-radius: 8px;">
                                <div class="col-12 pt-4 pb-4" style="font-size: 15px; font-weight: 600; background-color: #f5f5f5; border-radius: 8px 8px 0 0;">Ratings & Reviews</div>
                                <div class="col-12 d-flex flex-column align-items-center justify-content-center p-0">
                                    <div class="col-12 row d-flex p-0 pt-4" style="height: 200px;">
                                        <div class="col-12 d-grid col-md-4 col-lg-3 border-right">
                                            <div class="col-12 d-flex">
                                                <?php
                                                $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                    <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                    <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                    <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                    <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
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
                                                        <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                    <?php
                                                    } else if ($rate <= 40) {
                                                    ?>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                    <?php
                                                    } else if ($rate <= 60) {
                                                    ?>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                    <?php
                                                    } else if ($rate <= 80) {
                                                    ?>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                    <?php
                                                    } else if ($rate <= 100) {
                                                    ?>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                        <span class="fa fa-star checked " style="font-size: 20px;"></span>

                                                <?php
                                                    }
                                                }
                                                ?>

                                            </div><!-- End .rating-container -->
                                            <div class="col-12 p-0 mb-3 " style=" margin-top: -3px;">
                                                <?php
                                                $ratings = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");
                                                $num = $ratings->num_rows;
                                                if ($num != 0) {
                                                    $rating_data = $ratings->fetch_assoc();
                                                    for ($i = 0; $i < $num; $i++) {
                                                        $rate1 = $rate_data["rating-1"];
                                                        $rate2 = $rate_data["rating-2"];
                                                        $rate3 = $rate_data["rating-3"];
                                                        $rate4 = $rate_data["rating-4"];
                                                        $rate5 = $rate_data["rating-5"];
                                                        $total = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
                                                ?>


                                                        <?php
                                                        if ($rate >= 40 && $rate < 60) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 120px; margin-left: 18px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Good</span></div>

                                                        <?php
                                                        } else if ($rate >= 60 && $rate < 80) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 150px; margin-left: 18px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Very Good</span></div>

                                                        <?php
                                                        } else if ($rate >= 80 && $rate <= 100) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 140px; margin-left: 18px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Excellent</span></div>

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a class="ratings-text p-2 rounded-3" href="#product-review-link" style="color: #001f37; font-size: 13px; margin-top: -20px; position: absolute; background-color: #f5f5f5;" id="review-link"><?php echo $total ?> Ratings</a>
                                                        <?php
                                                        }
                                                        ?>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>

                                                    <a class="ratings-text p-2 rounded-3" href="#product-review-link" style="color: #001f37; font-size: 13px; margin-top: -20px; position: absolute; background-color: #f5f5f5;" id="review-link">0 Ratings</a>

                                                <?php
                                                }


                                                ?>

                                            </div>
                                        </div>

                                        <!-- ====================================================================================================================================================================== -->

                                        <!-- ====================================================================================================================================================================== -->

                                        <div class="col-12 d-grid col-md-8 col-lg-9" style="gap: 10px; padding-left: 50px;">

                                            <div class="d-flex align-items-center" style="gap: 3px;">
                                                <?php
                                                $review = Database::search("SELECT `rating-1` FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                        <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                    </div>
                                                    <span style="margin-top: -3px; margin-left: 5px;">0</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <?php
                                                    $rate_5 = $review->fetch_assoc();
                                                    ?>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <?php
                                                    if ($rate_5["rating-1"] <= 0) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 100) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 10%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 200) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 20%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 300) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 30%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 400) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 40%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 500) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 50%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 600) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 60%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 700) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 70%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 800) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 80%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] <= 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 90%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_5["rating-1"] > 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 96%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-top: -5px; font-weight: 600; margin-left: 5px;"><?php echo $rate_5["rating-1"]; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="d-flex align-items-center" style="gap: 3px;">
                                                <?php
                                                $review = Database::search("SELECT `rating-2` FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                        <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                    </div>
                                                    <span style="margin-top: -3px; margin-left: 5px;">0</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <?php
                                                    $rate_4 = $review->fetch_assoc();
                                                    ?>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <?php
                                                    if ($rate_4["rating-2"] <= 0) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 100) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 10%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 200) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 20%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 300) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 30%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 400) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 40%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 500) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 50%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 600) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 60%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 700) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 70%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 800) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 80%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] <= 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 90%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_4["rating-2"] > 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 96%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-top: -5px;  font-weight: 600; margin-left: 5px;"><?php echo $rate_4["rating-2"]; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="d-flex align-items-center" style="gap: 3px;">
                                                <?php
                                                $review = Database::search("SELECT `rating-3` FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                        <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                    </div>
                                                    <span style="margin-top: -3px; margin-left: 5px;">0</span>
                                                <?php
                                                } else {
                                                    $rate_3 = $review->fetch_assoc();
                                                ?>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <?php
                                                    if ($rate_3["rating-3"] <= 0) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 100) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 10%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 200) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 20%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 300) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 30%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 400) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 40%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 500) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 50%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 600) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 60%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 700) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 70%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 800) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 80%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] <= 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 90%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_3["rating-3"] > 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 96%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-top: -5px; font-weight: 600; margin-left: 5px;"><?php echo $rate_3["rating-3"]; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="d-flex align-items-center" style="gap: 3px;">
                                                <?php
                                                $review = Database::search("SELECT `rating-4` FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                        <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                    </div>
                                                    <span style="margin-top: -3px; margin-left: 5px;">0</span>
                                                <?php
                                                } else {
                                                    $rate_2 = $review->fetch_assoc();
                                                ?>
                                                    <span class="fa fa-star  checked texttext"></span>
                                                    <span class="fa fa-star  checked texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <?php
                                                    if ($rate_2["rating-4"] <= 0) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 100) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 10%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 200) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 20%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 300) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 30%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 400) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 40%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 500) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 50%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 600) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 60%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 700) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 70%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 800) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 80%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] <= 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 90%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_2["rating-4"] > 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 96%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-top: -5px; font-weight: 600; margin-left: 5px;"><?php echo $rate_2["rating-4"]; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="d-flex align-items-center" style="gap: 3px;">
                                                <?php
                                                $review = Database::search("SELECT `rating-5` FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                $rate_num = $review->num_rows;

                                                if ($rate_num == 0) {
                                                ?>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                        <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                    </div>
                                                    <span style="margin-top: -3px; margin-left: 5px;">0</span>
                                                <?php
                                                } else {
                                                    $rate_1 = $review->fetch_assoc();
                                                ?>
                                                    <span class="fa fa-star checked texttext"></span>
                                                    <span class="fa fa-star starsAlls  texttext"></span>
                                                    <span class="fa fa-star starsAlls  texttext"></span>
                                                    <span class="fa fa-star starsAlls  texttext"></span>
                                                    <span class="fa fa-star starsAlls texttext"></span>
                                                    <?php
                                                    if ($rate_1["rating-5"] <= 0) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 3%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 100) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 10%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 200) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 20%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 300) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 30%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>


                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 400) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 40%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 500) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 50%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 600) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 60%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 700) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 70%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 800) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 80%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] <= 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 90%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>

                                                    <?php
                                                    } else if ($rate_1["rating-5"] > 900) {
                                                    ?>
                                                        <div style=" width: 200px; margin-left: 30px; height: 6px; background-color: #f1f1f1; text-align: center; color: white; border-radius: 50px;">
                                                            <div style="width: 96%; height: 6px; background-color: #a938ff; border-radius: 50px;"></div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span style="margin-top: -5px; font-weight: 600; margin-left: 5px;"><?php echo $rate_1["rating-5"]; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div><!-- End .product-details-top -->
                        </div>

                        <div class="d-block d-md-none p-0 mt-5">
                            <div class="col-12 d-flex align-items-center justify-content-center p-0">
                                <div style="background-color: #ffffff; border-radius: 8px;" class="col-12 d-grid p-0 pb-4">
                                    <div class="col-12 d-flex align-items-center justify-content-start mb-4" style="border-radius: 8px 8px 0 0; background-color: #f5f5f5; font-size: 15px; font-weight: 600; height: 40px;">Ratings & Reviews</div>
                                    <div class="col-12 d-flex align-items-center justify-content-start">
                                        <div class="col-6 d-grid p-0">
                                            <div class="col-12 d-flex col-md-4 col-lg-3 p-0">
                                                <div class="col-12 d-flex p-0">
                                                    <?php
                                                    $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");

                                                    $rate_num = $review->num_rows;

                                                    if ($rate_num == 0) {
                                                    ?>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                        <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
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
                                                            <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                        <?php
                                                        } else if ($rate <= 40) {
                                                        ?>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                        <?php
                                                        } else if ($rate <= 60) {
                                                        ?>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                        <?php
                                                        } else if ($rate <= 80) {
                                                        ?>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star starsAlls" style="font-size: 20px;"></span>

                                                        <?php
                                                        } else if ($rate <= 100) {
                                                        ?>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>
                                                            <span class="fa fa-star checked " style="font-size: 20px;"></span>

                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </div><!-- End .rating-container -->

                                            </div>
                                            <div class="col-12 p-0"><?php
                                                                    $ratings = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");
                                                                    $num = $ratings->num_rows;
                                                                    if ($num != 0) {
                                                                        $rating_data = $ratings->fetch_assoc();
                                                                        for ($i = 0; $i < $num; $i++) {
                                                                            $rate1 = $rate_data["rating-1"];
                                                                            $rate2 = $rate_data["rating-2"];
                                                                            $rate3 = $rate_data["rating-3"];
                                                                            $rate4 = $rate_data["rating-4"];
                                                                            $rate5 = $rate_data["rating-5"];
                                                                            $total = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
                                                                    ?>


                                                        <?php
                                                                            if ($rate >= 40 && $rate < 60) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 120px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Good</span></div>

                                                        <?php
                                                                            } else if ($rate >= 60 && $rate < 80) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 150px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Very Good</span></div>

                                                        <?php
                                                                            } else if ($rate >= 80 && $rate <= 100) {
                                                        ?>
                                                            <div style="border-radius: 0 8px 0 8px; padding-left: 15px; height: 30px; width: 140px; margin-top: 10px; background-color: #a938ff; 
                                                        font-size: 18px; font-weight: 600; color: white; gap: 10px;" class="d-flex align-items-center justify-content-start"><span class="fa fa-star" style="font-size: 12px; margin-top: -1px;"></span><span style="margin-top: -2px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Excellent</span></div>

                                                        <?php
                                                                            }
                                                        ?>

                                                <?php
                                                                        }
                                                                    }



                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end p-0">
                                            <div class="col-12 p-0 mb-3 d-flex align-items-center justify-content-end">
                                                <?php
                                                $ratings = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $session_data["product_id"] . "'");
                                                $num = $ratings->num_rows;
                                                if ($num != 0) {
                                                    $rating_data = $ratings->fetch_assoc();
                                                    for ($i = 0; $i < $num; $i++) {
                                                        $rate1 = $rate_data["rating-1"];
                                                        $rate2 = $rate_data["rating-2"];
                                                        $rate3 = $rate_data["rating-3"];
                                                        $rate4 = $rate_data["rating-4"];
                                                        $rate5 = $rate_data["rating-5"];
                                                        $total = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
                                                ?>



                                                        <a class="ratings-text p-2 rounded-3" href="#product-review-link" style="color: #001f37; font-size: 13px; margin-top: 10px; position: absolute; background-color: #f5f5f5;" id="review-link"><?php echo $total ?> Ratings</a>


                                                    <?php
                                                    }
                                                } else {
                                                    ?>

                                                    <a class="ratings-text p-2 rounded-3" href="#product-review-link" style="color: #001f37; font-size: 13px; margin-top: -20px; position: absolute; background-color: #f5f5f5;" id="review-link">0 Ratings</a>

                                                <?php
                                                }


                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-block mb-5 mt-5">
                            <div class="col-12 d-flex flex-column align-items-center justify-content-center pt-0 pb-4 ps-0 pe-0 mt-4 " style="background-color: #ffffff; padding: 10px; border-radius: 8px;">
                                <div class="col-12 mb-2 pt-2 pb-4 d-flex align-items-center justify-content-center" style="font-size: 15px; font-weight: 600; background-color: white; border-radius: 8px 8px 0 0; text-align: center; height: 40px; white-space: nowrap; overflow: hidden;">
                                    <div class="col-11 pt-3 rounded-4" style="overflow: hidden; background-color: #f5f5f5; height: 40px;">Product Details Of <?php echo $session_data["title"]; ?></div>
                                </div>

                                <p class="ps-4 pe-4 pt-3 fs-5 text-justify"><?php echo $session_data["description"]; ?></p>

                            </div><!-- End .product-details-top -->
                        </div>




                        <div class="d-none d-lg-block">
                            <div class="d-grid align-items-center justify-content-center bg-white pt-3 " style="border-radius: 10px; width: 100%; border: 2px solid #dee2e6;">
                                <div class="col-12 mb-4 pt-2 pb-4 d-flex align-items-center justify-content-center" style="font-size: 18px; font-weight: 500; background-color: white; border-radius: 8px 8px 0 0; text-align: center; height: 40px; white-space: nowrap; overflow: hidden;">
                                    <div class="col-11 pt-3 pb-3 rounded-4" style="overflow: hidden; background-color: #f5f5f5; height: 40px; font-family: 'Madimi One', sans-serif;">You May Also Like</div>
                                </div>
                                <div style="width: 100%;" class="d-flex align-items-center justify-content-center">
                                    <div style="width: 98%;  gap: 1.7vw;" class="d-flex align-items-center justify-content-center">
                                        <?php
                                        $query1 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN category ON product.category_cat_id = category.cat_id WHERE `category_cat_id` = 1 AND id != '" . $session_data["product_id"] . "' ORDER BY RAND()  LIMIT 6");
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
                                                        <div class="mt-2 ms-2 mb-3 titleDiv" style="height: 30px;">
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
                                        } else {
                                            $query2 = Database::search("SELECT * FROM product JOIN product_img ON id = product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path WHERE id != '" . $session_data["product_id"] . "' ORDER BY RAND()  LIMIT 6");
                                            $num2 = $query2->num_rows;
                                            if ($num2 > 0) {
                                                for ($i = 0; $i < $num2; $i++) {
                                                    $data2 = $query2->fetch_assoc();
                                                ?>
                                                    <div onclick="getIndex(<?php echo $data1['product_id']; ?>);" style="cursor: pointer; width: 15%; text-decoration: none; border-radius: 8px; background-color: #f5f5f5;" class="polaroid p-0 mb-4">
                                                        <div style="width: 100%;" class="p-0 mb-2">
                                                            <div style="width: 100%;" class="p-0 m-0 ">
                                                                <img src="<?php echo $data1["img_path"]; ?>" style="width: 100%; height: 13vw; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                                            </div>
                                                            <div class="mt-2 ms-2 mb-3 titleDiv" style="height: 30px;">
                                                                <p class="titleText1" style="font-size: 13px; font-weight: 500; line-height: 15px;"><?php echo $data1["title"]; ?></p>
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
                                                                <p class="priceText1" style="font-size: 14px; font-weight: 600;"><?php echo $formattedPrice; ?></p>
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
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-md-block d-lg-none">
                            <div class="d-grid align-items-center justify-content-center bg-white pt-3" style="border-radius: 10px; width: 100%; border: 2px solid #dee2e6;">
                                <div class="col-12 mb-4 pt-2 pb-4 d-flex align-items-center justify-content-center" style="font-size: 16px; font-weight: 600; background-color: white; border-radius: 8px 8px 0 0; text-align: center; height: 40px; white-space: nowrap; overflow: hidden;">
                                    <div class="col-11 pt-3 pb-3 rounded-4" style="overflow: hidden; background-color: #f5f5f5; height: 40px; font-family: 'Slackside One', cursive;">You May Also Like</div>
                                </div>
                                <div style="width: 100%;" class="d-flex align-items-center justify-content-center">
                                    <div style="width: 98%; gap: 18px;" class="d-flex align-items-center justify-content-center">
                                        <?php
                                        $query2 = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path JOIN category ON product.category_cat_id = category.cat_id WHERE `category_cat_id` = 1 AND id != '" . $session_data["product_id"] . "' ORDER BY RAND()  LIMIT 4");
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
                                                        <div class="mt-2 mb-3 ms-2 titleDiv">
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
                                                            <span style="color: #6c757d; text-decoration: line-through; font-size: 10px;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600; font-size: 10px;" class="disText1">-</span><span style="color: #191919; font-size: 10px;" class="disText1"><?php echo $data2["discount"]; ?></span><span style="color: #191919; font-size: 10px;" class="disText1">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php

                                            }
                                        } else {
                                            $query2 = Database::search("SELECT * FROM product JOIN product_img ON id = product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path WHERE id != '" . $session_data["product_id"] . "' ORDER BY RAND()  LIMIT 4");
                                            $num2 = $query2->num_rows;
                                            if ($num2 > 0) {
                                                for ($i = 0; $i < $num2; $i++) {
                                                    $data2 = $query2->fetch_assoc();
                                                ?>
                                                    <div onclick="getIndex(<?php echo $data1['product_id']; ?>);" style="cursor: pointer; width: 15%; text-decoration: none; border-radius: 8px; background-color: #f5f5f5;" class="polaroid p-0 mb-4">
                                                        <div style="width: 100%;" class="p-0 mb-2">
                                                            <div style="width: 100%;" class="p-0 m-0 ">
                                                                <img src="<?php echo $data1["img_path"]; ?>" style="width: 100%; height: 13vw; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                                            </div>
                                                            <div class="mt-2 ms-2 mb-3 titleDiv" style="height: 30px;">
                                                                <p class="titleText1" style="font-size: 13px; font-weight: 500; line-height: 15px;"><?php echo $data1["title"]; ?></p>
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
                                                                <p class="priceText1" style="font-size: 14px; font-weight: 600;"><?php echo $formattedPrice; ?></p>
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
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .container -->
                </div><!-- End .page-content -->
            </main><!-- End .main -->

            <?php
            include "./footer.php";
            ?>
        </div><!-- End .page-wrapper -->


        <!-- </div>End .sticky-bar -->




    <?php
    } else {
        header("Location: index.php");
    }
    ?>

    <!-- Plugins JS File -->
    <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script> -->
    <!-- Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script src="./singleProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->

</html>