<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- =============== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./MobileHeader.css">
    <!-- =============== -->

</head>

<body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <div class="dropdown">
        <i class="fa-solid fa-ellipsis HeaderMobileDotsIcon dropbtn" onclick="myFunction()"></i>
        <div id="myDropdown" class="dropdown-content">
            <?php
            if (isset($_COOKIE["name"])) {
            ?>
                <a href="./index.php">Home</a>
                <a href="./categoryListMobile.php">Categories</a>
                <a href="./mobileAccount.php">My Account</a>
                <a href="./mobileMyOrder.php">My Orders</a>
                <a href="./mobileMyWishlist.php">My Wishlist</a>
                <a href="#contact">Contact Admin</a>

            <?php
            } else {
            ?>
                <a href="./login.php">Login</a>
                <a href="./index.php">Home</a>
                <a href="./categoryListMobile.php">Categories</a>
                <a href="./mobileAccount.php">My Account</a>
                <a href="./mobileMyOrder.php">My Orders</a>
                <a href="./mobileMyWishlist.php">My Wishlist</a>
                <a href="#contact">Contact Admin</a>
            <?php
            }
            ?>

        </div>
    </div>

    <script src="./MobileHeader.js"></script>
</body>

</html>