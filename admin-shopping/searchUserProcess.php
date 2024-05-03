<?php
include "./connection.php";

$text = $_GET["text"];

$query = Database::search("SELECT * FROM user WHERE fname LIKE '$text%' ORDER BY `joined_date` DESC");
$num_1 = $query->num_rows;
$query_2 = Database::search("SELECT * FROM user WHERE lname LIKE '$text%' ORDER BY `joined_date` DESC");
$num_2 = $query_2->num_rows;
$query_3 = Database::search("SELECT * FROM user WHERE email LIKE '$text%' ORDER BY `joined_date` DESC");
$num_3 = $query_3->num_rows;
if ($num_1 > 0) {
?>
    <?php
    $query_User = Database::search("SELECT * FROM user WHERE fname LIKE '$text%' ORDER BY `joined_date` DESC");
    $num_User = $query_User->num_rows;
    if ($num_User > 0) {
        for ($i = 0; $i < $num_User; $i++) {
            $data_User = $query_User->fetch_assoc();
            $query_order = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $data_User["email"] . "'");
            $num_order = $query_order->num_rows;
            $data_order = $query_order->fetch_assoc();
    ?>
            <tr>

                <td class="d-grid">
                    <?php echo $data_User["fname"]; ?>&nbsp;<?php echo $data_User["lname"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["email"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["mobile"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $num_order; ?>
                </td>

                <td> <?php echo $data_User["joined_date"]; ?> </td>

                <?php
                if ($data_User["block_status_user"] == 1) {
                ?>
                    <td>
                        <div onclick="unBlockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                    </td>
                <?php
                } else {
                ?>
                    <td>
                        <div onclick="blockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                    </td>

                <?php
                }
                ?>


            </tr>
    <?php
        }
    }
    ?>
<?php
} else if ($num_2 > 0) {
?>
    <?php
    $query_User = Database::search("SELECT * FROM user WHERE lname LIKE '$text%' ORDER BY `joined_date` DESC");
    $num_User = $query_User->num_rows;
    if ($num_User > 0) {
        for ($i = 0; $i < $num_User; $i++) {
            $data_User = $query_User->fetch_assoc();
            $query_order = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $data_User["email"] . "'");
            $num_order = $query_order->num_rows;
            $data_order = $query_order->fetch_assoc();
    ?>
            <tr>

                <td class="d-grid">
                    <?php echo $data_User["fname"]; ?>&nbsp;<?php echo $data_User["lname"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["email"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["mobile"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $num_order; ?>
                </td>

                <td> <?php echo $data_User["joined_date"]; ?> </td>

                <?php
                if ($data_User["block_status_user"] == 1) {
                ?>
                    <td>
                        <div onclick="unBlockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                    </td>
                <?php
                } else {
                ?>
                    <td>
                        <div onclick="blockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                    </td>

                <?php
                }
                ?>


            </tr>
    <?php
        }
    }
    ?>
<?php
} else if ($num_3 > 0) {
?>
    <?php
    $query_User = Database::search("SELECT * FROM user WHERE email LIKE '$text%' ORDER BY `joined_date` DESC");
    $num_User = $query_User->num_rows;
    if ($num_User > 0) {
        for ($i = 0; $i < $num_User; $i++) {
            $data_User = $query_User->fetch_assoc();
            $query_order = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $data_User["email"] . "'");
            $num_order = $query_order->num_rows;
            $data_order = $query_order->fetch_assoc();
    ?>
            <tr>

                <td class="d-grid">
                    <?php echo $data_User["fname"]; ?>&nbsp;<?php echo $data_User["lname"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["email"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $data_User["mobile"]; ?>
                </td>
                <td class="d-grid">
                    <?php echo $num_order; ?>
                </td>

                <td> <?php echo $data_User["joined_date"]; ?> </td>

                <?php
                if ($data_User["block_status_user"] == 1) {
                ?>
                    <td>
                        <div onclick="unBlockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                    </td>
                <?php
                } else {
                ?>
                    <td>
                        <div onclick="blockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                    </td>

                <?php
                }
                ?>


            </tr>
    <?php
        }
    }
    ?>
<?php
} else {
?>
    <div class="d-flex align-items-center justify-content-center position-absolute col-11" style="height: 400px;">
        <span class="ms-2">Search Result Not Found!</span>
    </div>
<?php
}

?>