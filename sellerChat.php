<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Home-Selling</title>
    <link rel="stylesheet" href="./sellerChat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.google.com/icons?selected=Material%20Icons%20Outlined%3Asort">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f5f5f5;">
    <?php
    include "./connection.php";
    session_start();
    if (isset($_COOKIE["emailSeller"])) {
    ?>
        <div class="col-12 d-none d-md-block mb-2 m-0 p-0 shadow-sm" style="height: 70px; position: sticky; top: 0; z-index: 9999;">
            <div class="col-12 d-flex align-items-center justify-content-center bg-dark h-100 p-0 m-0">

                <div class="col-md-8 col-lg-8 h-100 d-flex align-items-center justify-content-start" style="font-size: 30px; font-weight: 600; color: #FFF7F1; gap: 20px;">
                    <a href="./becomeASeller.php" class="text-decoration-none" style="border: none;"><i class="fa-solid fa-circle-chevron-left" style="color: #a938ff; font-size: 45px;"></i></a>
                    <span style="margin-top: -5px;">Messages</span>
                </div>
                <div class="col-md-4 col-lg-4 d-flex align-items-center justify-content-end h-100">

                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <?php

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

                                    <div style="height: 570px; border-radius: 8px; overflow: auto;" class="col-12 bg-white p-2">

                                        <?php
                                        $query = Database::search("SELECT DISTINCT seller_and_product_message.product_id AS id , title , img_path FROM product JOIN product_img ON product.id = product_img.product_id
                                        JOIN indeximage ON product_img.img_path = indeximage.product_img_path
                                        JOIN seller_and_product_message ON product.id = seller_and_product_message.product_id
                                        WHERE `seller_email` = '" . $_COOKIE["emailSeller"] . "'");

                                        $num = $query->num_rows;
                                        if ($num > 0) {
                                            for ($i = 0; $i < $num; $i++) {
                                                $data = $query->fetch_assoc();
                                        ?>
                                                <div onclick="clickOne(<?php echo $data['id']; ?>);" style="cursor: pointer; height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                                    <img src="<?php echo $data["img_path"]; ?>" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                                    <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; "><?php echo $data["title"]; ?></div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                        }
                                        ?>

                                        <!-- <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a>
                                        <a href="#" style="height: 60px; border-radius: 8px; padding-left: 5px; background-color: #ede4ff; text-decoration: none;" class="d-flex align-items-center mb-2">
                                            <img src="./avatar/avatarGirl.jpg" style="width: 45px; height: 45px; border-radius: 5px; border: 2px solid #a938ff; padding: 2px;">
                                            <div style="width: 100px; overflow: hidden; height: 27px; font-size: 11px; line-height: 13px; margin-left: 5px; font-weight: 600; color: #343a40; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia incidunt omnis aliquam dolores ipsa similique eligendi deserunt voluptatum quidem odio ratione id laudantium, sint vero minus sequi, laborum magnam impedit accusamus, nemo aperiam eveniet fuga voluptas. Vitae tempora corrupti officia optio! Asperiores, quas. A, temporibus! Quibusdam blanditiis numquam delectus obcaecati.</div>
                                        </a> -->
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="content col-md-8 col-lg-9">
                        <div class="d-flex justify-content-between border-bottom align-items-end mb-3">
                            <h2 style="font-size: 30px;" class="p-0">Customer Questions</h2>


                        </div>

                        <div class="d-block">
                            <div class="row row-grid ">
                                <?php
                                if (isset($_SESSION["p"])) {
                                    $ses_data = $_SESSION["p"];

                                ?>
                                    <!-- product -->
                                    <div class="col-12 col-lg-12 mt-3 mb-3 pt-3 pb-3" style="border-radius: 8px; background-color: #343a40;">
                                        <div class="col-12 bg-white ps-2 pe-2 pb-3" style="border-radius: 8px;">
                                            <div class="col-12 p-0 pt-2" style="border-radius: 8px;  height: 450px;">
                                                <div class="col-12 d-flex mb-2" style="height: 50px; border-radius: 8px; background-color: #ede4ff;">
                                                    <div class="col-8 d-flex align-items-center p-0">
                                                    <i onclick="sessionDone();" class="fa-solid fa-chevron-left" style="font-size: 25px; margin-right: 15px; cursor: pointer;"></i>

                                                        <img src="<?php echo $ses_data["img_path"]; ?>" style="width: 50px; height: 50px; border-radius: 8px; padding: 2px; border: 3px solid #a938ff;">
                                                        <div class="d-flex flex-column align-items-start justify-content-start" style="text-align: start; height: 30px; width: 800px; margin-left: 8px; overflow: hidden; line-height: 14px; font-size: 13px; font-weight: 600;">
                                                            <?php echo $ses_data["title"]; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center justify-content-end">
                                                        <a href="#" onclick="garbage(<?php echo $ses_data['id']; ?>);" class="text-dark"><i class="fa-regular fa-trash-can" style="font-size: 20px;"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-12 overEdit pt-3 ps-0" style="overflow: auto; height: 390px; padding-bottom: 50px;  box-shadow: inset -1px 2px 10px rgba(0, 0, 0, 0.2)">
                                                    <?php
                                                    $query3 = Database::search("SELECT * FROM product JOIN product_img ON product.id = product_img.product_id
                                                    JOIN indeximage ON product_img.img_path = indeximage.product_img_path
                                                    JOIN seller_and_product_message ON product.id = seller_and_product_message.product_id
                                                    WHERE `seller_email` = '".$_COOKIE["emailSeller"]."'  AND seller_and_product_message.product_id = '".$ses_data["id"]."'");

                                                    $num2 = $query3->num_rows;

                                                    for ($i = 0; $i < $num2; $i++) {

                                                        $data = $query3->fetch_assoc();
                                                    ?>
                                                        <div class="col-12 d-flex align-items-center justify-content-center pt-3 pb-3">
                                                            <div class="d-flex align-items-center justify-content-center p-3" style="height: 30px; font-size: 13px;
                                        border-radius: 30px; border: 2px solid #f5f5f5; font-weight: 600;"><?php echo $data["date"]; ?>&nbsp;&nbsp;
                                                                <span style="margin-top: -3px;">|</span>&nbsp;&nbsp;<?php echo $data["time"]; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($data["customer_message"] == null) {
                                                        } else {
                                                        ?>

                                                            <div class="col-12 p-0 pb-3 ps-0">
                                                                <div class="col-6 pb-3 pt-3" style="font-size: 13px; border-radius: 30px; border: 2px solid #cccccc; padding-left: 20px;"><?php echo $data["customer_message"]; ?></div>
                                                            </div>

                                                        <?php
                                                        }

                                                        if ($data["seller_message"] == null) {
                                                        } else {
                                                        ?>

                                                            <div class="col-12 p-0 pb-3 ps-0 d-flex justify-content-end">
                                                                <div class="col-6 pb-3 pt-3" style="font-size: 13px; padding-left: 20px; color: #ffffff; border-radius: 30px; background-image: linear-gradient(to top, #3e3afe,#7414fe);"><?php echo $data["seller_message"]; ?></div>
                                                            </div>

                                                        <?php
                                                        }
                                                        ?>



                                                    <?php
                                                    }
                                                    ?>





                                                </div>
                                            </div>

                                            <div class="col-12 d-flex align-items-center justify-content-center">
                                                <input type="text" class="col-12  text-white textChat" style="height: 60px; border-radius: 50px; border: none; padding-left: 30px; padding-right: 30px; margin-top: -40px; 
                                        background-color: #414446; color: #ffffff;  box-shadow: 0px -10px 8px 0 rgba(0, 0, 0, 0.2);" placeholder="Type a message">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- product -->

                                <?php
                                } else {
                                ?>

                                    <div class="row row-grid col-12">
                                        <!-- product -->
                                        <div class="col-12 col-lg-12 mt-3 mb-3 pt-3 pb-3" style="border-radius: 8px; background-color: #343a40;">
                                            <div class="col-12 bg-white ps-2 pe-2 pb-3 d-flex flex-column align-items-center justify-content-center" style="font-size: 18px; font-weight: 600; text-align: center; border-radius: 8px; height: 500px;">
                                                <i class="fa-solid fa-paper-plane mb-3" style="font-size: 40px;"></i>
                                                Please select the product you want to send the message to
                                            </div>
                                        </div>
                                        <!-- product -->
                                    </div>

                                <?php
                                }
                                ?>


                            </div>
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
    <script src="./sellerChat.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js"></script>
</body>

</html>