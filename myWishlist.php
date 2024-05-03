<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | My Wishlist</title>
    <link rel="stylesheet" href="./myWishlist.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body style="background-color: #eff0f4; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;" class="d-none d-md-block">
    <?php
    session_start();
    $email = $_COOKIE["email"];
    if (isset($_COOKIE["name"])) {

    ?>
        <div class="position-sticky top-0 w-100" style="z-index: 9999;">

            <?php


            require "./headerNew.php";

            ?>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center mt-3">
            <div class="col-12 d-flex justify-content-center align-items-center p-0">
                <div class="col-11 p-0">

                    <div class="sidebar" style="z-index: 99999;">
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" onclick="myProfile();" href="./manageAccount.php">&nbsp;<i class="fa-regular fa-user fs-3"></i>&nbsp;&nbsp;&nbsp;My Profile</a>
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="./myOrders.php">&nbsp;<i class="fa-solid fa-inbox fs-3"></i>&nbsp;&nbsp;&nbsp;My Orders</a>
                        <a style="font-size: 13px; text-decoration: none; display: flex; align-items: center; justify-content: start; font-weight: 600;" href="#" class="active">&nbsp;<i class="fa-regular fa-heart fs-3"></i>&nbsp;&nbsp;&nbsp;Wishlist</a>
                    </div>

                    <div class="content">
                        <h2 style="font-weight: 500; font-size: 20px;">My Wishlist</h2>
                        <?php
                        $query = Database::search("SELECT * FROM product JOIN watchlist ON product.id = watchlist.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                WHERE `user_watch_email` = '" . $email . "'");

                        $num = $query->num_rows;
                        if ($num > 0) {
                        ?>
                            <div class="bg-white col-12 mt-3 pt-2 pb-2 mb-3" style="border-radius: 8px;">
                                <div class="col-12 d-flex align-items-center justify-content-start" style="height: 50px; background-color: #f2f2f2; border-radius: 8px;">
                                    <a onclick="addAllTocart();" href="#" style="font-size: 14px; font-weight: 600; color: #a938ff; text-decoration: none;">ADD ALL TO CART</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="col-12" style="border-radius: 8px;">
                            <div class="row d-flex justify-content-center ps-4 pe-4 pb-3" style="border-radius: 8px; background-color: #ede4ff;">
                                <?php
                                $query = Database::search("SELECT * FROM product JOIN watchlist ON product.id = watchlist.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                WHERE `user_watch_email` = '" . $email . "'");

                                $num = $query->num_rows;
                                if ($num > 0) {
                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $query->fetch_assoc();
                                ?>
                                        <div class="col-12 bg-white mt-3 pt-1 pb-3" style="border-radius: 8px;">
                                            <div class="col-12 mt-2 d-flex p-0" style="height: 100px;">
                                                <div class="col-9 p-0 d-flex align-items-center justify-content-start" style="width: 100%;">
                                                    <div style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; margin-right: 13px;">
                                                        <img onclick="backToSingle(<?php echo $data['product_id']; ?>);" style="cursor: pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 8px;" src="<?php echo $data["img_path"]; ?>" alt="">
                                                    </div>
                                                    <div class="d-flex flex-column titleOrder" style="gap: 5px;">
                                                        <div onclick="backToSingle(<?php echo $data['product_id']; ?>);" style="cursor: pointer; width: 100%; height: 40px; overflow: hidden; font-size: 12px; font-weight: 600; text-align: start; display: flex; align-items: start; justify-content: start;"><?php echo $data["title"]; ?></div>
                                                        <?php
                                                        if ($data["option_qty_wishlist"] != 0) {
                                                            $wishlist_option = Database::search("SELECT * FROM color WHERE `clr_id` = '" . $data["option_qty_wishlist"] . "'");
                                                            $data_wish = $wishlist_option->fetch_assoc();
                                                        ?>

                                                            <div style="font-weight: 600; margin-top: -3px; color: #777777; overflow: hidden; height: 15px;">Option: <?php echo $data_wish["clr_name"]; ?></div>

                                                        <?php
                                                        }
                                                        ?>
                                                        <a onclick="deleteFromWishlist(<?php echo $data['product_id']; ?>);" href="#" style="font-size: 12px; font-weight: 600; color: #79758a;"><i class="fa-solid fa-trash-can fs-4"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-3 d-flex flex-column align-items-end justify-content-between p-0">
                                                    <div class="d-flex flex-column p-2 rounded-3 align-items-end" style="margin-top: 5px; background-color: #f2f2f2;">
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
                                                        <span style="color: #a938ff; font-size: 13px; font-weight: 600;"><?php echo $formattedPrice; ?></span>
                                                        <?php
                                                        $price = $data["price"];
                                                        $formattedPrice = "LKR " . number_format($price, 2, '.', ',');
                                                        ?>
                                                        <span style="color: #a938ff; font-size: 9px;"><span style="text-decoration: line-through;"><?php echo $formattedPrice; ?></span>&nbsp;-<?php echo $data["discount"]; ?>%</span>
                                                    </div>
                                                    <span class="me-2 mb-1" style="font-size: 10px; color: #777777; font-weight: 600;">Qty: <?php echo $data["qty_wishlist"]; ?></span>
                                                    <a onclick="addTocartOne(<?php echo $data['product_id']; ?>);" href="#" class="rounded-3 d-flex align-items-center justify-content-center text-white me-1" style="text-decoration: none; font-size: 12px; font-weight: 600; background-color: #a938ff; width: 50px; height: 40px;"><i class="fa-solid fa-cart-plus fs-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-12 bg-white mt-3 rounded-3 d-flex align-items-center justify-content-center
                                    " style="height: 200px;">
                                        <div class="d-flex flex-column align-items-center">
                                            <span style="font-size: 15px; font-weight: 600;">Empty Wishlist</span>
                                            <a href="./index.php" class="p-4 mt-2 rounded-3 text-white text-decoration-none" style=" font-size: 14px; background-color: #a938ff; font-weight: 600;">Continue Shopping</a>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>

                                <!-- 
                                <div class="col-12 bg-white mt-3 pt-1 pb-3" style="border-radius: 8px;">
                                    <div class="col-12 mt-2 d-flex p-0" style="height: 100px;">
                                        <div class="col-9 p-0 d-flex align-items-center justify-content-start" style="width: 100%;">
                                            <div style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; margin-right: 13px;">
                                                <img style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cG9ydHJhaXR8ZW58MHx8MHx8fDA%3D" alt="">
                                            </div>
                                            <div class="d-flex flex-column titleOrder" style="gap: 5px;">
                                                <div style="width: 100%; height: 40px; overflow: hidden; font-size: 12px; font-weight: 600; text-align: start; display: flex; align-items: start; justify-content: start;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae illo veritatis, aliquam dolorum qui rem cum sit iure corporis totam.</div>
                                                <span style="font-weight: 600; margin-top: -3px;">Color Family: Black</span>
                                                <a href="#" style="font-size: 12px; font-weight: 600; color: #79758a;"><i class="fa-solid fa-trash-can fs-3"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex flex-column align-items-end justify-content-between p-0">
                                            <div class="d-flex flex-column p-2 rounded-3 align-items-end" style="margin-top: 5px; background-color: #f2f2f2;">
                                                <span style="color: #a938ff; font-size: 13px; font-weight: 600;">LKR 250000.00</span>
                                                <span style="color: #a938ff; font-size: 9px;"><span style="text-decoration: line-through;">LKR 250000.00</span>&nbsp;-45%</span>
                                            </div>
                                            <span class="me-2 mb-1" style="font-size: 10px; color: #777777; font-weight: 600;">Qty: 2</span>
                                            <a href="#" class="rounded-3 d-flex align-items-center justify-content-center text-white me-1" style="text-decoration: none; font-size: 12px; font-weight: 600; background-color: #a938ff; width: 50px; height: 40px;"><i class="fa-solid fa-cart-plus fs-2"></i></a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
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


                    </div>

                </div>
            </div>


            <!-- ===================== footer ======================-->

        </div>

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
    <?php
    } else {
        setcookie("myWishlist", true, time() + (60 * 60 * 24));
        header("Location: login.php");
    }

    ?>

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

        // if(window.innerWidth < 768){
        //   window.location.href = "mobileProfileInfo.php";
        // }
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
                window.location.href = "myWishlist.php";
            } else {
                window.location.href = "mobileMyWishlist.php";
                // Screen became narrower
            }
        });

        function backToSingle(x) {
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
            r.open("GET", "redirectSinglePageFromWishlist.php?x=" + x, true);
            r.send();
        }

        function deleteFromWishlist(x) {
            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4 && r.status == 200) {
                    var t = r.responseText;
                    if (t == "success") {
                        window.location.reload();
                    }
                }
            }
            r.open("GET", "deleteFromWishlistProcess.php?x=" + x, true);
            r.send();
        }

        function addTocartOne(x) {
            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4 && r.status == 200) {
                    var t = r.responseText;
                    if (t == "success") {
                        window.location.reload();
                    } else {
                        window.location.reload();
                    }
                }
            }
            r.open("GET", "addToCartFromWishlistOneProcess.php?x=" + x, true);
            r.send();
        }

        function addAllTocart() {
            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4 && r.status == 200) {
                    var t = r.responseText;
                    if (t == "success") {
                        window.location.reload();
                    } else {
                        window.location.reload();
                    }
                }
            }
            r.open("GET", "addToCartAllProcess.php", true);
            r.send();
        }
    </script>

    <script src="./myOrders.js"></script>
</body>

</html>