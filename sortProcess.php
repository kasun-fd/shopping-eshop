<?php
require "./connection.php";
session_start();
$email = $_COOKIE["emailSeller"];

$search = $_POST["search"];
$min = $_POST["min"];
$max = $_POST["max"];
$date = $_POST["date"];
$condition = $_POST["condition"];
$qty = $_POST["qty"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $email . "'";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%'";
}


if (!empty($min) && !empty($max)) {
    $query .= " AND `current_price` BETWEEN '" . $min . "' AND '" . $max . "'";
}

if (!empty($min) && empty($max)) {
    $query .= " AND `current_price` >= '" . $min . "'";
}

if (empty($min) && !empty($max)) {
    $query .= " AND `current_price` <= '" . $max . "'";
}




if ($condition != "0") {
    $query .= " AND `condition_condition_id`='" . $condition . "'";
}

if ($date != "0") {
    if ($date == "1") {
        $query .= " ORDER BY `id` DESC";
    } else if ($date == "2") {
        $query .= " ORDER BY `id` ASC";
    }
}

if ($date != "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " , `qty` DESC";
    } else if ($qty == "2") {
        $query .= " , `qty` ASC";
    }
} else if ($date == "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
}

?>

<div class="col-12 text-center mt-3">
    <div class="row justify-content-center" style="gap: 20px;">

        <?php

        if ("0" != ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 10;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . " ");

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
                        if($newPrice < 0){
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
                        <button class="col-12 btn-update" onclick="sendid(<?php echo $selected_data['id']; ?>);" style="border: none; border-radius: 8px; font-weight: 600; font-size: 14px;">Update</button>
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
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort1(<?php echo ($pageno - 1); ?>);" ; <?php
                                                                                        } ?> aria-label="Previous">
                    <span aria-hidden="true"><i class="fa-solid fa-angles-left" style="color: #a938ff;"></i></span>
                </a>
            </li>

            <?php
            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="sort1(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="sort1(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }
            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort1(<?php echo ($pageno + 1); ?>);" ; <?php
                                                                                        } ?> aria-label="Next">
                    <span aria-hidden="true"><i class="fa-solid fa-angles-right" style="color: #a938ff;"></i></span>
                </a>
            </li>
        </ul>
    </nav>
</div>