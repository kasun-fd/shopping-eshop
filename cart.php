<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Cart</title>
    <link rel="stylesheet" href="./cart.css">

    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/fonts/HelvNeue55_W1G.woff2" rel="preload" as="font" type="font/woff2" integrity="sha384-R6e0PFLMMV6HBvkQK22ecNfjOzyh89wSndiTC71MuvoaOnhIYgOAGVC0gW0kVN16" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/fonts/HelvNeue75_W1G.woff2" rel="preload" as="font" type="font/woff2" integrity="sha384-ylOkwNNvSwXpWNbpEhI45ruJTXyfQbIb42IxMvSGGcndZBpZ9iAmOFSUl4/Goeqz" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/css/orange-helvetica.min.css" rel="stylesheet" integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/css/boosted.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/js/boosted.bundle.min.js"></script>
    <link rel="stylesheet" href="./MobileHeader.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    if (isset($_COOKIE["name"])) {
        $email = $_COOKIE["email"];
        // $product_id = $_SESSION["x"];
        include "./cartHeader.php";

    ?>
        <div class="d-block d-md-none">
            <div class="HeaderMobileMain">
                <div class="HeaderMobileSub01">
                    <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                    <span class="HeaderMobileMainText">Cart</span>
                </div>
                <div class="HeaderMobileSub02">

                </div>

            </div>
        </div>

        <?php


        $query = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                        WHERE `user_cart_email` = '" . $email . "'");

        $num = $query->num_rows;

        if ($num > 0) {
        ?>
            <div class="col-12 d-flex justify-content-center pt-3">
                <div class="col-md-11 ps-1 pe-1 ps-md-0 pe-md-0 d-md-flex align-items-start justify-content-between p-0 gap-4">
                    <div class="col-12 col-md-8 p-0 pb-3">
                        <div class="col-12 bg-white d-flex rounded-3 p-0 mb-2" style="height: 40px;">
                            <div class="col-6 d-flex align-items-center justify-content-start" style="border-radius: 8px 0 0 8px; font-size: 12px; color: #777777;">DELETE ALL&nbsp;&nbsp;[<?php echo $num; ?> Items]</div>
                            <div class="col-6 d-flex align-items-center justify-content-end" style="border-radius: 0 8px 8px 0; color: #777777;"><i onclick="deleteAllCart();" style="cursor: pointer;" class="fa-regular fa-trash-can fs-2"></i>&nbsp;&nbsp;<span onclick="deleteAllCart();" style="font-weight: 600; font-size: 12px; cursor: pointer; ">DELETE</span></div>
                        </div>
                        <div class="overBox">
                            <?php


                            $query = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                        WHERE `user_cart_email` = '" . $email . "'");

                            $num = $query->num_rows;

                            if ($num > 0) {
                                for ($i = 0; $i < $num; $i++) {
                                    $data = $query->fetch_assoc();

                                    $getOption = Database::search("SELECT * FROM eshop.color WHERE `clr_id` = '" . $data["option_qty"] . "'");

                                    $data1 = $getOption->fetch_assoc();

                            ?>
                                    <div class="col-12 p-0">
                                        <div class="col-12 bg-white mt-3 p-0 pt-2 rounded-3">
                                            <div class="col-12 d-flex border-bottom p-0 mb-2" style="height: 40px;">
                                                <div class="col-8 d-flex align-items-center">
                                                    <span style="font-size: 12px; font-weight: bold;">ORDER ID</span>&nbsp;&nbsp;<span style="font-size: 13px; color: #4286f4;"><?php echo $data["generated_id"]; ?></span>
                                                </div>
                                                <div class="col-4 d-flex align-items-center justify-content-center mb-2" style="justify-content: end;">
                                                    <div class="input-group quantity-selector d-flex justify-content-end">
                                                        <?php
                                                        if ($data["qty_cart"] == null) {
                                                        ?>Qty:&nbsp;1<?php
                                                                    } else {
                                                                        ?>Qty:&nbsp;<?php echo $data["qty_cart"];
                                                                                }
                                                                                    ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 bg-white d-flex p-0" style="height: 120px; border-radius: 0 0 8px 8px;">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img onclick="goToSimglePage(<?php echo $data['product_id']; ?>)" src="<?php echo $data["img_path"]; ?>" class="ms-3 me-3" style="cursor:pointer; border-radius: 8px; height: 100px; width: 100px;" alt="">
                                                </div>
                                                <div class="flex-grow-1 d-flex">
                                                    <div class="col-12 d-grid p-0 pt-4 pb-3">
                                                        <div onclick="goToSimglePage(<?php echo $data['product_id']; ?>);" class="col-12 d-flex align-items-start justify-content-start ps-0 text-dark context-cart" style="cursor: pointer; line-height: 13px; font-size: 12px; height: 26px; padding-right: 50px; overflow: hidden;">
                                                            <?php echo $data["title"]; ?>
                                                        </div>
                                                        <div class="col-12 d-flex p-0" style="height: 60px;">
                                                            <div class="col-6 d-flex flex-column align-items-start justify-content-end p-0 pt-1">
                                                                <?php
                                                                if ($data["option_qty"] != 0) {
                                                                ?>
                                                                    <div style="color: #777777; overflow: hidden; width: auto; height: 15px;">Option:  <?php echo $data1["clr_name"]; ?></div>
                                                                <?php
                                                                }
                                                                ?>

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
                                                                <p style="font-size: 13px; color: #a938ff;"><?php echo $formattedPrice; ?></p>
                                                                <?php
                                                                $price = $data["price"];
                                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                                                if ($discount > 0) {
                                                                ?>
                                                                    <p style="font-size: 8px; color: #777777; margin-top: -10px;"><span style="text-decoration: line-through;"><?php echo $formattedPrice1 ?>&nbsp;</span>&nbsp;&nbsp;<span style="text-decoration: none; font-size: 9px;">-<?php echo $data["discount"]; ?>%</span></p>
                                                                <?php
                                                                } else {
                                                                }
                                                                ?>

                                                            </div>
                                                            <div class="col-6 d-flex align-items-center justify-content-end">
                                                                <?php
                                                                $wish_query = Database::search("SELECT * FROM watchlist WHERE `user_watch_email` = '" . $email . "' AND `product_id` = '" . $data["product_id"] . "' ");
                                                                $num_watch = $wish_query->num_rows;

                                                                if ($num_watch == 1) {
                                                                ?>
                                                                    <a href="#" onclick="deleteFromCartWishlist(<?php echo $data['product_id']; ?>);"><i class="fa-regular fa-heart fs-2 me-5" style="color: #a938ff;"></i></a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="#" onclick="wishlistCart(<?php echo $data['product_id']; ?>);"><i class="fa-regular fa-heart fs-2 me-5" style="color: #777777;"></i></a>
                                                                <?php
                                                                }
                                                                ?>

                                                                <a href="#" onclick="removeCart(<?php echo $data['product_id']; ?>);"><i class="fa-regular fa-trash-can fs-2 text-secondary"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-6 bg-warning">s</div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 bg-white p-0 pb-4 mb-5" style="border-radius: 8px;">
                        <div class="col-12 d-flex align-items-center pt-4 pb-4 mb-3 mainCarttext" style="background-color: #ede4ff; border-radius: 8px 8px 0 0; height: 40px; font-weight: 500;">Order Summary</div>
                        <div class="col-12 d-flex align-items-center p-0 pt-3">
                            <div class="col-7 d-flex align-items-center justify-content-start subCart">Subtotal (<?php echo $num; ?>&nbsp;items)</div>
                            <?php
                            $total = 0;
                            $query1 = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                        WHERE `user_cart_email` = '" . $email . "'");

                            $num1 = $query1->num_rows;
                            for ($i = 0; $i < $num1; $i++) {
                                $data1 = $query1->fetch_assoc();
                                $less = ($data1["price"] * $data1["discount"]) / 100;
                                $process = $data1["price"] - $less;
                                if ($process < 0) {
                                    $process = 0;
                                }
                                $one = 1;
                                if ($data1["qty_cart"] == null) {
                                    $one = 1;
                                } else {
                                    $one = $data1["qty_cart"];
                                }
                                $total += $process * $one;
                                $_SESSION["t"] = $total;
                            }
                            ?>
                            <div class="col-5 d-flex align-items-center justify-content-end priceCart">LKR&nbsp;<?php echo number_format($total, 2, '.', ','); ?></div>
                            <?php
                            ?>


                        </div>
                        <div class="col-12 d-flex align-items-center p-0 mt-2">
                            <div class="col-6 d-flex align-items-center justify-content-start shoppingCart">Shipping Fee</div>
                            <?php
                            $colombo = Database::search("SELECT * FROM eshop.delivery_cost WHERE `id` = 1");
                            $out_of_colombo = Database::search("SELECT * FROM eshop.delivery_cost WHERE `id` = 2");
                            $colombo_cost = $colombo->fetch_assoc();
                            $out_colombo_cost = $out_of_colombo->fetch_assoc();
                            $delivery_cost = Database::search("SELECT CONCAT(`line1`, ' ', `line2`) AS merge_text FROM eshop.user_has_address WHERE `user_email` = '" . $email . "'");
                            $data = $delivery_cost->fetch_assoc();
                            $address = $data["merge_text"];
                            $cost = 0;
                            function containsColomboIgnoreCase($text) {
                                $lowercaseText = strtolower($text); // Convert all characters to lowercase
                                $colombo = "colombo"; // Word to search for (lowercase for case-insensitive comparison)
                                return strpos($lowercaseText, $colombo) !== false; // Check if "colombo" exists within $lowercaseText
                              }
                            if (containsColomboIgnoreCase($address)) {
                                $cost = $colombo_cost["cost"];
                                $_SESSION["c"] = $cost;
                                $formattedPrice = "LKR " . number_format($colombo_cost["cost"], 2, '.', ',');
                            ?>
                                <div class="col-6 d-flex align-items-center justify-content-end priceShoppingCart"><?php echo $formattedPrice; ?></div>
                            <?php
                            } else {
                                $cost = $out_colombo_cost["cost"];
                                $_SESSION["c"] = $cost;
                                $formattedPrice1 = "LKR " . number_format($out_colombo_cost["cost"], 2, '.', ',');
                            ?>
                                <div class="col-6 d-flex align-items-center justify-content-end priceShoppingCart"><?php echo $formattedPrice1; ?></div>
                            <?php
                            }

                            ?>

                        </div>
                        <div class="col-12 d-flex flex-column align-items-center p-0 mt-5">
                            <div class="col-12 d-flex align-items-center justify-content-center totalCart">Total Payment</div>
                            <?php
                            $full_total = $_SESSION["t"] + $_SESSION["c"];
                            $formattedPrice1 = "LKR " . number_format($full_total, 2, '.', ',');
                            ?>
                            <div class="col-12 d-flex align-items-center justify-content-center totalPricecART" style="color: #a938ff;"><?php echo $formattedPrice1 ?></div>
                        </div>
                        <div class="col-12 d-flex align-items-center p-0 justify-content-center mt-5">
                            <button onclick="checkoutcart();" class="btnCheckout col-11 checkoutCart" style="height: 40px; font-weight: 600;">PROCESS TO CHECKOUT (<?php echo $num; ?>)</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-12 d-flex align-items-center justify-content-center" style="height: 500px;">
                <div class="col-11 d-flex flex-column align-items-center justify-content-center">
                    <span style="font-size: 20px; font-weight: 600;">Empty Cart</span>
                    <button onclick="continueShopping();" class="ps-3 pe-3 pt-3 pb-3 mt-2 text-white" style="background-color: #a938ff; font-weight: 600; font-size: 14px; border-radius: 8px;">CONTINUE SHOPPING</button>
                </div>
            </div>
        <?php
        }

        ?>





    <?php

    } else {
        setcookie("cartPage", true, time() + (60 * 60 * 24));
        header("Location: login.php");
    }
    ?>

    <script src="./cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
</body>