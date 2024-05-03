<?php
include "./connection.php";
session_start();

$img1 = $_FILES["img1"];
$img2 = $_FILES["img2"];
$img3 = $_FILES["img3"];
$img4 = $_FILES["img4"];
$img5 = $_FILES["img5"];

echo $img1;
echo $img2;
echo $img3;
echo $img4;
echo $img5;

?>