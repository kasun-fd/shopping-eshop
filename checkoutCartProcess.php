<?php
session_start();
setcookie("qtySingle", false, time() - 1);
setcookie("pro_id", false, time() - 1);
setcookie("option_checkout", false, time() - 1);
setcookie("checkoutCart", true, time() + (60 * 60 * 24 * 365 * 10));
echo "success";
