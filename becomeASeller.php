<!DOCTYPE html>
<html lang="en">
<?php
include "./connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Home-Selling</title>
    <link rel="stylesheet" href="./becomeASeller.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.google.com/icons?selected=Material%20Icons%20Outlined%3Asort">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #f5f5f5;">


    <?php
    session_start();
    if (isset($_COOKIE["emailSeller"])) {
        $email = $_COOKIE["emailSeller"];
    ?>

        <div class="position-fixed d-flex align-items-center justify-content-start ps-2 shadow-md orderBox" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" style="cursor: pointer; border-radius: 10px 0 0 10px; background-color: #A939FF; z-index: 9999999; right: 0; bottom: 200px; height: 50px;">
            <!-- <div class="curcleBox" style="border-radius: 50px; width: 15px; height: 15px;"></div> -->
            <i class="fa-solid fa-clock-rotate-left" style="font-size: 33px; color: white;"></i>
        </div>

        <?php
        $query_shipped = Database::search("SELECT * FROM `order` JOIN product ON `product_id` = `id` WHERE `order_status_id` = 3 AND `user_email` = '" . $email . "' ORDER BY `id_order` DESC");
        $num_shipped = $query_shipped->num_rows;
        $service_query = Database::search("SELECT * FROM courier_service");
        $service_data = $service_query->fetch_assoc();
        if ($num_shipped > 0) {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 400px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Shipped</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">

                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3" style="background-color: #EDE4FF;">
                        <p style="font-size: 13px;">Courier Service Number: <span style="font-weight: 600;"><?php echo $service_data["number"]; ?></span>&nbsp;[&nbsp;<span style="font-size: 14px; font-weight: 600;"><?php echo $service_data["name"]; ?></span>&nbsp;]</p>
                        <p style="font-weight: 600; text-align: center;">You can call to confirm that your orders has been shipped.</p>
                    </div>

                    <?php
                    for ($i = 0; $i < $num_shipped; $i++) {
                        $data_shipped = $query_shipped->fetch_assoc();
                        $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON `img_path` = `product_img_path` WHERE `product_id` = '" . $data_shipped["product_id"] . "'");
                        $data_img = $query_img->fetch_assoc();
                    ?>
                        <div id="box" class="col-12 rounded-3 mb-3 d-flex align-items-center justify-content-start mt-3" style="height: 100px; background-color: #EDE4FF;">
                            <img src="<?php echo $data_img["img_path"]; ?>" class="rounded-3" style="height: 80px; width: 80px;" alt="">
                            <div class="d-flex flex-grow-1 ps-2">
                                <div class="d-flex flex-grow-1 flex-column col-12 p-0" style="gap: 8px;">
                                    <div class="p-0" style="overflow: hidden; height: 25px; width: 100%; font-size: 12px; line-height: 12px;"><?php echo $data_shipped["title"]; ?></div>
                                    <div class="bg-white p-1 rounded-3">
                                        <?php
                                        if ($data_shipped["option_order"] != null) {
                                        ?>
                                            <div class="p-0" style="overflow: hidden; height: 18px; width: 100%; font-size: 11px; font-weight: 600;">Option: <?php echo $data_shipped["option_order"]; ?></div>
                                        <?php
                                        }
                                        ?>

                                        <div class="p-0" style="font-size: 11px; font-weight: 600;">Qty: <?php echo $data_shipped["qty_order"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 500px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Shipped</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3" style="background-color: #EDE4FF;">
                        <p style="font-size: 13px;">Courier Service Number: <span style="font-weight: 600;"><?php echo $service_data["number"]; ?></span>&nbsp;[&nbsp;<span style="font-size: 14px; font-weight: 600;"><?php echo $service_data["name"]; ?></span>&nbsp;]</p>
                        <p style="font-weight: 600;">You can call to confirm that your orders has been shipped.</p>
                    </div>
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3 mt-3" style="background-color: #EDE4FF;">
                        <i class="fa-solid fa-truck-fast fs-1"></i>
                        <div class="fw-bold">Empty Shipped Section</div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- ============================ -->
        <div class="position-fixed d-flex align-items-center justify-content-start shadow-md orderBox ps-2" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop2" aria-controls="staticBackdrop" style="cursor: pointer; border-radius: 10px 0 0 10px; background-color: #A939FF; z-index: 9999999; right: 0; bottom: 120px; height: 50px;">

            <i class="fa-solid fa-truck-fast" style="font-size: 30px; color: white;"></i>
        </div>

        <?php
        $query_shipping = Database::search("SELECT * FROM `order` JOIN product ON `product_id` = `id` WHERE `order_status_id` = 2 AND `user_email` = '" . $email . "' ORDER BY `id_order` DESC");
        $num_to_shipping = $query_shipping->num_rows;
        if ($num_to_shipping > 0) {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 500px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop2" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Shipping</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">

                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3" style="background-color: #EDE4FF;">
                        <p style="font-size: 13px;">Courier Service Number: <span style="font-weight: 600;"><?php echo $service_data["number"]; ?></span>&nbsp;[&nbsp;<span style="font-size: 14px; font-weight: 600;"><?php echo $service_data["name"]; ?></span>&nbsp;]</p>
                        <p style="font-weight: 600; text-align: center;">You can call to confirm the shipment of your order.</p>
                    </div>

                    <?php
                    for ($i = 0; $i < $num_to_shipping; $i++) {
                        $data_from_shipping = $query_shipping->fetch_assoc();
                        $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON `img_path` = `product_img_path` WHERE `product_id` = '" . $data_from_shipping["product_id"] . "'");
                        $data_img = $query_img->fetch_assoc();
                    ?>
                        <div id="box" class="col-12 rounded-3 mb-3 d-flex align-items-center justify-content-start mt-3" style="height: 100px; background-color: #EDE4FF;">
                            <img src="<?php echo $data_img["img_path"]; ?>" class="rounded-3" style="height: 80px; width: 80px;" alt="">
                            <div class="d-flex flex-grow-1 ps-2">
                                <div class="d-flex flex-column col-6 p-0" style="gap: 8px;">
                                    <div class="p-0" style="overflow: hidden; height: 25px; width: 100%; font-size: 12px; line-height: 12px; font-weight: 600;"><?php echo $data_from_shipping["title"]; ?></div>
                                    <div class="bg-white p-1 rounded-3">
                                        <?php
                                        if ($data_from_shipping["option_order"] != null) {
                                        ?>
                                            <div class="p-0" style="overflow: hidden; height: 18px; width: 100%; font-size: 11px; font-weight: 600;">Option: <?php echo $data_from_shipping["option_order"]; ?></div>
                                        <?php
                                        }
                                        ?>

                                        <div class="p-0" style="font-size: 11px; font-weight: 600;">Qty: <?php echo $data_from_shipping["qty_order"]; ?></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 p-3 align-items-center justify-content-end">
                                    <button id="orderButton" onclick="addShippedSection(<?php echo $data_from_shipping['id_order']; ?>);" class="rounded-3 pt-2 pb-2" style="font-weight: 600; background-color: #a938ff; border: none; color: white; font-size: 12px;">Add To Shipped Section</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 500px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop2" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Shipping</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3" style="background-color: #EDE4FF;">
                        <p style="font-size: 13px;">Courier Service Number: <span style="font-weight: 600;"><?php echo $service_data["number"]; ?></span>&nbsp;[&nbsp;<span style="font-size: 14px; font-weight: 600;"><?php echo $service_data["name"]; ?></span>&nbsp;]</p>
                        <p style="font-weight: 600; text-align: center;">You can call to confirm the shipment of your order.</p>
                    </div>
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3 mt-3" style="background-color: #EDE4FF;">
                        <i class="fa-solid fa-truck-fast fs-1"></i>
                        <div class="fw-bold">Empty Shipping Section</div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- ============================ -->
        <div class="position-fixed d-flex align-items-center justify-content-start shadow-md orderBox ps-2" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop3" aria-controls="staticBackdrop" style="cursor: pointer; border-radius: 10px 0 0 10px; background-color: #A939FF; z-index: 9999999; right: 0; bottom: 40px; height: 50px;">
            <span style="font-size: 35px; color: white;" class="material-symbols-outlined">
                orders
            </span>
        </div>

        <!-- ============================== -->

        <?php
        $query_to_order = Database::search("SELECT * FROM `order` JOIN product ON `product_id` = `id` WHERE `order_status_id` = 1 AND `user_email` = '" . $email . "' ORDER BY `id_order` DESC");
        $num_to_order = $query_to_order->num_rows;
        if ($num_to_order > 0) {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 500px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop3" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Orders</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">

                    <?php
                    for ($i = 0; $i < $num_to_order; $i++) {
                        $data_from_order = $query_to_order->fetch_assoc();
                        $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON `img_path` = `product_img_path` WHERE `product_id` = '" . $data_from_order["product_id"] . "'");
                        $data_img = $query_img->fetch_assoc();
                    ?>
                        <div id="box" class="col-12 rounded-3 mb-3 d-flex align-items-center justify-content-start" style="height: 100px; background-color: #EDE4FF;">
                            <img src="<?php echo $data_img["img_path"]; ?>" class="rounded-3" style="height: 80px; width: 80px;" alt="">
                            <div class="d-flex flex-grow-1 ps-2">
                                <div class="d-flex flex-column col-6 p-0" style="gap: 8px;">
                                    <div class="p-0" style="overflow: hidden; height: 25px; width: 100%; font-size: 12px; line-height: 12px; font-weight: 600;"><?php echo $data_from_order["title"]; ?></div>
                                    <div class="bg-white p-1 rounded-3">
                                        <?php
                                        if ($data_from_order["option_order"] != null) {
                                        ?>
                                            <div class="p-0" style="overflow: hidden; height: 18px; width: 100%; font-size: 11px; font-weight: 600;">Option: <?php echo $data_from_order["option_order"]; ?></div>
                                        <?php
                                        }
                                        ?>

                                        <div class="p-0" style="font-size: 11px; font-weight: 600;">Qty: <?php echo $data_from_order["qty_order"]; ?></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 p-3 align-items-center justify-content-end">
                                    <button id="orderButton" onclick="addShippingSection(<?php echo $data_from_order['id_order']; ?>);" class="rounded-3 pt-2 pb-2" style="font-weight: 600; background-color: #a938ff; border: none; color: white; font-size: 12px;">Add To Shipping Section</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="offcanvas offcanvas-end" style="z-index: 999999999; width: 500px;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop3" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Orders</h5>
                    <button onclick="refreshPage();" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 rounded-3" style="background-color: #EDE4FF;">
                        <i class="fa-solid fa-box-open fs-1"></i>
                        <div class="fw-bold">No Orders</div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- ============================ -->

        <div class="col-12 d-none d-md-block mb-2 m-0 p-0 shadow-sm" style="height: 70px; position: sticky; top: 0; z-index: 9999;">
            <div class="col-12 d-flex align-items-center justify-content-center bg-dark h-100 p-0 m-0" style="width: 100%;">

                <div class="h-100 d-flex align-items-center d-flex align-items-center justify-content-start" style="font-size: 30px; font-weight: 600; color: #FFF7F1; width: 20%; padding-left: 10px;">
                    DashBoard
                </div>
                <div class="d-flex align-items-center justify-content-end h-100" style="width: 73%;">

                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <?php


                        if (isset($_COOKIE["sellerName"])) {
                            $data = $_COOKIE["sellerName"]
                        ?>

                            <span id="greetingManage" style="color: #a938ff; font-size: 15px; font-weight: 700;"></span>&nbsp;
                            <span style="color: #FFF7F1; font-size: 13px; font-weight: 700; font-family: Arial, Helvetica, sans-serif; margin-top: 3px;"><?php echo $data; ?></span>

                        <?php
                        } else {
                            header("Location: becomeASellerLoginLogin.php");
                        }
                        ?>
                    </div>

                    <?php
                    if (isset($_COOKIE["sellerName"])) {
                        $data = $_COOKIE["sellerName"];
                        $query = Database::search("SELECT `gender_gender_id` FROM `seller` WHERE `user_name` = '" . $data . "'");
                        $d = $query->fetch_assoc();

                        if ($d["gender_gender_id"] == 1) {
                    ?>
                            <img src="./avatar/avatarBoy.jpg" class="rounded-circle" style="margin-right: 5px; height: 60px; border: 3px solid #a938ff; padding: 2px; margin-left: 5px; object-fit: cover;" loading="lazy" alt="...">
                        <?php

                        } else {
                        ?>
                            <img src="./avatar/avatarGirl.jpg" class="rounded-circle" style="margin-right: 5px; height: 60px; border: 3px solid #a938ff; padding: 2px; margin-left: 5px; object-fit: cover;" loading="lazy" alt="...">
                    <?php
                        }
                    } else {
                        header("Location: becomeASellerLoginLogin.php");
                    }
                    ?>
                    <!-- <a href="./addProduct.php" class="col-2 btn-grad p-0 d-flex align-items-center justify-content-center" style="height: 50px; border-radius: 8px; border: none; font-size: 12px; font-weight: 600;">Add Product</a> -->
                </div>
                <div class="p-0 d-flex align-items-center justify-content-center" style="width: 7%; margin-right: 5px;">
                    <div onclick="logoutSeller();" style="width: 50px; height: 50px;  background-color: #f56177; display: flex; align-items: center; justify-content: center; border-radius: 8px; cursor: pointer;">
                        <i class="fa-solid fa-power-off" style="color: #ffffff; color: white; font-size: 35px;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-section d-none d-md-block">
            <div class="container-fluid">
                <div class="row main-content ml-md-0">
                    <div class="sidebar col-md-3 col-lg-2 p-0" style="margin-right: 50px;">
                        <!-- <h1 class="border-bottom filter-header d-flex d-md-none p-3 mb-0 align-items-center">
                        <span class="mr-2 filter-close-btn">
                            X
                        </span>
                        Filters
                        <span class="ml-auto text-uppercase">Reset Filters</span>
                    </h1> -->
                        <div class="sidebar__inner">
                            <div class="filter-body">
                                <div>
                                    <input type="search" class="mb-3 col-11" style="border: 2px solid #a938ff; border-radius: 8px; height: 40px;" onkeypress="search(event);" id="search" placeholder="Search...">
                                    <i class="fa-solid fa-magnifying-glass col-1" style="font-size: 20px; position: absolute; margin-top: 10px; color: #a938ff;"></i>
                                    <!-- cusine filters end -->
                                    <h2 class="font-xbold body-font border-bottom pb-2 mt-3" style="font-size: 16px; font-weight: bold;">By Price</h2>
                                    <!-- <div class="mb-3 theme-clr xs2-font d-flex justify-content-between">
                                        <span id="slider-range-value1">Rs. 100</span>
                                        <span id="slider-range-value2">Rs. 10,000,000</span>
                                    </div> -->
                                    <div class="mb-3 d-flex align-items-center justify-content-between gap-2 filter-options">
                                        <input type="text" id="min" style="height: 35px; border-radius: 8px; border: 2px solid #d399ff; font-size: 12px;" class="col-5" placeholder="MIN">
                                        <span style="font-size: 13px; font-weight: 600;">TO</span>
                                        <input type="text" id="max" style="height: 35px; border-radius: 8px; border: 2px solid #d399ff; font-size: 12px;" class="col-5" placeholder="MAX">
                                    </div>
                                    <h2 class="border-bottom pb-2 mt-4" style="font-size: 16px; font-weight: bold;">By Time</h2>
                                    <div class="mb-1 filter-options">
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="new" name="date" checked>
                                            <label for="new" style="font-size: 13px;">Newest First</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="old" name="date">
                                            <label for="old" style="font-size: 13px;">Oldest First</label>
                                        </div>
                                    </div>
                                    <h2 class="border-bottom pb-2 mt-4" style="font-size: 16px; font-weight: bold;">By Condition</h2>
                                    <div class="mb-1 filter-options">
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="brandNew" name="condition">
                                            <label for="brandNew" style="font-size: 13px;">Brand New</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="used" name="condition">
                                            <label for="used" style="font-size: 13px;">Used</label>
                                        </div>
                                    </div>


                                    <!--seating option end-->
                                    <h2 class="font-xbold body-font border-bottom pb-2 mt-4" style="font-size: 16px; font-weight: bold;">By Quantity</h2>
                                    <div class="mb-1 filter-options" id="cusine-options">
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="high" name="date">
                                            <label for="high" style="font-size: 13px;">High To Low</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-1 p-0">
                                            <input type="radio" id="low" name="date">
                                            <label for="low" style="font-size: 13px;">Low To High</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3 col-12 filter-options p-0 d-flex" style="gap: 5px;" id="services-options">
                                        <button class="col-6 search-btn" style="height: 40px; border-radius: 8px; font-weight: 600;" onclick="sort1(0);">Save</button>
                                        <button class="col-6 clear-btn" style="height: 40px; border-radius: 8px; font-weight: 600;" onclick="clearSort();">Clear</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="content col-md-8 col-lg-9">
                        <div class="d-flex justify-content-between border-bottom align-items-end mb-3">
                            <h2 style="font-size: 30px;" class="p-0">Products</h2>
                            <div class="d-flex align-items-center justify-content-end" style="gap: 10px; text-decoration: none;">
                                <?php
                                if (isset($_COOKIE["add"])) {
                                ?>

                                    <span style="font-size: 14px; font-weight: 600; color: #b197fc;">Add A Product</span>
                                    <i class="fa-solid fa-arrow-left fa-flip-horizontal arrowMove" style="color: #B197FC; margin-top: 2px;"></i>

                                <?php
                                }
                                ?>
                                <a href="./addProduct.php"><i class="fa-solid fa-square-plus" style="color: #B197FC; font-size: 50px;"></i></a>
                                <!-- <a href="./sellerChat.php"><span class="material-symbols-outlined" style="font-size: 40px; color: #343a40;">
                                        chat
                                    </span>
                                </a> -->
                                <!-- <span class="material-symbols-outlined"  style="font-size: 40px; color: #343a40;">
                                    mark_unread_chat_alt
                                </span> -->

                            </div>

                            <!-- <div class="filters-actions">
                                <div>
                                    <button class="btn filter-btn d-md-none"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M3 18h6v-2H3v2zM3 6v2h18V6H3zm0 7h12v-2H3v2z" />
                                        </svg>
                                        Filter</button>
                                </div>
                                <div class="d-flex align-items-center">

                                     <div class="dropdown position-relative sort-drop">
                                        <button type="button" class="btn btn-transparent dropdown-toggle body-clr p-0 py-1 sm-font fw-400 sort-toggle" data-toggle="dropdown">
                                            <span class="mr-2 d-md-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                    <g>
                                                        <path d="M0,0h24 M24,24H0" fill="none" />
                                                        <path d="M7,6h10l-5.01,6.3L7,6z M4.25,5.61C6.27,8.2,10,13,10,13v6c0,0.55,0.45,1,1,1h2c0.55,0,1-0.45,1-1v-6 c0,0,3.72-4.8,5.74-7.39C20.25,4.95,19.78,4,18.95,4H5.04C4.21,4,3.74,4.95,4.25,5.61z" />
                                                        <path d="M0,0h24v24H0V0z" fill="none" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <span class="d-md-inline-block ml-md-2 font-semibold">Newest First</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0 no-caret">
                                            <a class="dropdown-item selected" href="javascript:void(0)">Newest First</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Lowest First</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Highest First</a>
                                        </div>
                                    </div>

                                </div>
                            </div> -->
                        </div>
                        <div class="row row-grid ">
                            <!-- product -->
                            <div class="col-12 col-lg-12 mt-3 mb-3 bg-white" style="border-radius: 8px;">
                                <?php
                                $check = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                $check_data = $check->num_rows;

                                if ($check_data > 0) {
                                ?>
                                    <div class="row" id="sort">


                                        <div class="col-12 text-center mt-3">
                                            <div class="row justify-content-center" style="gap: 20px; grid-template-columns: repeat(4,1fr);" id="sort">

                                                <?php

                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }



                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                                $product_num = $product_rs->num_rows;

                                                $results_per_page = 10;
                                                $number_of_pages = ceil($product_num / $results_per_page);

                                                $page_results = ($pageno - 1) * $results_per_page;
                                                $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                                $selected_num = $selected_rs->num_rows;
                                                for ($x = 0; $x < $selected_num; $x++) {
                                                    $selected_data = $selected_rs->fetch_assoc();
                                                ?>

                                                    <div style="text-decoration: none; background-color: #e6e6e6; width: 100%; border-radius: 8px;" class="col-lg-2 col-md-4 p-0">
                                                        <div style="width: 100%; border-radius: 8px;">
                                                            <div style="width: 100%; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                                                <?php
                                                                $product_img_rs = Database::search("SELECT * FROM product_img JOIN indeximage ON product_img.img_path = indeximage.product_img_path WHERE `product_id` = '" . $selected_data["id"] . "'");
                                                                $product_img_data = $product_img_rs->fetch_assoc();
                                                                ?>
                                                                <img src="<?php echo $product_img_data["img_path"]; ?>" style="width: 100%; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0 imgOpt">
                                                            </div>
                                                            <div class="mt-1 ms-2 titleDiv">
                                                                <p class="titleText"><?php echo $selected_data["title"]; ?></p>
                                                            </div>
                                                            <div class="ms-2 priceDiv">
                                                                <?php

                                                                $price = $selected_data["price"];
                                                                $discount = $selected_data["discount"];
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
                                                            if ($selected_data["discount"] == 0) {
                                                            ?>
                                                                <div class="ms-2 dicDiv">
                                                                    <span style="color: #6c757d; font-weight: 600; font-size: 12px;" class="disText1">No Discount</span>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <?php

                                                                $price = $selected_data["price"];
                                                                $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');
                                                                ?>
                                                                <div class="ms-2 dicDiv">
                                                                    <span style="color: #6c757d; text-decoration: line-through;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600;" class="disText1">-</span><span style="color: #191919; font-weight: 600;" class="disText1"><?php echo $selected_data["discount"] ?></span><span style="color: #191919; font-weight: 600;" class="disText1">%</span>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="">
                                                                <span style="color: #a938ff; font-weight: 600; font-size: 13px;"><?php echo $selected_data["qty"]; ?><span style="font-size: 12px;"> Items left</span></span>
                                                            </div>
                                                            <div class="form-check form-switch mt-2">
                                                                <input class="form-check-input" style="margin-top: 6px; cursor: pointer;" type="checkbox" role="switch" id="toggle<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_status_id"] == 1) { ?> checked <?php } ?> />
                                                                <label class="form-check-label fw-bold activeLabel" style="cursor: pointer; font-size: 11px;" for="toggle<?php echo $selected_data["id"]; ?>">
                                                                    <?php if ($selected_data["status_status_id"] == 1) { ?>
                                                                        Activated
                                                                    <?php } else { ?>
                                                                        Disabled
                                                                    <?php } ?>
                                                                </label>
                                                            </div>
                                                            <div class="mt-2 col-12 mb-3 d-flex align-items-center justify-content-center">
                                                                <button class="btn-update" onclick="sendid(<?php echo $selected_data['id']; ?>);" style="border: none; border-radius: 8px; font-weight: 600; font-size: 14px; width: 100%;">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                                }

                                                ?>





                                            </div>
                                        </div>

                                        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-5">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-lg justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" href="
            <?php if ($pageno <= 1) {
                                        echo ("#");
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    } ?>
            " aria-label="Previous">
                                                            <span aria-hidden="true"><i class="fa-solid fa-angles-left" style="color: #a938ff;"></i></span>
                                                        </a>
                                                    </li>

                                                    <?php
                                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                                        if ($x == $pageno) {
                                                    ?>
                                                            <li class="page-item active">
                                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="page-item">
                                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                            </li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                    <li class="page-item">
                                                        <a class="page-link" href="
            <?php if ($pageno >= $number_of_pages) {
                                        echo ("#");
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    } ?>
            " aria-label="Next">
                                                            <span aria-hidden="true"><i class="fa-solid fa-angles-right" style="color: #a938ff;"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>

                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 100px;">
                                        <span>No Products</span>
                                    </div>
                                <?php
                                }

                                ?>

                            </div>
                            <!-- product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    } else {
        header("Location: becomeASellerLoginLogin.php");
    }
    ?>
    <script src="./becomeASeller.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js"></script>
</body>

</html>