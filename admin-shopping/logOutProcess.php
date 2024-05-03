<?php
session_start();

setcookie("adminName",false, time() - 1);

echo "success";

?>