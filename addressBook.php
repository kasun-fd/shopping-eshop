<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Address Book</title>

    <!-- =============== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="./mobileProfileInfo.css">
    <link rel="stylesheet" href="./addressBook.css">

    <!-- =============== -->
</head>

<body class="textNotCopy">

    <?php
    session_start();
    if (isset($_COOKIE["name"])) {
        require "./connection.php";
    ?>
        <!-- ================================== ALERT start  ==================================-->
        <?php
        if (isset($_COOKIE["alert2"])) {
        ?>
            <div id="alertBodyMobile">
                <div class="box">
                    <div class="image"><img loading="lazy" src="./img/check.png"></div>
                    <p class="message">Successfully updated</p>
                </div>
            </div>

        <?php
        }
        if (isset($_COOKIE["alert3"])) {
        ?>
            <div id="alertBodyMobile">
                <div class="box">
                    <div class="image"><img loading="lazy" src="./img/check.png"></div>
                    <p class="message">Successfully Saved</p>
                </div>
            </div>

        <?php
        }
        ?>
        <!-- ================================== HEADER start ==================================-->

        <?php
        $email = $_COOKIE["email"];

        $address = Database::search("SELECT * FROM user_has_address JOIN city ON user_has_address.city_city_id=city.city_id JOIN district ON
        city.district_district_id=district.district_id JOIN province ON district.province_province_id=province.province_id WHERE
         `user_email` = '" . $email . "'");

        $address_details = $address->fetch_assoc();
        ?>


        <div class="HeaderMobileMain">
            <div class="HeaderMobileSub01">
                <a href="./mobileAccount.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
                <span class="HeaderMobileMainText">Address Book</span>
            </div>
            <div class="HeaderMobileSub02">
                <?php
                require "./MobileHeader.php";
                ?>
            </div>
        </div>


        <div class="col-12 d-flex align-items-start justify-content-center">
            <div class="col-11  mt-3 pb-3 mb-3 d-flex flex-column align-items-center justify-content-center" style="background-color: #ede4ff; border-radius:10px;">
                <?php
                $province_rs = Database::search("SELECT * FROM `province` ORDER BY province_name ASC");
                $district_rs = Database::search("SELECT * FROM `district` ORDER BY district_name ASC");
                $city_rs = Database::search("SELECT * FROM `city` ORDER BY city_name ASC");
                ?>

                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <span class="" style="font-size: 13px;">Province</span>
                    <select onkeypress="adressPress(event);" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" class="col-12 ps-1" id="province">
                        <option value="0">Select Your Province</option>
                        <?php
                        for ($x = 0; $x < $province_rs->num_rows; $x++) {
                            $province_data = $province_rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                            if (!empty($address_details["province_id"])) {
                                                                                                if ($province_data["province_id"] == $address_details["province_id"]) {
                                                                                            ?>selected<?php
                                                                                                    }
                                                                                                }
                                                                                                        ?>>
                                <?php echo $province_data["province_name"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <span class="" style="font-size: 13px;">District</span>
                    <select onkeypress="adressPress(event);" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" class="col-12 ps-1" id="district">
                        <option value="0">Select Your District</option>
                        <?php
                        for ($x = 0; $x < $district_rs->num_rows; $x++) {
                            $district_data = $district_rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                            if (!empty($address_details["district_id"])) {
                                                                                                if ($district_data["district_id"] == $address_details["district_id"]) {
                                                                                            ?>selected<?php
                                                                                                    }
                                                                                                }
                                                                                                        ?>>
                                <?php echo $district_data["district_name"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <span class="" style="font-size: 13px;">City</span>
                    <select onkeypress="adressPress(event);" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" class="col-12 ps-1" id="city">
                        <option value="0">Select Your City</option>
                        <?php
                        for ($x = 0; $x < $city_rs->num_rows; $x++) {
                            $city_data = $city_rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $city_data["city_id"]; ?>" <?php
                                                                                    if (!empty($address_details["city_id"])) {
                                                                                        if ($city_data["city_id"] == $address_details["city_id"]) {
                                                                                    ?>selected<?php
                                                                                            }
                                                                                        }
                                                                                                ?>>
                                <?php echo $city_data["city_name"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-11">
                    <hr>
                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-4">
                    <span class="" style="font-size: 13px;">Address Line 01</span>
                    <?php
                    if (isset($address_details["line1"])) {
                    ?>
                        <input type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" onkeypress="adressPress(event);" class="col-12 ps-2" id="line01" value="<?php echo $address_details["line1"] ?>">
                    <?php
                    } else {
                    ?>
                        <input type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" onkeypress="adressPress(event);" class="col-12 ps-2" id="line01">
                    <?php
                    }
                    ?>
                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <span class="" style="font-size: 13px;">Address Line 02</span>
                    <?php
                    if (isset($address_details["line2"])) {
                    ?>
                        <input type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" onkeypress="adressPress(event);" class="col-12 ps-2" id="line02" value="<?php echo $address_details["line2"] ?>">
                    <?php
                    } else {
                    ?>
                        <input type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" onkeypress="adressPress(event);" class="col-12 ps-2" id="line02">
                    <?php
                    }
                    ?>


                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <span class="" style="font-size: 13px;">Postal Code</span>
                    <?php
                    if (isset($address_details["postal_code"])) {
                    ?>
                        <input onkeypress="adressPress(event);" type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" class="col-12 ps-2" id="pcode" value="<?php echo $address_details["postal_code"] ?>">
                    <?php
                    } else {
                    ?>
                        <input onkeypress="adressPress(event);" type="text" style="height: 45px; border: 1px solid #9b12ff; border-radius: 8px; font-size: 14px;" class="col-12 ps-2" id="pcode">
                    <?php
                    }
                    ?>


                </div>
                <div class="col-11 d-flex flex-column align-items-start justify-content-start mt-3">
                    <button class="col-12 saveAddressInfo" onclick="saveAddressInfo();">Save</button>
                </div>
            </div>
        </div>

        <!-- ============================== alert address Update =========================-->
        <div class="d-none" id="msgDivAddress">
            <div style="width: 100%; position: fixed; left: 0;  top: 0; display: flex; align-items: center; justify-content: center; z-index: 9999;">
                <div class="alert" style="background-color: #f0a8ae; width: 400px; height: 50px; border-radius: 10px;
                    display: flex; align-items: center; justify-content: center;" role="alert">
                    <span class="material-symbols-outlined">
                        report
                    </span>
                    &nbsp;
                    <span style="font-size: 13px; font-weight: 600; text-align: center;" id="msgAddress"></span>
                </div>

            </div>
        </div>

        
    <?php
    } else {
        header("Location: login.php");
    }
    ?>



    <script src="./addressBook.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>

</html>