<?php
include "./connection.php";
session_start();
$get_data = $_COOKIE["category_num"];

$min = $_POST["min"];
$max = $_POST["max"];

$query = "SELECT * FROM product JOIN product_img ON id=product_id JOIN indeximage ON product_img.img_path=indeximage.product_img_path WHERE `category_cat_id` = '" . $get_data . "'";

if (!empty($min) && !empty($max)) {
    $query .= " AND `current_price` BETWEEN '" . $min . "' AND '" . $max . "'";
}

if (!empty($min) && empty($max)) {
    $query .= " AND `current_price` >= '" . $min . "'";
}

if (empty($min) && !empty($max)) {
    $query .= " AND `current_price` <= '" . $max . "'";
}

?>

<!-- <div class="col-12 rounded-3 mt-3 p-0"> -->
<div class="rounded-3 col-12 p-0 mainGrid">
    <?php
    $query = Database::search($query);
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
<!-- </div> -->