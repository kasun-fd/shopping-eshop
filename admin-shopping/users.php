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
  <title>Shopping | Admin-User</title>
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
            <a class="nav-link" href="./seller.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Sellers Info</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link bg-dark" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title text-white">Users Info</span>
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
                  <input onkeyup="searchUser();" id="searchTextUser" type="text" style="color: white; font-size: 15px;" class="form-control" placeholder="Who are you looking for?">
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
                    <h4 class="card-title">User Informations</h4>
                    <div class="table-responsive col-12" style="height: 500px;">
                      <table class="table">
                        <thead class="position-sticky bg-dark" style="top: 0; z-index: 9;">
                          <tr>
                            <th> User Name </th>
                            <th> User Email </th>
                            <th> User Mobile </th>
                            <th> Number of purchases </th>
                            <th> Joined Date </th>
                            <th> Option </th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                          <?php
                          $query_User = Database::search("SELECT * FROM `user` ORDER BY `joined_date` DESC");
                          $num_User = $query_User->num_rows;
                          if ($num_User > 0) {
                            for ($i = 0; $i < $num_User; $i++) {
                              $data_User = $query_User->fetch_assoc();
                              $query_order = Database::search("SELECT * FROM `order` WHERE `customer_email` = '" . $data_User["email"] . "'");
                              $num_order = $query_order->num_rows;
                              $data_order = $query_order->fetch_assoc();
                          ?>
                              <tr>

                                <td class="d-grid">
                                    <?php echo $data_User["fname"]; ?>&nbsp;<?php echo $data_User["lname"]; ?>
                                </td>
                                <td class="d-grid">
                                    <?php echo $data_User["email"]; ?>
                                </td>
                                <td class="d-grid">
                                  <?php echo $data_User["mobile"]; ?>
                                </td>
                                <td class="d-grid">
                                  <?php echo $num_order; ?>
                                </td>

                                <td> <?php echo $data_User["joined_date"]; ?> </td>

                                <?php
                                if ($data_User["block_status_user"] == 1) {
                                ?>
                                  <td>
                                    <div onclick="unBlockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-danger">Block Account</div>
                                  </td>
                                <?php
                                } else {
                                ?>
                                  <td>
                                    <div onclick="blockUser(<?php echo $data_order['id_order']; ?>);" style="cursor: pointer;" class="badge badge-outline-success">Unblock Account</div>
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