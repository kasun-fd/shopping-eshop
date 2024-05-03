<!DOCTYPE html>
<html lang="en">
<?php
include "./connection.php";
session_start();
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping | Admin-Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
</head>

<body>
  <?php
  if (isset($_COOKIE["adminName"])) {
  ?>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-white text-decoration-none" style="font-size: 30px; font-weight: 500;" href="dashboard.php">S - Admin</a>
          <a class="sidebar-brand brand-logo-mini" href="dashboard.php">S</a>
        </div>
        <ul class="nav" style="gap: 5px;">

          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link bg-dark" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title text-white">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="./seller.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Sellers Info</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./users.php">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Users Info</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini text-white" style="font-size: 30px;" href="dashboard.php">S</a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">

              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="https://dashboard.tawk.to/#/dashboard/65f54395cc1376635adb4236" target="_blank">
                  <i class="mdi mdi-email" style="font-size: 25px;"></i>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/icon-admin.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_COOKIE["adminName"]; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">

                  <a class="dropdown-item preview-item" onclick="logOut();">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>

                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">

              <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                          $query_order_daily = Database::search("SELECT * 
                          FROM `admin_income`
                          WHERE date(date_time_admin) = CURDATE()
                          ");

                          $total_daily = 0;

                          $num_daily = $query_order_daily->num_rows;

                          for ($i = 0; $i < $num_daily; $i++) {
                            $data_daily = $query_order_daily->fetch_assoc();
                            $total_daily += $data_daily["income"];
                          }

                          $fomated_daily = "LKR " . number_format($total_daily, 2, '.', ',');

                          ?>
                          <h3 class="mb-0"><?php echo $fomated_daily; ?></h3>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="icon icon-box-success d-flex align-items-center justify-content-center" style="padding-top: 5px; height: 50px; width: 50px; display: flex; align-items: center; justify-content: center;">
                          <span class="mdi mdi-chart-line icon-item" style="font-size: 40px;"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Daily Income</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                          $query_order_monthly = Database::search("SELECT *
                          FROM `admin_income` t
                          WHERE MONTH(t.date_time_admin) = MONTH(NOW())
                            AND YEAR(t.date_time_admin) = YEAR(NOW())                          
                          ");

                          $total_monthly = 0;

                          $num_monthly = $query_order_monthly->num_rows;

                          for ($i = 0; $i < $num_monthly; $i++) {
                            $data_monthly = $query_order_monthly->fetch_assoc();
                            $total_monthly += $data_monthly["income"];
                          }

                          $formated_monthly = "LKR " . number_format($total_monthly, 2, '.', ',');

                          ?>
                          <h3 class="mb-0"><?php echo $formated_monthly; ?></h3>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="icon icon-box-success" style="height: 50px; width: 50px;">
                          <span class="mdi mdi-chart-areaspline icon-item" style="font-size: 40px;"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Monthly Income</h6>
                  </div>
                </div>
              </div>


            </div>

            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                          $query_revenue = Database::search("SELECT * FROM `admin_income`");
                          $num_revenue = $query_revenue->num_rows;
                          $total_revenue = 0;
                          for ($i = 0; $i < $num_revenue; $i++) {
                            $data_revenue = $query_revenue->fetch_assoc();
                            $total_revenue += $data_revenue["income"];
                          }
                          function formatNumbers($number)
                          {
                            if ($number < 1000) {
                              // No conversion needed for numbers below 1000
                              return $number;
                            } else if ($number < 1000000) {
                              // Convert to thousands with one decimal place
                              return round($number / 1000, 1) . 'K';
                            } else {
                              // Convert to millions with one decimal place
                              return round($number / 1000000, 1) . 'M';
                            }
                          }
                          ?>
                          <h2 class="mb-0">LKR&nbsp;<?php echo formatNumbers($total_revenue); ?></h2>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Until now</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-chart-bar text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Orders</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                          $query_order = Database::search("SELECT * FROM `order`");
                          $num_order = $query_order->num_rows;
                          ?>
                          <h2 class="mb-0"><?php echo $num_order; ?></h2>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">Orders</p> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Until now</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Purchase</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                          $query_purchase = Database::search("SELECT * FROM `order`");
                          $num_purchase = $query_purchase->num_rows;
                          $total_purchase = 0;
                          for ($i = 0; $i < $num_purchase; $i++) {
                            $data_purchase = $query_purchase->fetch_assoc();
                            $total_purchase += $data_purchase["unit_total_price"];
                          }

                          function formatNumber($number)
                          {
                            if ($number < 1000) {
                              // No conversion needed for numbers below 1000
                              return $number;
                            } else if ($number < 1000000) {
                              // Convert to thousands with one decimal place
                              return round($number / 1000, 1) . 'K';
                            } else {
                              // Convert to millions with one decimal place
                              return round($number / 1000000, 1) . 'M';
                            }
                          }

                          ?>
                          <h2 class="mb-0">LKR&nbsp;<?php echo formatNumber($total_purchase); ?></h2>
                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Until now</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-cellphone-link text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 p-0">
              <div class="row">
                <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-10">
                          <div class="d-flex align-items-center align-self-start">
                            <?php
                            $query_order_daily = Database::search("SELECT * 
                          FROM `order`
                          WHERE date(date_time) = CURDATE()
                          ");

                            $total_daily = 0;

                            $num_daily = $query_order_daily->num_rows;

                            for ($i = 0; $i < $num_daily; $i++) {
                              $data_daily = $query_order_daily->fetch_assoc();
                              $total_daily += $data_daily["unit_total_price"];
                            }

                            $fomated_daily = "LKR " . number_format($total_daily, 2, '.', ',');

                            ?>
                            <h3 class="mb-0"><?php echo $fomated_daily; ?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="icon icon-box-success d-flex align-items-center justify-content-center" style="padding-top: 5px; height: 50px; width: 50px; display: flex; align-items: center; justify-content: center;">
                            <span class="mdi mdi-cash icon-item" style="font-size: 40px;"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Daily Purchase</h6>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-10">
                          <div class="d-flex align-items-center align-self-start">
                            <?php
                            $query_order_monthly = Database::search("SELECT *
                          FROM `order` t
                          WHERE MONTH(t.date_time) = MONTH(NOW())
                            AND YEAR(t.date_time) = YEAR(NOW())                          
                          ");

                            $total_monthly = 0;

                            $num_monthly = $query_order_monthly->num_rows;

                            for ($i = 0; $i < $num_monthly; $i++) {
                              $data_monthly = $query_order_monthly->fetch_assoc();
                              $total_monthly += $data_monthly["unit_total_price"];
                            }

                            $formated_monthly = "LKR " . number_format($total_monthly, 2, '.', ',');

                            ?>
                            <h3 class="mb-0"><?php echo $formated_monthly; ?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="icon icon-box-success" style="height: 50px; width: 50px;">
                            <span class="mdi mdi-cash-multiple icon-item" style="font-size: 40px;"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Monthly Purchase</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                    <div class="table-responsive" style="height: 400px;">
                      <table class="table">
                        <thead class="bg-dark position-sticky" style="top: 0; z-index: 9;">
                          <tr>
                            <th> Seller Info </th>
                            <th> Customer Info </th>
                            <th> Order No </th>
                            <th> Payment Status </th>
                            <th> Product Cost </th>
                            <th> Start Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query_table_order = Database::search("SELECT * FROM `order` JOIN `product` ON `product_id` = `id` JOIN `seller` ON `user_email` = `email` ORDER BY `date_time` DESC");
                          $num_table_order = $query_table_order->num_rows;

                          if ($num_table_order > 0) {
                            for ($i = 0; $i < $num_table_order; $i++) {
                              $data_table_order = $query_table_order->fetch_assoc();
                              $query_table_user = Database::search("SELECT * FROM user WHERE `email` = '" . $data_table_order["customer_email"] . "'");
                              $data_table_user = $query_table_user->fetch_assoc();
                          ?>
                              <tr>

                                <td class="d-grid">
                                  <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                                  <p><?php echo $data_table_order["full_name"]; ?></p>
                                  <p style="color: #a7aabe;"><?php echo $data_table_order["email"]; ?></p>
                                  <p style="color: #a7aabe;"><?php echo $data_table_order["mobile"]; ?></p>
                                </td>
                                <td class="d-grid">
                                  <p><?php echo $data_table_user["fname"]; ?>&nbsp;<?php echo $data_table_user["lname"]; ?></p>
                                  <p style="color: #a7aabe;"><?php echo $data_table_order["customer_email"]; ?></p>
                                  <p style="color: #a7aabe;"><?php echo $data_table_user["mobile"]; ?></p>
                                </td>
                                <td> <?php echo $data_table_order["generated_id"]; ?> </td>
                                <td>
                                  <?php
                                  if ($data_table_order["order_status_id"] == 1) {
                                  ?>
                                    <div class="badge badge-outline-danger">Processing</div>
                                  <?php
                                  } else if ($data_table_order["order_status_id"] == 2) {
                                  ?>
                                    <div class="badge badge-outline-warning">Shopping</div>
                                  <?php
                                  } else if ($data_table_order["order_status_id"] == 3) {
                                  ?>
                                    <div class="badge badge-outline-success">Shipped</div>
                                  <?php
                                  }
                                  ?>

                                </td>
                                <td> <?php echo $formattedPrice = "LKR " . number_format($data_table_order["unit_total_price"], 2, '.', ','); ?> </td>
                                <!-- <td> LKR 14,500000 </td> -->
                                <!-- <td> Dashboard </td> -->
                                <!-- <td> Credit card </td> -->

                                <?php
                                // from datetime import datetime;

                                // Define the input datetime string
                                $datetime_str = $data_table_order["date_time"];

                                // Parse the datetime string
                                $dt = datetime::createFromFormat('Y-m-d H:i:s', $datetime_str);

                                // Set the desired format
                                $desired_format = "d M Y";

                                // Format the datetime object
                                $formatted_date = $dt->format($desired_format);

                                // Print the formatted date
                                // echo $formatted_date;
                                ?>


                                <td> <?php echo $formatted_date; ?> </td>

                              </tr>
                          <?php
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              <style>
                @media (min-width: 992px) {
                  .carouselMain {
                    width: 80%;
                    height: 345px;
                  }

                  .slider {
                    border-radius: 10px;
                    height: 345px;
                  }
                }

                @media (max-width: 992px) {
                  .carouselMain {
                    width: 100%;
                    height: 345px;
                  }

                  .slider {
                    border-radius: 10px;
                    height: 300px;
                  }
                }
              </style>
              <div class="col-md-12 col-xl-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Carousel Slides</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                      <div class="item">
                        <img src="../resource/carousel-imges/2.jpg" style="height: 345px; object-fit: cover;" alt="">
                      </div>
                      <div class="item">
                        <img src="../resource/carousel-imges/photo-1441986300917-64674bd600d8.avif" style="height: 345px; object-fit: cover;" alt="">
                      </div>
                      <div class="item">
                        <img src="../resource/carousel-imges/3.avif" style="height: 345px; object-fit: cover;" alt="">
                      </div>
                      <div class="item">
                        <img src="../resource/carousel-imges/4.jpg" style="height: 345px; object-fit: cover;" alt="">
                      </div>
                      <div class="item">
                        <img src="../resource/carousel-imges/5.jpg" style="height: 345px; object-fit: cover;" alt="">
                      </div>
                    </div>
                    <!-- <div class="d-flex py-4">
                      <div class="col-12">
                        <p style="font-size: 18px; font-weight: 500;">Change Carousel Slides</p>
                        <div class="row" style="gap: 20px;">
                          <div class="col-md-4 col-lg-3 d-flex flex-column border p-2" style="border-radius: 10px;">
                            <p>1st Slide</p>
                            <input style="font-weight: 500; font-size: 13px; border-radius: 10px;" type="file" id="carousl_img_1">
                          </div>
                          <div class="col-md-4 col-lg-3 d-flex flex-column border p-2" style="border-radius: 10px;">
                            <p>2nd Slide</p>
                            <input style="font-weight: 500; font-size: 13px; border-radius: 10px" type="file" id="carousl_img_2">
                          </div>
                          <div class="col-md-4 col-lg-3 d-flex flex-column border p-2" style="border-radius: 10px;">
                            <p>3rd Slide</p>
                            <input style="font-weight: 500; font-size: 13px; border-radius: 10px" type="file" id="carousl_img_3">
                          </div>
                          <div class="col-md-4 col-lg-3 d-flex flex-column border p-2" style="border-radius: 10px;">
                            <p>4th Slide</p>
                            <input style="font-weight: 500; font-size: 13px; border-radius: 10px" type="file" id="carousl_img_4">
                          </div>
                          <div class="col-md-4 col-lg-3 d-flex flex-column border p-2" style="border-radius: 10px;">
                            <p>5th Slide</p>
                            <input style="font-weight: 500; font-size: 13px; border-radius: 10px" type="file" id="carousl_img_5">
                          </div>
                        </div>
                        <div class="col-12 d-flex aliign-items-center justify-content-end">
                          <button onclick="updateSlide();" class="col-2 bg-dark text-white" style="height: 40px; border-radius: 10px; border: none; outline: none; font-weight: 500;">Update</button>
                        </div>
                      </div>
                    </div> -->

                  </div>
                </div>
              </div>

            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <?php
            $year = date("Y");
            ?>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Shopping <?php echo $year; ?></span>
              <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  <?php
  } else {
    header("Location: index.php");
  }
  ?>

  <script src="./script.js"></script>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>