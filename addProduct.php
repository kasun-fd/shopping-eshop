<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Add Products</title>
    <link rel="stylesheet" href="./addProduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    session_start();
    if (isset($_COOKIE["sellerName"])) {
        $email = $_COOKIE["emailSeller"];
        require "./connection.php";
    ?>

        <div class="col-12 d-none d-md-block mb-2 m-0 p-0 shadow-sm" style="height: 70px; position: sticky; top: 0; z-index: 9999;">
            <div class="col-12 d-flex align-items-center justify-content-center bg-dark h-100 p-0 m-0">

                <div class="col-md-8 col-lg-8 h-100 d-flex align-items-center justify-content-start" style="font-size: 30px; font-weight: 600; color: #FFF7F1; gap: 20px;">
                    <a href="./becomeASeller.php" class="text-decoration-none" style="border: none;"><i class="fa-solid fa-circle-chevron-left" style="color: #a938ff; font-size: 45px;"></i></a>
                    <span style="margin-top: -5px;">Add Product</span>
                </div>
                <div class="col-md-4 col-lg-4 d-flex align-items-center justify-content-end h-100">

                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <?php

                        ?>
                    </div>

                    <?php
                    if (isset($_COOKIE["sellerName"])) {
                        $data = $_COOKIE["sellerName"];
                        $query = Database::search("SELECT `gender_gender_id` FROM `seller` WHERE `user_name` = '" . $data . "'");
                        $d = $query->fetch_assoc();

                        if ($d["gender_gender_id"] == 1) {
                    ?>
                            <img src="./avatar/avatarBoy.jpg" class="rounded-circle" style="margin-right: 5px; height: 60px; border: 3px solid #a938ff; padding: 2px; margin-left: 5px; object-fit: cover;" loading="lazy" alt="...">
                        <?php

                        } else {
                        ?>
                            <img src="./avatar/avatarGirl.jpg" class="rounded-circle" style="margin-right: 5px; height: 60px; border: 3px solid #a938ff; padding: 2px; margin-left: 5px; object-fit: cover;" loading="lazy" alt="...">
                    <?php
                        }
                    } else {
                        header("Location: becomeASellerLoginLogin.php");
                    }
                    ?>

                </div>
            </div>
        </div>

        <!-- ================================ add product =================================-->

        <div style="width: 100%; display: flex; align-items: center; justify-content: center; z-index: 999999;">
            <div style="display: none;" id="addProductDiv">
                <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                    <div class="alert alert-dismissible" role="alert" style="border-radius: 8px; z-index: 999999; background-color: #f0a8ae; position: fixed; width: 350px; height: 50px; right: 10px; top: 75px; display: flex; align-items: center; justify-content: center;">
                        <span class="material-symbols-outlined me-2 fs-1" style="text-align: center;">
                            report
                        </span>
                        &nbsp;<span style="font-size: 14px; font-weight: 600; margin-top: 0.2vw; text-align: center;" id="addProduct"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex mb-5">
            <div class="col-6 pt-2">
                <div class="border p-3" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">General Information</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="title" style="color: #8b8b8b; font-size: 13px;">Product Title</label>
                            <textarea class="p-2" style="border-radius: 8px; border: 1px solid #8b8b8b;" id="title" cols="30" rows="3"></textarea>
                        </div>
                        <div class="col-12 d-flex flex-column p-0 mb-3">
                            <label for="description" style="color: #8b8b8b; font-size: 13px;">Description</label>
                            <textarea class="p-2" style="border-radius: 8px; border: 1px solid #8b8b8b;" id="description" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Pricing</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="price" style="color: #8b8b8b; font-size: 13px;">Base Price</label>
                            <input type="text" class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b;" id="price" placeholder="ex: 25000">
                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <div class="col-12 d-flex align-items-center justify-content-between p-0">
                        <h5 class="mt-2">Discount</h5>
                        <span style="font-size: 13px; font-weight: 600; background-color: #212529; border-radius: 8px; color: #f5f5f5;" class="p-2">OPTIONAL</span>
                    </div>

                    <div class="col-12 p-0 mt-3 gap-2">
                        <div class="col-12  d-flex flex-column p-0 mb-3">
                            <label for="discount" style="color: #8b8b8b; font-size: 13px;">Discount Precentage (%)</label>
                            <input onclick="openDisType();" type="text" class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b;" id="discount" placeholder="ex: 25">
                        </div>
                        <div class="border border-2 mt-2 p-3 d-flex flex-column" style="border-radius: 8px;">
                            <p style="font-size: 14px; font-weight: 600; text-align: center;" class="mb-1">You can add a discount at a future date as well.</p>
                        </div>
                        <div class="d-none" id="disType">
                            <div class="col-12  d-flex flex-column mt-4 mb-2 p-0">
                                <label for="category" style="color: #8b8b8b; font-size: 13px;">Discount Type</label>
                                <select class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b; font-size: 13px; font-weight: 500; color: #8b8b8b;" id="discount_type">
                                    <option value="0">Select Discount Type</option>
                                    <?php
                                    $discount_type = Database::search("SELECT * FROM `discount_type`");
                                    $discount_num = $discount_type->num_rows;

                                    for ($x = 0; $x < $discount_num; $x++) {
                                        $discount_data = $discount_type->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $discount_data["id"]; ?>">
                                            <?php echo $discount_data["type"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="border border-2 mt-2 p-3 d-flex flex-column" style="border-radius: 8px;">
                            <p style="font-size: 14px; font-weight: 600; text-align: center;" class="mb-1">[ OPTIONAL ]&nbsp;&nbsp;&nbsp;If you choose a discount type, we get a <b>5% discount on each product</b>.</p>
                        </div>
                        </div>
                        
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Inventory</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="qty" style="color: #8b8b8b; font-size: 13px;">Quantity</label>
                            <input type="text" class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b;" id="qty" placeholder="ex: 50">
                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Condition</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex align-items-center justify-content-start mb-2 p-0">

                            <input type="radio" name="radio" id="condition1" class="me-2" checked>
                            <label for="condition1" class="me-5 mt-2" style="font-size: 15px; font-weight: 600;">Brand New</label>

                            <input type="radio" name="radio" id="condition2" class="me-2">
                            <label for="condition2" class="mt-2" style="font-size: 15px; font-weight: 600;">Used</label>

                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Notice</h5>
                    <div class="col-12 p-0 mt-3">
                        <span style="font-size: 16px; font-weight: 400;">We take 5% of the price from each product as a service fee.</span>
                    </div>
                </div>
            </div>

            <!-- ============================= right side =============================-->

            <style>
                @media (min-width: 992px) {
                    .productImage {
                        height: 11vw;
                        border-radius: 8px;
                        object-fit: cover;
                    }
                }

                @media (max-width: 992px) {
                    .productImage {
                        height: 9vw;
                        border-radius: 8px;
                        object-fit: cover;
                    }
                }
            </style>
            <div class="col-6 pt-2">
                <div class="border p-3" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Product Media</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="image" style="color: #8b8b8b; font-size: 13px;">Photo Product</label>
                            <div id="image" class="ps-3 pe-3 pt-2 pb-2 d-flex align-items-center justify-content-center" style="width: 100%; border-radius: 8px; border: 1px dashed #8b8b8b; gap: 5px;">
                                <img class="productImage" src="./resource/addProduct/addproductimg.svg" style="width: 25%;" id="i0">
                                <img class="productImage" src="./resource/addProduct/addproductimg.svg" style="width: 25%;" id="i1">
                                <img class="productImage" src="./resource/addProduct/addproductimg.svg" style="width: 25%;" id="i2">
                                <img class="productImage" src="./resource/addProduct/addproductimg.svg" style="width: 25%;" id="i3">
                            </div>
                            <div class="border border-2 mt-2 p-3 d-flex flex-column" style="border-radius: 8px;">
                                <p style="font-size: 14px; font-weight: 600; text-align: center;" class="mb-1">Accepted image types</p>
                                <p style="font-size: 14px; font-weight: 600; text-align: center;" class="mb-1"><b>( PNG , JPEG , JPG , SVG )</b></p>
                            </div>
                            <div class="col-12 mt-2 d-flex align-items-center justify-content-center">

                                <input type="file" class="d-none" id="imgChooser" onclick="imgChooser();" accept="image/jpeg,image/png,image/jpg,image/svg+xml" multiple>
                                <label for="imgChooser" onclick="changeProductImage();" style="border: none; border-radius: 8px; padding: 10px; font-size: 13px; font-weight: 600;" class="btn-btn">Upload Images</label>
                            </div>
                            <div class="d-none" id="imgDiv2">
                                <div class="col-12 mt-2 d-flex flex-column align-items-center justify-content-center pt-2 pb-2" style="border-radius: 8px; background-color: #ede4ff;">
                                    <p style="font-size: 15px; font-weight: 600; text-align: center;">What image would you like to see first?</p>
                                    <div class="col-12 d-flex align-items-center justify-content-center p-0">
                                        <div class="col-12 row p-0 m-0 justify-content-center">

                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio1" id="r21">
                                                <label for="r21" style="margin-top: 5px; font-size: 13px; font-weight: bold;">1st Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio1" id="r22">
                                                <label for="r22" style="margin-top: 5px; font-size: 13px; font-weight: bold;">2nd Image</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="imgDiv3">
                                <div class="col-12 mt-2 d-flex flex-column align-items-center justify-content-center pt-2 pb-2" style="border-radius: 8px; background-color: #ede4ff;">
                                    <p style="font-size: 15px; font-weight: 600; text-align: center;">What image would you like to see first?</p>
                                    <div class="col-12 d-flex align-items-center justify-content-center p-0">
                                        <div class="col-12 row p-0 m-0 justify-content-center">

                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio2" id="r31">
                                                <label for="r31" style="margin-top: 5px; font-size: 13px; font-weight: bold;">1st Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio2" id="r32">
                                                <label for="r32" style="margin-top: 5px; font-size: 13px; font-weight: bold;">2nd Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio2" id="r33">
                                                <label for="r33" style="margin-top: 5px; font-size: 13px; font-weight: bold;">3rd Image</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="imgDiv4">
                                <div class="col-12 mt-2 d-flex flex-column align-items-center justify-content-center pt-2 pb-2" style="border-radius: 8px; background-color: #ede4ff;">
                                    <p style="font-size: 15px; font-weight: 600; text-align: center;">What image would you like to see first?</p>
                                    <div class="col-12 d-flex align-items-center justify-content-center p-0">
                                        <div class="col-12 row p-0 m-0 justify-content-center">

                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio3" id="r41">
                                                <label for="r41" style="margin-top: 5px; font-size: 13px; font-weight: bold;">1st Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio3" id="r42">
                                                <label for="r42" style="margin-top: 5px; font-size: 13px; font-weight: bold;">2nd Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio3" id="r43">
                                                <label for="r43" style="margin-top: 5px; font-size: 13px; font-weight: bold;">3rd Image</label>
                                            </div>


                                            <div class=" col-md-6 col-lg-3 d-flex align-items-center justify-content-center gap-2">
                                                <input type="radio" name="radio3" id="r44">
                                                <label for="r44" style="margin-top: 5px; font-size: 13px; font-weight: bold;">4th Image</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Category Information</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="category" style="color: #8b8b8b; font-size: 13px;">Category</label>
                            <select class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b; font-size: 13px; font-weight: 500;" id="category">
                                <option value="0">Select Your Category</option>
                                <?php
                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $category_data["cat_id"]; ?>">
                                        <?php echo $category_data["cat_name"]; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-12 d-flex flex-column mb-2 p-0 mt-3">
                            <label for="brand" style="color: #8b8b8b; font-size: 13px;">Brand</label>
                            <input type="text" class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b;" id="brand" placeholder="ex: Apple">

                        </div>
                        <div class="col-12 d-flex flex-column mb-2 p-0 mt-3">
                            <label for="model" style="color: #8b8b8b; font-size: 13px;">Model</label>
                            <input type="text" class="p-2" style="border-radius: 8px; height: 40px; border: 1px solid #8b8b8b;" id="model" placeholder="ex: Apple 15 Pro">

                        </div>
                    </div>
                </div>
                <div class="border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <h5 class="mt-2">Options</h5>
                    <div class="col-12 p-0 mt-3">
                        <div class="col-12 d-flex flex-column mb-2 p-0">
                            <label for="color" style="color: #8b8b8b; font-size: 13px;">Options</label>
                            <textarea class="p-2" style="border-radius: 8px; border: 1px solid #8b8b8b;" id="color" id="" cols="30" rows="2"></textarea>
                            <div class="border border-2 mt-2 p-3 d-flex flex-column" style="border-radius: 8px;">
                                <p style="font-size: 14px; font-weight: 600; text-align: center;" class="mb-1">When you go to add options. After typing one option, you must <b>Insert A Comma</b> and then you can type another option.</p>
                                <p style="text-align: center; font-size: 12px; font-weight: 600;">Ex: Colors, Sizes and etc</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center border p-3 mt-4" style="border-radius: 8px; background-color: #f5f5f5;">
                    <button onclick="addProduct();" class="col-md-12 col-lg-10 btnAdd" style="height: 50px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600;">Save Product</button>
                </div>
            </div>

        </div>
    <?php
    } else {
        header("Location: becomeASellerLoginLogin.php");
    }
    ?>
    <script src="./addProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js"></script>
</body>

</html>