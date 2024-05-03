<?php
session_start();

setcookie("email", "", -1);
setcookie("name", "", -1);
setcookie("alert", "", -1);

echo "success";


?>