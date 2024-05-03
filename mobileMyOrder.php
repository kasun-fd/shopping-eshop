<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | My Orders</title>
    <link rel="stylesheet" href="./mobileMyOrder.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="padding: 0; background-color: #f2f2f2;">

    <?php
    if ($_COOKIE["name"]) {

    ?>
        <!-- ================================== HEADER start ==================================-->


        <div class="HeaderMobileMain">
            <div class="HeaderMobileSub01">
                <a href="./mobileAccount.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                <span class="HeaderMobileMainText">My Orders</span>
            </div>
            <div class="HeaderMobileSub02">
                <?php
                require "./MobileHeader.php";
                ?>
            </div>

        </div>

        <?php
        $query = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $email . "' ORDER BY `id_order` DESC");
        $num_order = $query->num_rows;
        ?>
        <div class="content">
            <?php
            if ($num_order > 0) {
            ?>
                <div class="bg-white col-12 mt-2 pt-2 pb-2 mb-2" style="border-radius: 8px;">
                    <div class="col-12 d-flex align-items-center justify-content-start" style="height: 50px; background-color: #f2f2f2; border-radius: 8px;">
                        <span style="font-size: 14px; font-weight: 600;">&nbsp;&nbsp;Show&nbsp;:</span>
                        <select class="ms-3 ps-2" style="width: 150px; height: 40px; font-size: 14px; font-weight: 600; border: 2px solid #a938ff; border-radius: 8px;" id="orderDateMObile">
                            <option value="5">Last 05 orders</option>
                            <option value="15">Last 05 days</option>
                            <option value="30">Last 30 days</option>
                            <option value="all">All Orders</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 ps-3 pe-3" style="border-radius: 8px;" id="addContentMobile">
                    <?php
                    for ($i = 0; $i < $num_order; $i++) {
                        $data_order = $query->fetch_assoc();
                        $query_status = Database::search("SELECT * FROM order_status WHERE `id` = '" . $data_order["order_status_id"] . "'");
                        $data_status = $query_status->fetch_assoc();
                        $query_product = Database::search("SELECT * FROM product WHERE `id` = '" . $data_order["product_id"] . "'");
                        $data_product = $query_product->fetch_assoc();
                        $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON img_path = product_img_path WHERE `product_id` = '" . $data_order["product_id"] . "'");
                        $data_img = $query_img->fetch_assoc();
                        $query_seller = Database::search("SELECT * FROM seller WHERE `email` = '" . $data_order["product_id"] . "'");
                        $data_seller = $query_seller->fetch_assoc();
                    ?>
                        <div class="row d-flex justify-content-center ps-4 pe-4 pb-3 mb-2" style="border-radius: 8px; background-color: #ede4ff;">
                            <div class="col-12 bg-white mt-3 pt-1 pb-2" style="border-radius: 8px;">
                                <div class="col-12 p-0 d-flex border-bottom" style="height: 40px;">
                                    <div class="col-9 d-flex flex-column">
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

                                    <a href="https://wa.me/<?php echo $formattedNumber; ?>" target="_blank" class="col-3 d-flex align-items-center justify-content-end text-decoration-none">
                                        <span class="material-symbols-outlined chatSeller" style="color: #a938ff;">
                                            forum
                                        </span>
                                    </a>
                                </div>
                                <div class="col-12 mt-2 d-flex p-0" style="height: 70px;">
                                    <div class="col-9 p-0 d-flex align-items-center justify-content-start">
                                        <div style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; margin-right: 8px;">
                                            <img onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;" src="<?php echo $data_img["product_img_path"]; ?>" alt="">
                                        </div>
                                        <div class="d-flex flex-column titleOrder" style="gap: px;">
                                            <div onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="width: 90%; height: 40px; overflow: hidden; font-size: 12px; font-weight: 600; text-align: start; display: flex; align-items: start; justify-content: start;"><?php echo $data_product["title"]; ?></div>
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
                                    <div class="col-3 d-flex align-items-center justify-content-end p-0 ">
                                        <span class="ps-2 pe-2 pt-2 pb-2 rounded-3 d-flex align-items-center justify-content-center text-white me-1" style="font-size: 10px; font-weight: 600; background-color: #a938ff;"><?php echo $data_status["status_type"]; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="col-12 mt-2 rounded-3 bg-white d-flex flex-column align-items-center justify-content-center" style="height: 100px;">
                    <span style="font-size: 13px; font-weight: 600;">Empty Order Page</span>
                    <a href="./index.php" class="p-3 mt-2 rounded-3 text-decoration-none text-white" style="background-color: #a938ff; font-size: 13px; font-weight: 600;">Continue Shopping</a>
                </div>
            <?php
            }
            ?>
        <?php
    } else {
        header("Location: login.php");
    }
        ?>

        <script>
            window.onload = changeDropdown;

            function changeDropdown(event) {
                const selectedValue = event.target.value;

                var list = 0;

                // Perform actions based on the selected value
                if (selectedValue === "5") {
                    list = 5;
                } else if (selectedValue === "15") {
                    list = 15;
                } else if (selectedValue === "30") {
                    list = 30;
                } else if (selectedValue === "all") {
                    list = "all";
                } else {
                    list = 5;
                }

                var f = new FormData();
                f.append("list", list);

                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4 && r.status == 200) {
                        var t = r.responseText;
                        document.getElementById("addContentMobile").innerHTML = t;
                        // alert(t);
                    }
                }
                r.open("POST", "chageListMobileProcess.php", true);
                r.send(f);

            }
            // window.onload = dropdown;
            const dropdown = document.getElementById("orderDateMObile");
            dropdown.addEventListener("change", changeDropdown);

            function goToSimglePage(x) {
                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4 && r.status == 200) {
                        var t = r.responseText;
                        if (t == "success") {
                            window.location.href = "singleProduct.php";
                        } else {
                            alert(t);
                        }
                    }
                }
                r.open("GET", "redirectSingleProductPageFromCart.php?x=" + x, true);
                r.send();
            }

            const mediaQuery = window.matchMedia('(min-width: 768px)');

            if (mediaQuery.matches) {
                // Apply styles or behavior for large screens
                document.body.style.display = 'none';
            } else {
                // Apply styles or behavior for small screens
                document.body.style.display = 'block';
            }

            // You can also listen for changes in the screen state
            mediaQuery.addEventListener('change', (event) => {
                if (event.matches) {
                    window.location.href = "myOrders.php";
                } else {
                    window.location.href = "mobileMyOrder.php";
                    // Screen became narrower
                }
            });
        </script>

        <script src="./myOrders.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>