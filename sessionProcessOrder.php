<?php
session_start();
if (isset($_COOKIE["name"])) {
    echo "success";
} else {
    setcookie("myOrder", true, time() + (60 * 60 * 24));
    // echo "no";
}
