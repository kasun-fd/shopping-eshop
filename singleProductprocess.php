<?php
include "./generate_id.php";
session_start();
if (isset($_COOKIE["name"])) {
    $email = $_COOKIE["email"];
    include "./connection.php";

    $id = $_POST["x"];
    $qty = $_POST["qty"];
    $option = $_POST["option"];

    $query = Database::search("SELECT * FROM product WHERE `id` = '" . $id . "'");
    $num = $query->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $data = $query->fetch_assoc();

        // function generateID()
        // {
        //     // Use random_int for cryptographically secure random number generation
        //     $random_number = random_int(1000000000, 9999999999); // Generate a random 9-digit integer

        //     // Prepend "#" symbol
        //     return "#" . $random_number;
        // }

        // Example usage
        $id_gen = generateID();


        Database::iud("INSERT INTO cart(`qty_cart`,`option_qty`,`user_cart_email`,`product_id`,`generated_id`) VALUES ('" . $qty . "','" . $option . "','" . $email . "',
        '" . $id . "','" . $id_gen . "')");

        // $_SESSION["x"] = $id;

        echo "success";
    }
} else {
    setcookie("ridirect", true, time() + (60 * 60 * 24));
    echo "notSet";
}
