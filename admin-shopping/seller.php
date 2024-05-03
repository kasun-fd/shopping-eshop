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
  <title>Shopping | Admin-Seller</title>
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
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link bg-dark" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title text-white">Sellers Info</span>
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
                  <input onkeyup="searchSellers();" id="searchTextSeller" type="text" style="color: white; font-size: 15px;" class="form-control" placeholder="Who are you looking for?">
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
          <div class="col-12 bg-dark d-flex align-items-center justify-content-center ps-0 pe-0">
            <div class="col-12 row">
              <div class="col-12 p-0 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Seller Informations</h4>
                    <div class="table-responsive col-12" style="height: 500px;">
                      <table class="table">
                        <thead class="position-sticky bg-dark" style="top: 0; z-index: 9;">
                          <tr>
                            <th> Seller Name </th>
                            <th> Seller Info </th>
                            <th> Orders Count </th>
                            <th> Bank Info </th>
                            <th> NIC </th>
                            <th> Joined Date </th>
                            <th> Option </th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                          <?php
                          $query_seller = Database::search("SELECT * FROM `seller` ORDER BY `joined_date` DESC");
                          $num_seller = $query_seller->num_rows;
                          if ($num_seller > 0) {
                            for ($i = 0; $i < $num_seller; $i++) {
                              $data_seller = $query_seller->fetch_assoc();
                              $query_order = Database::search("SELECT * FROM seller JOIN product ON email = user_email JOIN `order` ON id = product_id WHERE `user_email` = '" . $data_seller["email"] . "'");
                              $num_order = $query_order->num_rows;
                              $data_order = $query_order->fetch_assoc();
                          ?>
                              <tr>

                                <td class="d-grid">
                                  <p>
                                    <?php echo $data_seller["full_name"]; ?>
                                  </p>
                                  <p><?php echo $data_seller["user_name"]; ?></p>
                                </td>
                                <td class="d-grid">
                                  <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                                  <p><?php echo $data_seller["nic"]; ?></p>
                                  <p style="color: #a7aabe;" id="getEmail"><?php echo $data_seller["email"]; ?></p>
                                  <p style="color: #a7aabe;"><?php echo $data_seller["mobile"]; ?></p>
                                </td>
                                <td class="d-grid">
                                  <p><?php echo $num_order; ?></p>
                                </td>
                                <td class="d-grid">
                                  <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                                  <p>p.b.s.n.p.fernando</p>
                                  <p style="color: #a7aabe;">8012733993</p>
                                  <p>Commerial Bank</p>
                                  <p>Ja ela</p>
                                </td>
                                <!-- <td>
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
                                 

                                </td> -->

                                <td> <?php echo $data_seller["nic"]; ?> </td>
                                <!-- <td> LKR 14,500000 </td> -->
                                <!-- <td> Dashboard </td> -->
                                <!-- <td> Credit card </td> -->

                                <?php
                                // from datetime import datetime;

                                // Define the input datetime string
                                // $datetime_str = $data_table_order["date_time"];

                                // Parse the datetime string
                                // $dt = datetime::createFromFormat('Y-m-d H:i:s', $datetime_str);

                                // Set the desired format
                                // $desired_format = "d M Y";

                                // Format the datetime object
                                // $formatted_date = $dt->format($desired_format);

                                // Print the formatted date
                                // echo $formatted_date;
                                ?>


                                <td> <?php echo $data_seller["mobile"]; ?> </td>


                                <?php
                                if ($data_seller["block_status"] == 1) {
                                ?>
                                  <td>
                                    <div onclick="unBlockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                                  </td>
                                <?php
                                } else {
                                ?>
                                  <td>
                                    <div onclick="blockSeller(<?php echo $data_order['id']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
                                  </td>

                                <?php
                                }
                                ?>


                              </tr>
                          <?php
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <h3 style="font-size: 17px;" class="mt-3">Courier Contact Info</h3>
                    <div class="col-12 bg-dark mt-4 d-flex flex-column pt-3 ps-0 pe-0" style="height: 300px; border-radius: 10px;">
                          <div class="row col-12 p-0">
                            <div class="col-6 d-flex">
                              <div class="row" style="gap: 10px; padding-left: 10px;">
                              <?php
                              $query = Database::search("SELECT * FROM `courier_service`");
                              $data = $query->fetch_assoc();
                              ?>
                              <input type="text" class="col-12" value="<?php echo $data["name"]; ?>" id="name" style="background-color: #191c24; height: 40px; border: none; color: #a7aabe; border-radius: 5px; font-size: 13px;" placeholder="Enter your Account Name">
                              <input type="text" class="col-12" id="number" value="<?php echo $data["number"]; ?>" style="background-color: #191c24; height: 40px; border: none; color: #a7aabe; border-radius: 5px; font-size: 13px; margin-top: -60px;" placeholder="Enter your Account Number">
                              <button onclick="updateService(<?php echo $data['id']; ?>);" class="col-3" style="margin-top: -80px; height: 30px; border: none; border-radius: 5px; font-size: 13px; font-weight: 400; background-color: #2d87b8; color: white;">Update</button>
                              </div>
                            </div>
                            <div class="col-6" style="height: 270px;">
                              <img src="https://dfreight.org/wp-content/uploads/2022/08/Courier-Services-DFreight-1.jpg" style="height: 270px; width: 100%; object-fit: cover; border-radius: 10px;" alt="">
                            </div>
                          </div>
                    </div>

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