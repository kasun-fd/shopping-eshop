<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Product List</title>
    <link rel="stylesheet" href="./product-list.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="d-none d-md-block">
        <?php

        include "./headerNew.php";
        ?>

        <div class="col-12 d-flex align-items-center justify-content-center mt-2">
            <div class="col-11 d-flex p-0">
                <div class="col-md-4 mb-5 col-lg-3 bg-white d-none d-md-block rounded-3 pb-4">
                    <div class="col-12 d-flex align-items-center mb-4 justify-content-center mt-2 rounded-3" style="height: 40px; font-size: 20px; font-weight: 600; background-color: #ede4ff;">Filters</div>

                    <div class="col-12 p-0 d-flex align-items-center justify-content-start border-bottom" style="height: 20px;">
                        <span class="mb-2" style="font-size: 15px; font-weight: 600;">All Categories</span>
                    </div>
                    <div class="col-12 mt-2 p-0">
                        <div onclick="getCategorydata(1);" class="col-12 p-0 mb-3 mt-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 1");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Electronic Devices&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(2);" class="col-12 p-0 mb-3 boxHover " style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 2");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Electronic Accessories&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(3);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 3");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">TV & Home Appliances&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(4);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 4");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Health & Beauty&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(5);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 5");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Babies & Toys&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(6);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 6");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Groceries & Pets&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(7);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 7");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Home & Lifestyle&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(8);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 8");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Women`s Fashion&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(9);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 9");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Men`s Fashion&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(10);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 10");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Watches & Accessories&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(11);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 11");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Sports & Outdoor&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                        <div onclick="getCategorydata(12);" class="col-12 p-0 mb-3 boxHover" style="cursor: pointer;">
                            <?php
                            $product = Database::search("SELECT * FROM product WHERE `category_cat_id` = 12");
                            $num = $product->num_rows;
                            ?>
                            <span class="ms-2 textBox" style="font-size: 12px;">Automotive & Moterbike&nbsp;(<?php echo $num; ?>)</span>
                        </div>
                    </div>
                    <div class="col-12 p-0 mt-5 d-flex align-items-center justify-content-between border-bottom" style="height: 20px;">
                        <span class="mb-2" style="font-size: 15px; font-weight: 600;">Price</span>
                        <button onclick="clearAll();" class="btnClear" style="font-size: 12px; color: #a938ff;">Clear all</button>
                    </div>
                    <div class="col-12 d-flex p-0 gap-2 mt-3">
                        <input id="min" style="border: 2px solid #a938ff; width: 7vw; height: 30px; border-radius: 5px;" class="ps-2" type="text" placeholder="MIN">
                        <label style="font-size: 12px; color: #777777; margin-top: 4px;">-</label>
                        <input id="max" style="border: 2px solid #a938ff; width: 7vw; height: 30px; border-radius: 5px;" class="ps-2" type="text" placeholder="MAX">
                        <button onclick="apply();" class="flex-grow-1" style="background-color: #a938ff; color: white; border-radius: 5px; font-weight: 600;">Apply</button>
                    </div>
                    <!-- <div class="col-12 p-0 mt-5 d-flex align-items-center justify-content-between border-bottom" style="height: 20px;">
                        <span class="mb-2" style="font-size: 15px; font-weight: 600;">Rating</span>
                        <button onclick="clearAll();" class="btnClear" style="font-size: 12px; color: #a938ff;">Clear all</button>
                    </div> -->
                    <!-- <div class="col-12 mt-2 p-0">
                        <div onclick="clickStars(1);" id="one" class="col-12 ps-2 mb-3 mt-3 selectedStars" style="cursor: pointer;">
                            <i class="fa-solid fa-star starts orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                        </div>
                        <div onclick="clickStars(2);" id="two" class="col-12 ps-2 mb-3 " style="cursor: pointer;">
                            <i class="fa-solid fa-star starts orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <span class="ms-4" style="font-size: 11px;">and Up</span>
                        </div>
                        <div onclick="clickStars(3);" id="three" class="col-12 ps-2 mb-3" style="cursor: pointer;">
                            <i class="fa-solid fa-star starts orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2  gray"></i>
                            <i class="fa-solid fa-star starts ms-2  gray"></i>
                            <span class="ms-4" style="font-size: 11px;">and Up</span>
                        </div>
                        <div onclick="clickStars(4);" id="four" class="col-12 ps-2 mb-3" style="cursor: pointer;">
                            <i class="fa-solid fa-star starts orange"></i>
                            <i class="fa-solid fa-star starts ms-2 orange"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <span class="ms-4" style="font-size: 11px;">and Up</span>
                        </div>
                        <div onclick="clickStars(5);" id="five" class="col-12 ps-2 mb-3" style="cursor: pointer;">
                            <i class="fa-solid fa-star starts orange"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <i class="fa-solid fa-star starts ms-2 gray"></i>
                            <span class="ms-4" style="font-size: 11px;">and Up</span>
                        </div>
                    </div> -->
                   
                </div>
                <div class="col-12 col-md-8 pb-5 col-lg-9 offset-md-4 offset-lg-3 rounded-3 p-0 position-absolute">
                    <div class="col-12 pe-0">
                        <div class="col-12 d-flex align-items-center bg-white rounded-3" style="height: 40px;">
                            <?php
                            $get_data = $_COOKIE["category_num"];
                            $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `category_cat_id` = '" . $get_data . "'");
                            $query1 = Database::search("SELECT * FROM category WHERE `cat_id` = '" . $get_data . "'");
                            $num = $query->num_rows;
                            $data = $query1->fetch_assoc();
                            ?>
                            <div class="col-9 p-0"><?php echo $num; ?> items found for&nbsp;<span style="color: #a938ff;">"<?php echo $data["cat_name"]; ?>"</span></div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <span>View:&nbsp;&nbsp;</span>
                                <i class="fa-solid fa-table-cells-large fs-4"></i>
                            </div>
                        </div>
                        <div class="col-12 rounded-3 mt-3 p-0" id="productAll">
                            <div class="rounded-3 col-12 p-0 mainGrid">
                                <?php
                                $get_data = $_COOKIE["category_num"];
                                $query = Database::search("SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `category_cat_id` = '" . $get_data . "'");
                                $num = $query->num_rows;
                                if ($num > 0) {
                                    for ($i = 0; $i < $num; $i++) {
                                        $data5 = $query->fetch_assoc();
                                ?>
                                        <div onclick="getIndex(<?php echo $data5['id']; ?>);" style="cursor: pointer; text-decoration: none; background-color: #ffffff; width: 100%; border-radius: 8px;" class="polaroid">
                                            <div style="width: 100%; border-radius: 8px;">
                                                <div style="width: 100%; border-radius: 8px 8px 0 0;" class="p-0 m-0">
                                                    <img src="<?php echo $data5["img_path"] ?>" style="width: 100%; object-fit: cover; border-radius: 8px 8px 0 0;" class="p-0 m-0 imgOpt">
                                                </div>
                                                <div class="mt-1 ms-2 mb-2 titleDiv">
                                                    <p class="titleText"><?php echo $data5["title"] ?></p>
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
                                                    <p class="priceText"><?php echo $formattedPrice; ?></p>
                                                </div>
                                                <?php
                                                if ($data5["discount"] > 0) {
                                                ?>
                                                    <div class="ms-2 dicDiv d-flex align-items-center justify-content-between" style="margin-top: -10px;">
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
                                                    <div class="ms-2" style="margin-top: -10px;">
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
                                    <div class="col-12 bg-white rounded-3 position-absolute d-flex align-items-center justify-content-center
                                    " style="height: 200px;">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fa-solid fa-magnifying-glass fs-2 mb-3"></i>
                                            <span style="font-size: 18px; font-weight: 600;">Search No Results</span>
                                            <span style="font-size: 13px; color: #777777;">We`re sorry, we cannot find any matches for your search term</span>
                                        </div>
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
    </div>

  
   

    <script src="./product-list.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>