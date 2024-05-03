<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | My Wishlist</title>
    <link rel="stylesheet" href="./mobileMyWishlist.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="padding: 0;">

    <?php
    session_start();
    if ($_COOKIE["name"]) {
        $email = $_COOKIE["email"];
        include "./connection.php";

    ?>
        <!-- ================================== HEADER start ==================================-->


        <div class="HeaderMobileMain">
            <div class="HeaderMobileSub01">
                <a href="./mobileAccount.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                <span class="HeaderMobileMainText">My Wishlist</span>
            </div>
            <div class="HeaderMobileSub02">
                <?php
                require "./MobileHeader.php";
                ?>
            </div>

        </div>
        <?php
        $query = Database::search("SELECT * FROM product JOIN watchlist ON product.id = watchlist.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                WHERE `user_watch_email` = '" . $email . "'");

        $num = $query->num_rows;
        if ($num > 0) {
        ?>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white col-11 mt-3 pt-1 pb-2 mb-3" style="border-radius: 8px;">
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 50px; background-color: #f2f2f2; border-radius: 8px;">
                        <a href="#" onclick="addAllTocart();" class="bg-white p-2 pe-3 rounded-3" style="font-size: 14px; font-weight: 600; color: #a938ff; text-decoration: none;">&nbsp;&nbsp;&nbsp;ADD ALL TO CART</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


        <div class="col-12 d-flex flex-column align-items-center justify-content-start pt-2 mt-1" style="background-color: #ede4ff;">
            <?php
            $query = Database::search("SELECT * FROM product JOIN watchlist ON product.id = watchlist.product_id JOIN product_img ON product.id = product_img.product_id JOIN indeximage ON product_img.img_path = indeximage.product_img_path 
                                WHERE `user_watch_email` = '" . $email . "'");

            $num = $query->num_rows;
            if ($num > 0) {
                for ($i = 0; $i < $num; $i++) {
                    $data = $query->fetch_assoc();
            ?>
                    <div class="col-11 bg-white d-flex align-items-center justify-content-start ps-1 mb-2" style="height: 90px; border-radius: 8px;">
                        <img onclick="backToSingle(<?php echo $data['product_id']; ?>);" src="<?php echo $data["img_path"]; ?>" style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover;" alt="">
                        <div class="flex-grow-1 d-grid" style="gap: 5px;">
                            <div class="col-12">
                                <div onclick="backToSingle(<?php echo $data['product_id']; ?>);" style="width: 38vw; height: 25px; overflow: hidden; font-size: 11px; line-height: 12px;" class="ms-2 me-1"><?php echo $data["title"]; ?></div>
                            </div>
                            <a href="#" class="d-flex flex-column align-items-start justify-content-center ps-2 text-secondary text-decoration-none">
                                <?php
                                if ($data["option_qty_wishlist"] != 0) {
                                    $wishlist_option = Database::search("SELECT * FROM color WHERE `clr_id` = '" . $data["option_qty_wishlist"] . "'");
                                    $data_wish = $wishlist_option->fetch_assoc();
                                ?>

                                    <div class="mb-2" style="font-size: 10px; overflow: hidden; height: 15px; width: 130px;">Option: <?php echo $data_wish["clr_name"]; ?></div>

                                <?php
                                }
                                ?>

                                <i onclick="deleteFromWishlist(<?php echo $data['product_id']; ?>);" class="fa-regular fa-trash-can fs-6"></i>

                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-center pe-1" style="width: 120px; gap: 1px;">
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
                            <div class="col-12 d-flex align-items-center justify-content-center pt-1 pb-1" style="font-weight: 600; background-color: #f2f2f2; border-radius: 5px; font-size: 11px; color: #a938ff;"><?php echo $formattedPrice; ?></div>
                            <span class="me-1" style="font-size: 10px; color: #777777; font-weight: 600;">Qty: <?php echo $data["qty_wishlist"]; ?></span>
                            <div onclick="addTocartOne(<?php echo $data['product_id']; ?>);" style="width: 30px; height: 30px; background-color: #a938ff; border-radius: 5px; padding: 20px;" class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-plus fs-3" style="color: white;"></i></div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h5 class="fs-6">Empty Wishlist</h3>
                        <button onclick="goHomeFromWish();" class="p-3 mb-2 rounded-3 text-white fw-bold" style="font-size: 14px;  border: none; background-color: #a938ff;">Continue Shopping</button>
                </div>
            <?php
            }

            ?>
            <!-- <div class="col-11 bg-white d-flex align-items-center justify-content-start ps-1 mb-2" style="height: 90px; border-radius: 8px;">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wx
                MjA3fDB8MHxzZWFyY2h8Mnx8cG9ydHJhaXR8ZW58MHx8MHx8fDA%3D" style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover;" alt="">
                <div class="flex-grow-1 d-grid" style="gap: 5px;">
                    <div class="col-12">
                        <div style="width: 38vw; height: 25px; overflow: hidden; font-size: 12px; line-height: 12px;" class="ms-1 me-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ut doloremque itaque eveniet veniam fugiat praesentium quaerat? Officiis, amet non?</div>
                    </div>
                    <a href="#" class="d-flex flex-column align-items-start justify-content-center ps-2 text-secondary text-decoration-none">
                        <span class="mb-2" style="font-size: 10px; margin-left: -4px;">Option: Black</span>
                        <i class="fa-regular fa-trash-can fs-5"></i>

                    </a>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-center pe-1" style="width: 120px; gap: 1px;">
                    <div class="col-12 d-flex align-items-center justify-content-center pt-1 pb-1" style="font-weight: 600; background-color: #f2f2f2; border-radius: 5px; font-size: 12px; color: #a938ff;">LKR 250000.00</div>
                    <span class="me-1" style="font-size: 10px; color: #777777; font-weight: 600;">Qty: 2</span>
                    <div style="width: 30px; height: 30px; background-color: #a938ff; border-radius: 5px; padding: 20px;" class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-plus fs-3" style="color: white;"></i></div>
                </div>
            </div>
            <div class="col-11 bg-white d-flex align-items-center justify-content-start ps-1 mb-2" style="height: 90px; border-radius: 8px;">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wx
                MjA3fDB8MHxzZWFyY2h8Mnx8cG9ydHJhaXR8ZW58MHx8MHx8fDA%3D" style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover;" alt="">
                <div class="flex-grow-1 d-grid" style="gap: 5px;">
                    <div class="col-12">
                        <div style="width: 38vw; height: 25px; overflow: hidden; font-size: 12px; line-height: 12px;" class="ms-1 me-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ut doloremque itaque eveniet veniam fugiat praesentium quaerat? Officiis, amet non?</div>
                    </div>
                    <a href="#" class="d-flex flex-column align-items-start justify-content-center ps-2 text-secondary text-decoration-none">
                        <span class="mb-2" style="font-size: 10px; margin-left: -4px;">Option: Black</span>
                        <i class="fa-regular fa-trash-can fs-5"></i>

                    </a>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-center pe-1" style="width: 120px; gap: 1px;">
                    <div class="col-12 d-flex align-items-center justify-content-center pt-1 pb-1" style="font-weight: 600; background-color: #f2f2f2; border-radius: 5px; font-size: 12px; color: #a938ff;">LKR 250000.00</div>
                    <span class="me-1" style="font-size: 10px; color: #777777; font-weight: 600;">Qty: 2</span>
                    <div style="width: 30px; height: 30px; background-color: #a938ff; border-radius: 5px; padding: 20px;" class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-plus fs-3" style="color: white;"></i></div>
                </div>
            </div> -->
        </div>

    <?php
    } else {
        setcookie("myWishlist", true, time() + (60 * 60 * 24));
        header("Location: login.php");
    }
    ?>

    <script src="./myWishlist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>