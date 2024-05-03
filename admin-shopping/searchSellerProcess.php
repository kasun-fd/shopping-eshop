<?php
include "./connection.php";

$text = $_GET["text"];

$query = Database::search("SELECT * FROM seller WHERE user_name LIKE '$text%' ORDER BY `joined_date` DESC");
$num_1 = $query->num_rows;
$query_2 = Database::search("SELECT * FROM seller WHERE full_name LIKE '$text%' ORDER BY `joined_date` DESC");
$num_2 = $query_2->num_rows;
if ($num_1 > 0) {
?>
    <?php
    $query_seller = Database::search("SELECT * FROM seller WHERE user_name LIKE '$text%' ORDER BY `joined_date` DESC");
    $num_seller = $query_seller->num_rows;
    for ($i = 0; $i < $num_seller; $i++) {
        $data_seller = $query_seller->fetch_assoc();
        $query_order = Database::search("SELECT * FROM seller JOIN product ON email = user_email JOIN `order` ON id = product_id WHERE `user_email` = '" . $data_seller["email"] . "'");
        $num_order = $query_order->num_rows;
        $data_order = $query_order->fetch_assoc();
    ?>
        <tr>

            <td class="d-grid">
                <p>
                    <?php echo $data_seller["full_name"]; ?>
                </p>
                <p><?php echo $data_seller["user_name"]; ?></p>
            </td>
            <td class="d-grid">
                <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                <p><?php echo $data_seller["nic"]; ?></p>
                <p style="color: #a7aabe;" id="getEmail"><?php echo $data_seller["email"]; ?></p>
                <p style="color: #a7aabe;"><?php echo $data_seller["mobile"]; ?></p>
            </td>
            <td class="d-grid">
                <p><?php echo $num_order; ?></p>
            </td>
            <td class="d-grid">
                <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                <p>p.b.s.n.p.fernando</p>
                <p style="color: #a7aabe;">8012733993</p>
                <p>Commerial Bank</p>
                <p>Ja ela</p>
            </td>
            <!-- <td>
                                  <?php
                                    if ($data_table_order["order_status_id"] == 1) {
                                    ?>
                                    <div class="badge badge-outline-danger">Processing</div>
                                  <?php
                                    } else if ($data_table_order["order_status_id"] == 2) {
                                    ?>
                                    <div class="badge badge-outline-warning">Shopping</div>
                                  <?php
                                    } else if ($data_table_order["order_status_id"] == 3) {
                                    ?>
                                    <div class="badge badge-outline-success">Shipped</div>
                                  <?php
                                    }
                                    ?>
                                 

                                </td> -->

            <td> <?php echo $data_seller["nic"]; ?> </td>
            <!-- <td> LKR 14,500000 </td> -->
            <!-- <td> Dashboard </td> -->
            <!-- <td> Credit card </td> -->

            <?php
            // from datetime import datetime;

            // Define the input datetime string
            // $datetime_str = $data_table_order["date_time"];

            // Parse the datetime string
            // $dt = datetime::createFromFormat('Y-m-d H:i:s', $datetime_str);

            // Set the desired format
            // $desired_format = "d M Y";

            // Format the datetime object
            // $formatted_date = $dt->format($desired_format);

            // Print the formatted date
            // echo $formatted_date;
            ?>


            <td> <?php echo $data_seller["mobile"]; ?> </td>


            <?php
            if ($data_seller["block_status"] == 1) {
            ?>
                <td>
                    <div onclick="unBlockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                </td>
            <?php
            } else {
            ?>
                <td>
                    <div onclick="blockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                </td>

            <?php
            }
            ?>


        </tr>
    <?php
    }

    ?>
<?php
} else if ($num_2 > 0) {
?>
    <?php
    $query_seller = Database::search("SELECT * FROM seller WHERE full_name LIKE '$text%' ORDER BY `joined_date` DESC");
    $num_seller = $query_seller->num_rows;
    for ($i = 0; $i < $num_seller; $i++) {
        $data_seller = $query_seller->fetch_assoc();
        $query_order = Database::search("SELECT * FROM seller JOIN product ON email = user_email JOIN `order` ON id = product_id WHERE `user_email` = '" . $data_seller["email"] . "'");
        $num_order = $query_order->num_rows;
        $data_order = $query_order->fetch_assoc();
    ?>
        <tr>

            <td class="d-grid">
                <p>
                    <?php echo $data_seller["full_name"]; ?>
                </p>
                <p><?php echo $data_seller["user_name"]; ?></p>
            </td>
            <td class="d-grid">
                <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                <p><?php echo $data_seller["nic"]; ?></p>
                <p style="color: #a7aabe;" id="getEmail"><?php echo $data_seller["email"]; ?></p>
                <p style="color: #a7aabe;"><?php echo $data_seller["mobile"]; ?></p>
            </td>
            <td class="d-grid">
                <p><?php echo $num_order; ?></p>
            </td>
            <td class="d-grid">
                <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                <p>p.b.s.n.p.fernando</p>
                <p style="color: #a7aabe;">8012733993</p>
                <p>Commerial Bank</p>
                <p>Ja ela</p>
            </td>
            <!-- <td>
                                  <?php
                                    if ($data_table_order["order_status_id"] == 1) {
                                    ?>
                                    <div class="badge badge-outline-danger">Processing</div>
                                  <?php
                                    } else if ($data_table_order["order_status_id"] == 2) {
                                    ?>
                                    <div class="badge badge-outline-warning">Shopping</div>
                                  <?php
                                    } else if ($data_table_order["order_status_id"] == 3) {
                                    ?>
                                    <div class="badge badge-outline-success">Shipped</div>
                                  <?php
                                    }
                                    ?>
                                 

                                </td> -->

            <td> <?php echo $data_seller["nic"]; ?> </td>
            <!-- <td> LKR 14,500000 </td> -->
            <!-- <td> Dashboard </td> -->
            <!-- <td> Credit card </td> -->

            <?php
            // from datetime import datetime;

            // Define the input datetime string
            // $datetime_str = $data_table_order["date_time"];

            // Parse the datetime string
            // $dt = datetime::createFromFormat('Y-m-d H:i:s', $datetime_str);

            // Set the desired format
            // $desired_format = "d M Y";

            // Format the datetime object
            // $formatted_date = $dt->format($desired_format);

            // Print the formatted date
            // echo $formatted_date;
            ?>


            <td> <?php echo $data_seller["mobile"]; ?> </td>


            <?php
            if ($data_seller["block_status"] == 1) {
            ?>
                <td>
                    <div onclick="unBlockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                </td>
            <?php
            } else {
            ?>
                <td>
                    <div onclick="blockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                </td>

            <?php
            }
            ?>


        </tr>
    <?php
    }

    ?>
<?php
}else{
    ?>
    <div class="d-flex align-items-center justify-content-center position-absolute col-11" style="height: 400px;">
        <span class="ms-2">Search Result Not Found!</span>
    </div>
    <?php
}

?>