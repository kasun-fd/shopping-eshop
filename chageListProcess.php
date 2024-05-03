<?php
include "./connection.php";
session_start();
$email = $_COOKIE["email"];

$list = $_POST["list"];

// Get current date and time
$currentTime = new DateTime();

// Calculate 5 days before


// Format and print the result
// echo $fiveDaysBefore->format('Y-m-d H:i:s');


$query_one = "SELECT * FROM `order` WHERE `customer_email` = '".$email."' ";
if($list == "5"){
    $query_one .= " ORDER BY `id_order` DESC LIMIT 5";
} else if ($list == "15") {
    $fiveDaysBefore = $currentTime->sub(new DateInterval('P5D'));
    $query_one .= "AND `date_time` >= '" . $fiveDaysBefore->format('Y-m-d H:i:s') . "' ORDER BY `id_order` DESC";
} else if ($list == "30") {
    $fiveDaysBefore30 = $currentTime->sub(new DateInterval('P30D'));
    $query_one .= "AND `date_time` >= '" . $fiveDaysBefore30->format('Y-m-d H:i:s') . "' ORDER BY `id_order` DESC";
} else if ($list == "all") {
    $query_one .= " ORDER BY `id_order` DESC";
} else {
    $query_one .= " ORDER BY `id_order` DESC LIMIT 5";
}

?>

<?php
$query = Database::search($query_one);
$num_order = $query->num_rows;
for ($i = 0; $i < $num_order; $i++) {
    $data_order = $query->fetch_assoc();
    $query_status = Database::search("SELECT * FROM order_status WHERE `id` = '" . $data_order["order_status_id"] . "'");
    $data_status = $query_status->fetch_assoc();
    $query_product = Database::search("SELECT * FROM product WHERE `id` = '" . $data_order["product_id"] . "'");
    $data_product = $query_product->fetch_assoc();
    $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON img_path = product_img_path WHERE `product_id` = '" . $data_order["product_id"] . "'");
    $data_img = $query_img->fetch_assoc();
    $query_seller = Database::search("SELECT * FROM seller WHERE `email` = '" . $data_product["user_email"] . "'");
    $data_seller = $query_seller->fetch_assoc();

?>
    <div class="col-12 bg-white mt-3 pt-1 pb-3" style="border-radius: 8px;">
        <div class="col-12 p-0 d-flex border-bottom" style="height: 40px;">
            <div class="col-6 d-flex flex-column">
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
            <a href="https://wa.me/<?php echo $formattedNumber; ?>" target="_blank" class="col-6 d-flex align-items-center justify-content-end text-decoration-none">

                <span class="material-symbols-outlined fs-2" style="color: #a938ff;">
                    forum
                </span>

                <span style="font-size: 12px; font-weight: 600; color: #a938ff;">&nbsp;Chat with seller</span>
            </a>
        </div>
        <div class="col-12 mt-2 d-flex p-0" style="height: 100px;">
            <div class="col-9 p-0 d-flex align-items-center justify-content-start" style="width: 100%;">
                <div style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; margin-right: 13px;">
                    <img onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="cursor: pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 8px;" src="<?php echo $data_img["product_img_path"]; ?>" alt="">
                </div>

                <div class="d-flex flex-column titleOrder" style="gap: px;">
                    <div onclick="goToSimglePage(<?php echo $data_order['product_id']; ?>);" style="width: 100%; height: 40px; overflow: hidden; font-size: 12px; font-weight: 600; text-align: start; display: flex; align-items: start; justify-content: start; cursor: pointer;"><?php echo $data_product["title"]; ?></div>
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
            <div class="col-3 d-flex align-items-center justify-content-end p-0">
                <span class="ps-3 pe-3 pt-2 pb-2 rounded-3 d-flex align-items-center justify-content-center text-white me-1" style="font-size: 12px; font-weight: 600; background-color: #a938ff;"><?php echo $data_status["status_type"]; ?></span>
            </div>
        </div>
    </div>
<?php
}
?>