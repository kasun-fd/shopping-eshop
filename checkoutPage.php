<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Checkout</title>
    <link rel="stylesheet" href="./checkoutPage.css">

    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/fonts/HelvNeue55_W1G.woff2" rel="preload" as="font" type="font/woff2" integrity="sha384-R6e0PFLMMV6HBvkQK22ecNfjOzyh89wSndiTC71MuvoaOnhIYgOAGVC0gW0kVN16" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/fonts/HelvNeue75_W1G.woff2" rel="preload" as="font" type="font/woff2" integrity="sha384-ylOkwNNvSwXpWNbpEhI45ruJTXyfQbIb42IxMvSGGcndZBpZ9iAmOFSUl4/Goeqz" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/css/orange-helvetica.min.css" rel="stylesheet" integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/css/boosted.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.2.3/dist/js/boosted.bundle.min.js"></script>
    <link rel="stylesheet" href="./MobileHeader.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    if (isset($_COOKIE["name"])) {
        if (isset($_COOKIE["checkoutCart"])) {
            $email = $_COOKIE["email"];
            // $product_id = $_SESSION["x"];
            include "./cartHeader.php";
            include "./generate_id.php";
            $id_gen = generateID();

    ?>
            <div class="d-block d-md-none">
                <div class="HeaderMobileMain">
                    <div class="HeaderMobileSub01">
                        <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                        <span class="HeaderMobileMainText">Checkout</span>
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
                    <div class="col-md-11 pe-1 ps-md-0 pe-md-0 d-md-flex align-items-start justify-content-between p-0 gap-4">
                        <div class="col-12 col-md-8 p-0 pb-3">

                            <?php
                            $query = Database::search("SELECT * FROM user JOIN user_has_address ON email=user_email WHERE `email` = '" . $email . "'");
                            $data = $query->fetch_assoc();
                            ?>

                            <div class="bg-white col-12 mb-2 rounded-3 shadow-sm mb-4">
                                <div class="col-12 ps-1 pt-4" style="font-size: 12px;">Deliver to <span style="font-size: 13px; font-weight: 600;"><?php echo $data["fname"] ?>&nbsp;<?php echo $data["lname"] ?></span>&nbsp;&nbsp;&nbsp;<span style="font-size: 13px; color: #a938ff;"><?php echo $data["mobile"]; ?></span></div>
                                <div class="col-12 pt-3 border pb-3 mt-3 mb-3 ps-2 pe-2 rounded-3" style="font-size: 12px;"><?php echo $data["line1"]; ?>&nbsp;<?php echo $data["line2"]; ?>&nbsp;&nbsp;<span>|&nbsp;&nbsp;</span><span style="font-size: 13px; font-weight: 500;">Postal code&nbsp;</span><span style="font-size: 13px; font-weight: 500;">(<?php echo $data["postal_code"]; ?></span>)</div>
                                <div class="col-12 ps-1 pt-1 pe-0 pb-3 d-flex justify-content-between" style="font-size: 12px;">
                                    <span>Email to <span style="font-size: 13px; font-weight: 600;"><?php echo $data["email"]; ?></span></span>
                                    <a href="#" onclick="document.getElementById('id01').style.display='block'" class="text-decoration-none" style="color: #a938ff;">Edit</a>
                                </div>
                            </div>

                            <!-- ======= model ========== -->
                            <div class="w3-container">

                                <div id="id01" style="z-index: 999999;" class="w3-modal">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom rounded-3" style="max-width:600px">

                                        <div class="w3-center"><br>
                                            <div class="col-12 d-flex align-items-center justify-content-center" style="font-size: 18px; font-weight: 600; font-family: Arial, Helvetica, sans-serif;">
                                                <span class="pt-2 pb-2 ps-4 pe-4 rounded-3" style="background-color: #ede4ff;">Update Address Information</span>
                                            </div>
                                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                                        </div>

                                        <div class="w3-container mt-4">
                                            <div class="w3-section">
                                                <label style="font-size: 13px; font-weight: 500;"><b>Mobile</b></label>
                                                <input class="w3-input w3-border w3-margin-bottom rounded-3" type="text" placeholder="Ex: 0767298181" id="mobile" style="height: 40px; font-size: 13px;" value="<?php echo $data["mobile"]; ?>" required>
                                                <div class="border-top col-12"></div>
                                                <label class="mt-4" style="font-size: 13px; font-weight: 500;"><b>Address Line 1</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Line 1" id="line1" style="height: 40px;  font-size: 13px;" value="<?php echo $data["line1"]; ?>" required>
                                                <label class="mt-3" style="font-size: 13px; font-weight: 500;"><b>Address Line 2</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Line 2" id="line2" style="height: 40px;  font-size: 13px;" value="<?php echo $data["line2"]; ?>" required>
                                                <div class="border-top col-12 mt-4"></div>
                                                <label class="mt-3" style="font-size: 13px; font-weight: 500;"><b>Postal Code</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Postal Code" id="pcode" style="height: 40px;  font-size: 13px;" value="<?php echo $data["postal_code"]; ?>" required>
                                                <button class="col-12 w3-padding rounded-3 btnUpdate mt-5" style="height: 40px; font-size: 14px; font-weight: 600; color: white;" onclick="confirmbtn();">Confirm</button>
                                            </div>
                                        </div>

                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey d-flex justify-content-end rounded-bottom-3">
                                            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red rounded-3" style="font-size: 14px; font-weight: 600;">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- ======= model ========== -->

                            <div class="overBox">
                                <?php


                                $query = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                        WHERE `user_cart_email` = '" . $email . "'");

                                $num = $query->num_rows;

                                if ($num > 0) {

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $query->fetch_assoc();

                                        $getOption = Database::search("SELECT * FROM eshop.color WHERE `clr_id` = '" . $data["option_qty"] . "'");

                                        $data1 = $getOption->fetch_assoc();;
                                ?>
                                        <div class="col-12 p-0 pb-4">
                                            <div class="col-12 bg-white mt-1 p-0 pt-2 rounded-3">
                                                <div class="col-12 d-flex border-bottom p-0 mb-2" style="height: 40px;">
                                                    <div class="col-8 d-flex align-items-center">
                                                        <span style="font-size: 12px; font-weight: bold;">#ID</span>&nbsp;&nbsp;<span style="font-size: 13px; color: #4286f4;"><?php echo $id_gen; ?></span>
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
                                                            <div onclick="goToSimglePage(<?php echo $data['product_id']; ?>);" class="col-12 d-flex align-items-start justify-content-start ps-0 text-dark context-cart" style="margin-bottom: 15px; cursor: pointer; line-height: 13px; font-size: 12px; height: 26px; padding-right: 50px; overflow: hidden;">
                                                                <?php echo $data["title"]; ?>
                                                            </div>
                                                            <div class="col-12 d-flex p-0" style="height: 60px;">
                                                                <div class="col-6 d-flex flex-column align-items-start justify-content-end p-0 pt-1">
                                                                    <?php

                                                                    if ($data["option_qty"] != 0) {
                                                                    ?>
                                                                        <span style="color: #777777;">Option: <?php echo $data1["clr_name"]; ?></span>
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
                                                                        <p style="font-size: 10px; color: #777777; margin-top: -10px;"><span style="text-decoration: line-through;"><?php echo $formattedPrice1 ?>&nbsp;</span>&nbsp;&nbsp;<span style="text-decoration: none; font-size: 9px;">-<?php echo $data["discount"]; ?>%</span></p>
                                                                    <?php
                                                                    } else {
                                                                    }
                                                                    ?>

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
                                function containsColomboIgnoreCase($text)
                                {
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
                                <button class="btnCheckout col-11 checkoutCart" style="height: 40px; font-weight: 600;" onclick="placeOrder();">PLACE ORDER</button>
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
        }

        // =====================================

        if (isset($_COOKIE["qtySingle"])) {
            $email = $_COOKIE["email"];
            // $product_id = $_SESSION["x"];
            include "./cartHeader.php";
            $qty = $_COOKIE["qtySingle"];
            $id = $_COOKIE["pro_id"];
            include "./generate_id.php";
            $id_gen = generateID();

        ?>
            <div class="d-block d-md-none">
                <div class="HeaderMobileMain">
                    <div class="HeaderMobileSub01">
                        <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                        <span class="HeaderMobileMainText">Checkout</span>
                    </div>
                    <div class="HeaderMobileSub02">

                    </div>

                </div>
            </div>

            <?php


            $query_single = Database::search("SELECT * FROM product JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                        WHERE `id` = '" . $id . "'");

            $num_single = $query_single->num_rows;

            if ($num > 0) {
            ?>
                <div class="col-12 d-flex justify-content-center pt-3">
                    <div class="col-md-11 pe-1 ps-md-0 pe-md-0 d-md-flex align-items-start justify-content-between p-0 gap-4">

                        <?php
                        $query = Database::search("SELECT * FROM user JOIN user_has_address ON email=user_email WHERE `email` = '" . $email . "'");
                        $data = $query->fetch_assoc();
                        ?>

                        <div class="col-12 col-md-8 p-0 pb-3">
                            <div class="bg-white col-12 mb-2 rounded-3 shadow-sm mb-4">
                                <div class="col-12 ps-1 pt-4" style="font-size: 12px;">Deliver to <span style="font-size: 13px; font-weight: 600;"><?php echo $data["fname"] ?>&nbsp;<?php echo $data["lname"] ?></span>&nbsp;&nbsp;&nbsp;<span style="font-size: 13px; color: #a938ff;"><?php echo $data["mobile"]; ?></span></div>
                                <div class="col-12 pt-3 border pb-3 mt-3 mb-3 ps-2 pe-2 rounded-3" style="font-size: 12px;"><?php echo $data["line1"]; ?>&nbsp;<?php echo $data["line2"]; ?>&nbsp;&nbsp;<span>|&nbsp;&nbsp;</span><span style="font-size: 13px; font-weight: 500;">Postal code&nbsp;</span><span style="font-size: 13px; font-weight: 500;">(<?php echo $data["postal_code"]; ?></span>)</div>
                                <div class="col-12 ps-1 pt-1 pe-0 pb-3 d-flex justify-content-between" style="font-size: 12px;">
                                    <span>Email to <span style="font-size: 13px; font-weight: 600;"><?php echo $data["email"]; ?></span></span>
                                    <a href="#" onclick="document.getElementById('id01').style.display='block'" class="text-decoration-none" style="color: #a938ff;">Edit</a>
                                </div>
                            </div>

                            <!-- ======= model ========== -->
                            <div class="w3-container">


                                <div id="id01" style="z-index: 999999;" class="w3-modal">

                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom rounded-3" style="max-width:600px">

                                        <div class="w3-center"><br>
                                            <div class="col-12 d-flex align-items-center justify-content-center" style="font-size: 18px; font-weight: 600; font-family: Arial, Helvetica, sans-serif;">
                                                <span class="pt-2 pb-2 ps-4 pe-4 rounded-3" style="background-color: #ede4ff;">Update Address Information</span>
                                            </div>
                                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                                        </div>

                                        <div class="w3-container mt-4">
                                            <div class="w3-section">
                                                <label style="font-size: 13px; font-weight: 500;"><b>Mobile</b></label>
                                                <input class="w3-input w3-border w3-margin-bottom rounded-3" type="text" placeholder="Ex: 0767298181" id="mobile" style="height: 40px; font-size: 13px;" value="<?php echo $data["mobile"]; ?>" required>
                                                <div class="border-top col-12"></div>
                                                <label class="mt-4" style="font-size: 13px; font-weight: 500;"><b>Address Line 1</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Line 1" id="line1" style="height: 40px;  font-size: 13px;" value="<?php echo $data["line1"]; ?>" required>
                                                <label class="mt-3" style="font-size: 13px; font-weight: 500;"><b>Address Line 2</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Line 2" id="line2" style="height: 40px;  font-size: 13px;" value="<?php echo $data["line2"]; ?>" required>
                                                <div class="border-top col-12 mt-4"></div>
                                                <label class="mt-3" style="font-size: 13px; font-weight: 500;"><b>Postal Code</b></label>
                                                <input class="w3-input w3-border rounded-3" type="text" placeholder="Enter Postal Code" id="pcode" style="height: 40px;  font-size: 13px;" value="<?php echo $data["postal_code"]; ?>" required>
                                                <button class="col-12 w3-padding rounded-3 btnUpdate mt-5" style="height: 40px; font-size: 14px; font-weight: 600; color: white;" onclick="confirmbtn();">Confirm</button>
                                            </div>
                                        </div>

                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey d-flex justify-content-end rounded-bottom-3">
                                            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red rounded-3" style=" font-size: 14px; font-weight: 600;">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- ======= model ========== -->

                            <div class="overBox">
                                <?php

                                if ($num > 0) {
                                    for ($i = 0; $i < $num_single; $i++) {
                                        $data = $query_single->fetch_assoc();
                                        $getOption1 = Database::search("SELECT * FROM product JOIN seller ON email=user_email WHERE `id` = '" . $id . "'");
                                        $data2 = $getOption1->fetch_assoc();

                                ?>
                                        <div class="col-12 p-0">
                                            <div class="col-12 bg-white mt-1 p-0 pt-2 rounded-3">
                                                <div class="col-12 d-flex border-bottom p-0 mb-2" style="height: 40px;">
                                                    <div class="col-8 d-flex align-items-center">
                                                        <span style="font-size: 12px; font-weight: 600;">#ID</span>&nbsp;&nbsp;<span style="font-size: 13px; color: #4286f4;"><?php echo $id_gen; ?></span>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center justify-content-center mb-2" style="justify-content: end;">
                                                        <div class="input-group quantity-selector d-flex justify-content-end">

                                                            Qty:&nbsp;<?php echo $qty; ?>

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
                                                                    if (isset($_COOKIE["option_checkout"])) {
                                                                        $option_get = Database::search("SELECT * FROM color WHERE `clr_id` = '" . $_COOKIE["option_checkout"] . "'");
                                                                        $data_option = $option_get->fetch_assoc();
                                                                        if ($option_get->num_rows > 0) {
                                                                    ?>
                                                                            <span style="color: #777777;">Option: <?php echo $data_option["clr_name"]; ?></span>
                                                                    <?php
                                                                        }
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
                                                                        <p style="font-size: 10px; color: #777777; margin-top: -10px;"><span style="text-decoration: line-through;"><?php echo $formattedPrice1 ?>&nbsp;</span>&nbsp;&nbsp;<span style="text-decoration: none; font-size: 9px;">-<?php echo $data["discount"]; ?>%</span></p>
                                                                    <?php
                                                                    } else {
                                                                    }
                                                                    ?>

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
                                <div class="col-7 d-flex align-items-center justify-content-start subCart">Subtotal (<?php echo $num_single; ?>&nbsp;items)</div>
                                <?php
                                $total = 0;
                                //         $query1 = Database::search("SELECT * FROM product JOIN cart ON product.id = cart.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                // WHERE `user_cart_email` = '" . $email . "'");

                                $checkout_id = Database::search("SELECT * FROM product WHERE `id` = '" . $id . "'");

                                // $num1 = $query1->num_rows;
                                for ($i = 0; $i < $num_single; $i++) {
                                    $data2 = $checkout_id->fetch_assoc();
                                    $less = ($data2["price"] * $data2["discount"]) / 100;
                                    $process = $data2["price"] - $less;
                                    if ($process < 0) {
                                        $process = 0;
                                    }
                                    $one = 1;
                                    if ($qty == null) {
                                        $one = 1;
                                    } else {
                                        $one = $qty;
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
                                function containsColomboIgnoreCase($text)
                                {
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
                                <button class="btnCheckout col-11 checkoutCart" style="height: 40px; font-weight: 600;" onclick="placeOrder();"  id="payhere-payment">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                header("Location: singleProduct.php");
            }

            ?>





    <?php
        }
    } else {
        setcookie("checkoutPage", true, time() + (60 * 60 * 24));
        header("Location: login.php");
    }
    ?>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="./checkoutpage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
</body>