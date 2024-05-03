<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "./connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./mobile_search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-0" style="background-color: #f5f5f5; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <div class="col-12 d-flex position-sticky" style="z-index: 99999; top: 0; height: 60px; background-image: linear-gradient(to right,#8b2be2,#4d02e0);">
        <div class="col-2 d-flex align-items-center justify-content-center"><i onclick="backToIndexFromProductPage();" class="fa-solid fa-chevron-left fs-4 text-white"></i></div>
        <div class="col-6 d-flex align-items-center justify-content-center">
            <input onclick="goToSearchPageFromProductList();" autocomplete="off" autofocus="off" autocapitalize="off" type="text" class="col-12 border-0 rounded-3 ps-2" style="height: 40px; background-color: white; font-size: 14px; color: white;" placeholder="<?php echo $_SESSION["j"]; ?>">
        </div>
        <div class="col-4 d-flex align-items-center justify-content-end gap-4" style="font-size: 15px; font-weight: 500; color: white;">
            <i onclick="goToCartFromProductList();" class="fa-solid fa-bag-shopping fs-4"></i>
            <div class="mt-1">
                <?php
                include "./MobileHeader.php";
                ?>
            </div>
        </div>
    </div>

    <?php
    $get_data = $_COOKIE["category_num"];
    $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `category_cat_id` = '" . $get_data . "'");
    $query1 = Database::search("SELECT * FROM category WHERE `cat_id` = '" . $get_data . "'");
    $num = $query->num_rows;
    $data = $query1->fetch_assoc();
    ?>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center mt-2">
        <div class="col-12 bg-white d-flex align-items-center justify-content-between ps-3 pe-3 position-sticky" style="height: 40px; top: 0;">
            <div style="font-size: 10px;"><?php echo $num; ?> items found for <span style="color: #8b2be2;">"<?php echo $data["cat_name"]; ?>"</span></div>
            <i class="bi bi-funnel fs-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>
        </div>
        <?php
        $get_data = $_COOKIE["category_num"];
        $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `category_cat_id` = '" . $get_data . "'");
        $num = $query->num_rows;
        if ($num > 0) {
        ?>
            <div class="col-11 rounded-3 mt-3 mb-3 p-0" id="productAll">
                <div class="rounded-3 col-12 p-0 mainGrid">
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $data5 = $query->fetch_assoc();
                    ?>
                        <div onclick="getIndex(<?php echo $data5['id']; ?>);" style="cursor: pointer; text-decoration: none; background-color: #ffffff; width: 100%; border-radius: 8px;" class="polaroid">
                            <div style="width: 100%; border-radius: 8px;">
                                <div style="width: 100%; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                    <img src="<?php echo $data5["img_path"] ?>" style="width: 100%; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0 imgOpt">
                                </div>
                                <div class="mt-1 ms-2 titleDiv">
                                    <p class="titleText" style="font-weight: 400; line-height: 13px;"><?php echo $data5["title"] ?></p>
                                </div>
                                <div class="ms-2 priceDiv">
                                    <?php
                                    $price = $data5["price"];
                                    $discount = $data5["discount"];
                                    $process = ($price * $discount) / 100;
                                    $newPrice = $price - $process;
                                    if ($newPrice < 0) {
                                        $newPrice = 0;
                                    }
                                    $formattedPrice = "LKR " . number_format($newPrice, 2, '.', ',');
                                    ?>
                                    <p class="priceText" style=" color: #8b2be2;"><?php echo $formattedPrice; ?></p>
                                </div>
                                <?php
                                if ($data5["discount"] > 0) {
                                ?>
                                    <div class="ms-2 dicDiv d-flex align-items-center justify-content-between" style="margin-top: -25px;">
                                        <div class="">
                                            <?php

                                            $price = $data5["price"];
                                            $formattedPrice1 = "LKR " . number_format($price, 2, '.', ',');

                                            ?>
                                            <span style="color: #6c757d; text-decoration: line-through;" class="disText1"><?php echo $formattedPrice1; ?></span>&nbsp;&nbsp;<span style="color: #191919; font-weight: 600;" class="disText1">-</span><span style="color: #31363F; font-weight: 600;" class="disText1"><?php echo $data5["discount"]; ?></span><span style="color: #191919; font-weight: 600;" class="disText1">%</span>

                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="ms-2" style="margin-top: -25px;">
                                        <span style="color: #6c757d; font-size: 9px;" class="disText1">20&nbsp;Sold</span>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="ms-2 starsDiv" style="color: #3e3f41;">
                                    <?php
                                    $review = Database::search("SELECT * FROM product JOIN ratings ON product.id=ratings.product_id WHERE `id` = '" . $data5["id"] . "'");

                                    $rate_num = $review->num_rows;

                                    if ($rate_num == 0) {
                                    ?>
                                        <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                        <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                        <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                        <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                        <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                        <span style="font-size: 10px; color: #a4a1a1;">(<span>0</span>)</span>
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
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                        <?php
                                        } else if ($rate <= 40) {
                                        ?>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate;; ?></span>)</span>
                                        <?php
                                        } else if ($rate <= 60) {
                                        ?>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                        <?php
                                        } else if ($rate <= 80) {
                                        ?>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star starsAlls" style="color: #cccccc;"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                        <?php
                                        } else if ($rate <= 100) {
                                        ?>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span class="fa fa-star checked starsAlls"></span>
                                            <span style="font-size: 10px; color: #a4a1a1;">(<span><?php echo $all_rate; ?></span>)</span>
                                    <?php
                                        }
                                    }
                                    ?>



                                </div>

                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 rounded-3 position-absolute d-flex align-items-center justify-content-center" style="margin-top: 200px;">
                        <div class="col-11 bg-white  d-flex flex-column align-items-center p-2 rounded-3" style="height: 130px;">
                            <i class="fa-solid fa-magnifying-glass fs-2 mb-3"></i>
                            <span style="font-size: 18px; font-weight: 600;">Search No Results</span>
                            <span style="font-size: 13px; color: #777777; text-align: center;">We`re sorry, we cannot find any matches for your search term</span>
                        </div>
                    </div>
                    <!-- <div class="col-12 bg-black position-absolute">l</div> -->
                <?php
                }
                ?>
                </div>
            </div>
    </div>

    <!-- model -->

    <div class="offcanvas offcanvas-end" style="z-index: 9999999; width: 300px;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" style="font-size: 18px;" id="offcanvasRightLabel">Search Filters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-4" style="overflow-y: auto; max-height: 580px;">
            <div class="ps-2 rounded-3 pt-2 pb-2" style="font-size: 14px; font-weight: 600; background-color: #EDE4FF;">All Categories</div>
            <div class="col-12 d-flex flex-column mt-2 gap-3 ps-2 pt-2 pb-3 border-bottom allText" style="font-size: 12px;">
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 1");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(1);">Electronic Devices (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 2");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(2);">Electronic Accessories (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 3");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(3);">TV & Home Appliance (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 4");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(4);">Health & Beauty (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 5");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(5);">Babies & Toys (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 6");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(6);">Groceries & Pets (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 7");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(7);">Home & Lifestyle (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 8");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(8);">Women`s Fashion (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 9");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(9);">Men`s Fashion (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 10");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(10);">Watches & Accessories (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 11");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(11);">Sports & Outdoor (<?php echo $num; ?>)</span>
                <?php
                $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 12");
                $num = $product->num_rows;
                ?>
                <span onclick="getCategoryDataMobile(12);">Automotive & Moterbike (<?php echo $num; ?>)</span>
            </div>
            <div class="ps-2 rounded-3 pt-2 pb-2 mt-2" style="font-size: 14px; font-weight: 600; background-color: #EDE4FF;">Price</div>
            <div class="col-12 d-flex align-items-center mt-3 gap-2">
                <input type="text" class="col-4 rounded-3 ps-2" style="height: 40px; border: 2px solid #8b2be2; font-size: 13px;" placeholder="MIN">
                <span>-</span>
                <input type="text" class="col-4 rounded-3 ps-2" style="height: 40px; border: 2px solid #8b2be2; font-size: 13px;" placeholder="MAX">
                <button class="flex-grow-1 rounded-3 text-white" style="height: 40px; background-color: #8b2be2; outline: none; border: none; font-size: 13px; font-weight: 600;">Apply</button>
            </div>
        </div>

    </div>
    <!-- model -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>