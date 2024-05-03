<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .animate-me {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s ease-in-out;
        }

        .animate-me.animate-on-scroll {
            opacity: 1;
            transform: translateY(0);
        }

        .hidden-content {
            /* Optionally style the hidden content while waiting to load */
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .hidden-content.loaded {
            opacity: 1;
        }
    </style>

</head>

<body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <!-- Humberger Begin -->

    <div style="background-color: #ffffff; z-index: 99999;" class="position-sticky top-0">
        <!-- Header Section Begin -->
        <header class="header d-none d-md-block rounded" style="top: 0; display: flex; align-items: center; justify-content: center;">

            <div style="display: flex; align-items: center; justify-content: center;">

                <div style="width: 85vw; height: 1.5vw; display: flex; align-items: center; justify-content: end;">


                    <!-- <div class="container" style="height: 1.5vw; display: flex; align-items: start; justify-content: center; width: 85vw;">
            <div class="col-12" style="display: flex; align-items: center; justify-content: center; margin-top: 0.3vw;"> -->
                    <!-- <div class="container p-0" style="width: 83vw; height: 1.7vw; display: flex; align-items: center; justify-content: center;"> -->
                    <!-- <span class="text-lg-start text-success"><b>Hi </b></span> |
        <span class="text-lg-start fw-bold signout" onclick="signout();">Signout</span> | -->

                    <div style="display: flex; align-items: center; justify-content: start; margin-top: 0.3vw; ">

                    </div>

                    <!-- <div class="col-1"></div> -->
                    <style>
                        .dd {
                            color: #9400FF;
                        }

                        .dd:hover {
                            color: #e783ff;
                        }
                    </style>
                    <div class="" style="display: flex; align-items: center; justify-content: end; gap: 1vw; margin-top: 0.3vw; margin-right: 1vw;">
                        <a href="#" class="dd fw-semibold" style="font-size: 0.74vw;; text-decoration: none; font-family: Arial, Helvetica, sans-serif;  letter-spacing: 0.03vw;">Become a Seller</a>
                        <a href="#" class="dd fw-semibold" style="font-size: 0.74vw;; text-decoration: none; font-family: Arial, Helvetica, sans-serif;  letter-spacing: 0.03vw;">Donates</a>
                        <a href="#" class="dd fw-semibold" style="font-size: 0.74vw;; text-decoration: none; font-family: Arial, Helvetica, sans-serif;  letter-spacing: 0.03vw;">Helps & Supports</a>
                    </div>

                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                </div>

            </div>

        </header>

        <style>
            @media (min-width: 992px) {
                .icon-22 {
                    font-size: 1vw;
                }
            }

            @media (max-width: 992px) {
                .icon-22 {
                    font-size: 1vw;
                }
            }
        </style>

        <header class="header d-none d-md-block shadow-sm rounded" >
            <div style="display: flex; align-items: center; justify-content: center;">
                <div style="width: 85vw; height: 4vw; margin-top: 5px; display: flex; align-items: center; justify-content: center;">
                    <div class="col-12" style="height: 4vw; margin: 0; padding: 0; display: flex; align-items: center; justify-content: start;">
                        <div class="col-lg-2 col-md-2 position-absolute" style="height: 4vw; margin: 0; padding: 0;">
                            <a href="./index.php"><img src="" class="" style="height: 4vw; margin-top: -5.5vw;"></a>
                        </div>
                        <div class=" position-absolute" style="height: 3vw; width: 45vw; padding: 0; margin-left: 15vw; display: flex; align-items: center; justify-content: center;">
                            <div class="bg-white position-absolute col-12" style="border: 0.1vw solid #a938ff; margin-left: -0.3vw; height: 3vw; width: 45vw; border-radius: 0.8vw; padding: 0; display: flex; align-items: center; justify-content: start;">
                                <input type="text" class="position-absolute" placeholder="What are you looking for?" style="
                    padding: 0; 
                    width: 39vw; 
                    margin-left: 1vw; 
                    height: 3vw;
                    font-size: 0.9vw;
                    font-family: Arial, Helvetica, sans-serif;
                    color: #191919;
                    ">
                                <div class="position-absolute top-50 end-0 translate-middle-y d-flex justify-content-center align-items-center" style="
                    cursor: pointer;
                    text-align: center;
                    margin-left: 16vw;
                    width: 3.8vw;
                    height: 2.3vw;
                    border-radius: 0.5vw;
                    background-color: #EDE4FF;
                    margin-right: 0.3vw;
                    z-index: 9999;">
                                    <i class="fa-solid fa-magnifying-glass fa-bounce icon-22" style="color: #9400FF; font-size: 1.3vw;"></i>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-3  position-absolute" style="height: 1.8vw; margin-left: 56vw; display: flex; align-items: center; justify-content: center;">



                            <?php

                            if (isset($_COOKIE["name"])) {

                            ?>
                                <div class="position-absolute" style="width: 12vw;">
                                    <?php

                                    include "./dropdown.php";

                                    ?>
                                </div>
                            <?php

                            } else {

                            ?>
                                <div class="position-absolute" style="width: 12vw;">
                                    <?php
                                    include "./dropdownNext.php";

                                    ?>
                                </div>
                            <?php

                            }

                            ?>

                            <?php

                            ?>




                            <div style="width: 7vw; position: absolute; margin-left: 21vw; display: flex; align-items: center; justify-content: center;">
                                <?php
                                include "./langSet.php";
                                ?>
                            </div>
                            <!-- <div class="position-absolute header__top__right__language border-start border-end" style="padding: 0; height: 1.8vw; margin-left: 10vw; width: 6vw;">

                    <span class="position-absolute top-50 start-50 translate-middle" style="font-size: 0.8vw; letter-spacing: 0.01vw;">English <i class="arrow_carrot-down"></i></span>

                    <ul>
                        <li><a href="#" style="font-size: 0.8vw;">Spanis</a></li>
                        <li><a href="#" style="font-size: 0.8vw;">English</a></li>
                    </ul>

                </div> -->


                            <div style="position: absolute; margin-left: 32vw;">
                                <a href="#">
                                    <i style="font-size: 2vw; color: #191919;" class="fa-solid fa-bag-shopping"></i>
                                    <div class="position-absolute  rounded-5" style="background-color: #a938ff; 
                        width: 1.2vw; height: 1.2vw; 
                        display: flex; 
                        align-items: center; 
                        justify-content: center;
                        margin-top: -2.5vw;
                        padding: 0.3vw;" id='lblCartCount'>0</div>
                                </a>
                            </div>
                            <style>
                                .badge {
                                    border-radius: 1vw;
                                }

                                .label-warning[href],
                                .badge-warning[href] {
                                    background-color: #c67605;
                                }

                                #lblCartCount {
                                    height: 1vw;

                                    font-size: 0.7vw;
                                    background: #ff0000;
                                    color: #fff;
                                    margin-left: 1.4vw;
                                    margin-top: -0.3vw;
                                }
                            </style>
                        </div>

                    </div>
                </div>
            </div>

        </header>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>