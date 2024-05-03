<?php
include "./connection.php";
session_start();

$id = $_GET["x"];

setcookie("category_num", $id, time() + (60 * 60 * 24 * 365 * 10));

echo "success";
