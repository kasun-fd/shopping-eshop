<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Order Successfully</title>
    <link rel="stylesheet" href="./orderSuccess.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #F5F5F5;">
    <div class="d-none d-md-block">
        <div class="col-12 d-flex align-items-start justify-content-center pt-3">
            <div class="bg-white col-10 rounded-4 pb-4">
                <div id="contentBox">
                    <div class="col-12 d-flex align-items-center justify-content-center mt-4" style="color: #4caf50; font-size: 30px;"><i class="fa-regular fa-circle-check" style="color: #4caf50;"></i>&nbsp;Thank you for your purchase!</div>
                    <div class="col-12 d-flex align-items-center justify-content-center mt-4" style="font-size: 13px;">Your order ID&nbsp;<span style="color: #4285F4;"><?php echo $_SESSION["k"]; ?></span></div>
                    <div class="col-12 d-flex align-items-center justify-content-center mt-5 ">
                        <div class="col-8 d-flex align-items-center justify-content-between">
                            <div class="col-6">Get By</div>
                            <i class="fa-solid fa-download me-2 fs-5" style="cursor: pointer; color: #31363F;" onclick="window.print();"></i>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-start justify-content-center mt-3">
                        <div class="col-8 rounded-3 border d-flex flex-column">
                            <?php

                            include "./connection.php";

                            $query = Database::search("SELECT * FROM `order` WHERE `generated_id` = '" . $_SESSION["k"] . "'");
                            $num = $query->num_rows;
                            for ($i = 0; $i < $num; $i++) {
                                $data = $query->fetch_assoc();
                                $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON img_path = product_img_path WHERE `product_id` = '" . $data["product_id"] . "'");
                                $data_img = $query_img->fetch_assoc();
                            ?>
                                <div class="col-12 d-flex p-2">
                                    <div class="col-6 p-2 border-bottom">
                                        <img src="<?php echo $data_img["product_img_path"]; ?>" class="rounded-3 mb-2" style="height: 90px; width: 90px;" alt="">
                                    </div>
                                    <div class="col-6 border-bottom d-flex align-items-center justify-content-end pe-2" style="font-size: 13px;">Est: <?php echo $data["date_time"]; ?></div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col-12 ps-2 pe-2 pb-3 pt-2 d-lg-flex justify-content-between align-items-center" style="font-size: 13px;">
                                <div>To track the delivery of your order, go to <b>My Account</b> > <b>My Order</b></div>
                                <button class="ps-2 pe-2 pt-1 pb-1 rounded-1 mt-md-3 mt-lg-0" style="border: 1.5px solid #1B9CB7; background-color: transparent; color: #1B9CB7;" onclick="goToOrderPageFromParchase();">View Order</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-column align-items-center justify-content-center mt-5">
                        <div class="col-8 d-flex align-items-center justify-content-between rounded-3 p-3" style="background-color: #F9F9FB;">
                            <div class="col-6" style="font-size: 16px; font-weight: 500;">Order Summary</div>
                            <?php
                            $formattedPrice = "LKR " . number_format($_SESSION["o"], 2, '.', ',');
                            ?>
                            <div class="col-6 d-flex justify-content-end" style="color: #A938FF; font-size: 17px;"><?php echo $formattedPrice; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mt-4">
                    <div class="col-8 d-flex align-items-center justify-content-center">
                        <button class="p-3 rounded-3" style="border: none; background-color: #A938FF; color: white;" onclick="goToIndexPageFromParchase();">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-block d-md-none">
        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-10 bg-white d-flex flex-column justify-content-center align-items-center rounded-3 p-3">
                <div id="printableContent">
                    <div class="col-12">
                        <div class="col-12 d-flex align-items-center justify-content-center mt-3 paymentText" style="color: #4caf50;"><i class="fa-regular fa-circle-check" style="color: #4caf50;"></i>&nbsp;Thank you for your purchase!</div>
                        <div class="col-12 d-flex align-items-center justify-content-center mt-3 nextText">Your order ID&nbsp;<span style="color: #4285F4;"><?php echo $_SESSION["k"]; ?></span></div>
                    </div>
                    <div class="col-12 border mt-3 d-flex flex-column rounded-3 pb-0">
                        <?php
                        $query = Database::search("SELECT * FROM `order` WHERE `generated_id` = '" . $_SESSION["k"] . "'");
                        $num = $query->num_rows;
                        for ($i = 0; $i < $num; $i++) {
                            $data = $query->fetch_assoc();
                            $query_img = Database::search("SELECT * FROM product_img JOIN indexImage ON img_path = product_img_path WHERE `product_id` = '" . $data["product_id"] . "'");
                            $data_img = $query_img->fetch_assoc();
                        ?>
                            <div class="col-12 d-flex p-2 pb-0">
                                <div class="col-4 d-flex justify-content-start pb-2 border-bottom">
                                    <img src="<?php echo $data_img["product_img_path"]; ?>" class="rounded-3" style="height: 15vw; width: 15vw;" alt="">
                                </div>
                                <div class="col-8 d-flex justify-content-end border-bottom pb-2 align-items-center pe-2" style="font-size: 3vw;">
                                    <?php echo $data["date_time"]; ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-12 d-flex flex-column p-2 pb-0">
                            <div class="col-12 d-flex justify-content-start pb-2">
                                <div style="font-size: 3vw; text-align: justify;" class="p-2">To track the delivery of your order, go to <b>My Account</b> > <b>My Order</b></div>
                            </div>
                            <div class="col-12 d-flex justify-content-end pb-2 align-items-center pe-2 mt-2 mb-2" style="font-size: 3vw;">
                                <button class="ps-2 pe-2 pt-1 pb-1 rounded-1 mt-md-3 mt-lg-0 me-2" style="border: 1.5px solid #1B9CB7; background-color: transparent; color: #1B9CB7;" onclick="goToOrderPageFromParchase();">View Order</button>
                                <button class="ps-2 pe-2 pt-1 pb-1 rounded-1 mt-md-3 mt-lg-0" style="border: 1.5px solid black; background-color: transparent; color: black;" onclick="getPrint();"><i class="fa-solid fa-download"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-between rounded-3 p-2 mt-4" style="background-color: #F9F9FB;">
                        <div class="col-6" style="font-size: 3.5vw; font-weight: 500;">Order Summary</div>
                        <div class="col-6 d-flex justify-content-end" style="color: #A938FF; font-size: 3.5vw; font-weight: 600;"><?php echo $formattedPrice; ?></div>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mt-4">
                    <button class="p-2 rounded-3" style="border: none; background-color: #A938FF; color: white; font-size: 4vw; font-weight: 500;" onclick="goToIndexPageFromParchase();">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.0.0-rc.5/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>