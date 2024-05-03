<?php
session_start();
setcookie("checkoutCart", false, time() - 1);

$qty = $_POST["qty"];
$id = $_POST["x"];
$option = $_POST["option"];

setcookie("qtySingle", $qty, time() + (60 * 60 * 24 * 365 * 10));
setcookie("pro_id", $id, time() + (60 * 60 * 24 * 365 * 10));
setcookie("option_checkout", $option, time() + (60 * 60 * 24 * 365 * 10));
echo "success";
