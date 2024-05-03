<?php
session_start();
setcookie("myOrder", true, time() + (60 * 60 * 24));
?>