<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="./categoryListMobile.css">
</head>

<body id="bodyCategories" style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <!-- ================================== HEADER start ==================================-->

    <div class="HeaderMobileMain">
        <div class="HeaderMobileSub01">
            <a href="./index.php"><i class="fa-solid fa-chevron-left HeaderMobileBackIcon"></i></a>
            <span class="HeaderMobileMainText">Categories</span>
        </div>
        <div class="HeaderMobileSub02">
            <a href="./mobile_search.php"><i class="fa-solid fa-magnifying-glass HeaderMobileSearchIcon"></i></a>
            <a href="./cart.php"><i class="fa-solid fa-bag-shopping HeaderMobileCart"></i></a>
            <?php
            require "./MobileHeader.php";
            ?>
        </div>
    </div>

    <!-- ================================== HEADER end ==================================-->


    <!-- ====================================== CATEGORIES start ============================================ -->
    <div class="faq__accordian-main-wrapper" id="faq__accordian-main-wrapper">
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    devices_other
                </span><span class="iconAllCategories">Electronic Devices</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Mobile Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Audio</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Wearable</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Console Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Camera Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Computer Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Storage</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Printers</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Computer Components</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Network Components</a>
                </div>
            </div>
        </div>

        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    cable
                </span><span class="iconAllCategories">Electronic Accessories</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Mobiles</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Tablets</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Laptops</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Destops</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Gaming Consoles</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Cameras</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Refurbished Devices</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    kitchen
                </span><span class="iconAllCategories">TV & Home Appliances</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">TV & Video Devices</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Home Audio</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">TV Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Washing Machines</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Refrigerators</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Gas Burners</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Sewing Machine</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Kitchen Appliances</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Cooling & Heating</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Vacuums & Floor Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Irons</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    surgical
                </span><span class="iconAllCategories">Health & Beauty</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Bath & Body</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Beauty Tools</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Fragrances</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Hair Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Makeup</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Men`s Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Personal Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Skin Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Food Supplements</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Medical Supplies</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Sexual Wellness</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    toys
                </span><span class="iconAllCategories">Babies & Toys</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Baby Gear</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Baby Personal Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Maternity Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Baby Safety</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Baby Health Care</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Pacifier & Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Gifts</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Clothing & Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Diapering & Potty</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Feeding</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Nursery</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Baby & Toddler Toys</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"> <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    shopping_bag
                </span><span class="iconAllCategories">Groceries & Pets</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Beverages</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Breakfast, Choco & Snacks</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Food Staples</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Laundry & HouseHold</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Cat</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Dog</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Fresh Produce</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Fish</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">dMart</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    chair
                </span><span class="iconAllCategories">Home & Lifestyle</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Bath</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Bedding</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Decor</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Furniture</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Kitchen & Dining</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Lighting</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Laundry & Cleaning</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Tools, DIY & Outdoor</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Stationery & Craft</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Media, Music & Books</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Charity & Donation</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"> <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    woman
                </span><span class="iconAllCategories">Women`s Fashion</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Clothing</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">ccessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Lingerie, Sleep & Lounge</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Shoes</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Bags</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Girl`s Fashion</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    man
                </span><span class="iconAllCategories">Men`s Fashion</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" class="list-group-item list-group-item-action textChange">Clothing</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Men`s Bags</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Shoes</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Accessories</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Underwear</a>
                    <a href="#" class="list-group-item list-group-item-action textChange">Boy`s Fashion</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"> <span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    watch
                </span><span class="iconAllCategories">Watches & Accessories</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Men`s Watches</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Women`s Watches</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Unisex Watches</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Kid Watches</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Sunglasses</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Eyeglasses</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Men Fashion Jewellery</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Women Fashion Jewellery</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Jewellery</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    sports_soccer
                </span><span class="iconAllCategories">Sports & Outdoor</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Men Shoes & Clothing</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Women Shoes & Clothing</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Outdoor Recreation</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Exercide & Fitness</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Water Sport</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Boxing & Martial Arts</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Racket Sports</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Team Sports</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Water Bottles</a>
                </div>
            </div>
        </div>
        <div class="faq__accordion-wrapper">
            <a class="faq__accordian-heading" href="#"><span class="material-symbols-outlined rounded-circle position-absolute text-secondary iconCategories">
                    airport_shuttle
                </span><span class="iconAllCategories">Automotive & Motorbike</span></a>
            <div class="faq__accordion-content" style="display: none;">
                <div class="list-group textList">
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Automotive</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Motorcycle</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Three-wheeler</a>
                    <a href="#" type="button" class="list-group-item list-group-item-action textChange">Automobile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================================== CATEGORIES end ============================================ -->

    <br>

    

    <script src="./categoryListMobile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>