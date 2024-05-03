<?php
require "./connection.php";
session_start();

if (!isset($_COOKIE["name"])) {
?>

  <!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com-->
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping | Login and Signup</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./login.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



  </head>

  <body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <!-- OTHER DEVICES -->

    <div class="container1">
      <section class="container forms">
        <div class="form login" id="signInBox">
          <div class="form-content">
            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
              $email = $_COOKIE["email"];
            }
            ?>

            <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
              <div class="alert alert-dismissible fade hide" id="msgdiv1" role="alert" style="background-color: #f0a8ae; position: fixed; width: 350px; top: 0; display: flex; align-items: center; justify-content: center;">
                <span class="material-symbols-outlined">
                  report
                </span>
                &nbsp;<span style="font-size: 13px; font-weight: 600; margin-top: 0.2vw;" id="msg1"></span>
              </div>
            </div>


            <header>Login</header>


            <!-- <form action="./signInKasun.php" method="POST"> -->
            <div class="field input-field">
              <input type="email" style="font-size: 15px;" onkeypress="signInFormPress(event)" autocapitalize="off" autocomplete="on" placeholder="Email" id="emailSignIn" value="<?php echo $email ?>" class="input" name="email">
            </div>

            <div class="field input-field">
              <input type="password" style="font-size: 15px;" onkeypress="signInFormPress(event)" autocomplete="on" placeholder="Password" id="PasswordSignIn" class="password" name="password">
              <i class='bx bx-hide eye-icon eye1'></i>
            </div>

            <div class="form-link">
              <a href="#" onclick="forgotPassword();" class="forgot-pass">Forgot password?</a>
            </div>

            <div class="field button-field">
              <button onclick="signInForm();" id="loginButton">Login</button>
            </div>
            <!-- </form> -->

            <div class="form-link">
              <span>Don't have an account? <a href="#" class="link signup-link" onclick="changeView();">Signup</a></span>
            </div>
          </div>

          <div class="line"></div>

          <div class="iconsMain">
            <div class="iconFacebookDiv">
              <img src="./icon/facebook.png" class="iconFacebook" alt="">
            </div>

            <div class="iconGoogleDiv">
              <img src="./icon/google.png" class="iconGoogle" alt="">
            </div>
          </div>
        </div>

        <!--modal-->
        <div class="modal" tabindex="-1" id="forgotPasswordModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Forgot Password?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeX();"></button>
              </div>

              <div class="col-12 d-none" id="msgdiv3">
                <div class="alert alert-danger" style="font-size: 12px;" role="alert" id="msg3"></div>
              </div>

              <div class="modal-body">
                <div class="row g-3">

                  <div class="col-6">
                    <label class="form-label" style="font-size: 12px;">New Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" id="np" />
                      <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword();">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </div>

                  <div class="col-6">
                    <label class="form-label" style="font-size: 12px;">Retype New Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" id="rnp" />
                      <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label" style="font-size: 12px;">Verifiction Code</label>
                    <input type="text" class="form-control" id="vc" />
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" style="font-size: 15px;" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeX();">Close</button>
                <button type="button" style="font-size: 15px;" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
              </div>
            </div>
          </div>
        </div>
        <!--modal-->


        <!-- Signup Form -->

        <div class="form signup d-none" id="signUpBox">
          <div class="form-content">

            <div class="alert alert-dismissible fade hide" id="msgdiv2" role="alert" style="background-color: #f0a8ae;  position: fixed; width: 350px; top: 0; display: flex; align-items: center; justify-content: center;">
              <span class="material-symbols-outlined">
                report
              </span>
              &nbsp;<span style="font-size: 13px;  font-weight: 600; margin-top: 0.2vw;" id="msg2"></span>
            </div>
            <header>Signup</header>
            <form action="#">
              <div class="loginNewFormDiv">
                <div class="field1">
                  <input type="text" style="font-size: 15px;" onkeypress="signUpPress(event)" placeholder="First Name" id="fname">
                </div>

                <div class="field1">
                  <input type="text" style="font-size: 15px;" onkeypress="signUpPress(event)" placeholder="Last Name" id="lname">
                </div>
              </div>

              <div class="loginNewFormDiv2">
                <div class="field1 input-field1">
                  <input type="text" style="font-size: 15px;" onkeypress="signUpPress(event)" placeholder="Mobile Number" id="mobile">
                </div>

                <select name="" style="font-size: 15px;" onkeypress="signUpPress(event)" id="gender" class="field1 optiongender1">
                  <option class="optiongender1" value="0">Select Gender</option>
                  <?php

                  $rs = Database::search("SELECT * FROM `gender`");
                  $n = $rs->num_rows;

                  for ($x = 0; $x < $n; $x++) {
                    $d = $rs->fetch_assoc();

                  ?>
                    <option class="optiongender1" value="<?php echo $d["gender_id"]; ?>"><?php echo $d["gender_name"]; ?></option>
                  <?php

                  }

                  ?>
                </select>
              </div>



              <div class="fieldEmail">
                <input type="email" style="font-size: 15px;" onkeypress="signUpPress(event)" autocapitalize="off" autocomplete="on" placeholder="Email" id="email" class="input">
              </div>

              <div class="fieldPassword">
                <input type="password" style="font-size: 15px;" onkeypress="signUpPress(event)" autocomplete="on" placeholder="Password" id="password" class="password">
                <i class='bx bx-hide eye-icon eye2'></i>
              </div>

              <div class="fieldButton">
                <button id="myButton" onclick="signUp();">Signup</button>
              </div>
            </form>

            <div class="form-link1">
              <span class="link1">Already have an account? <a href="#" class="link1" onclick="changeView();">Login</a></span>
            </div>
          </div>

          <div class="line1"></div>

          <div class="iconsMain">
            <div class="iconFacebookDiv">
              <img src="./icon/facebook.png" class="iconFacebook" alt="">
            </div>

            <div class="iconGoogleDiv">
              <img src="./icon/google.png" class="iconGoogle" alt="">
            </div>
          </div>


          <!-- <div class="media-options">
          <a href="#" class="field facebook">
            <i class='bx bxl-facebook facebook-icon'></i>
            <span>Login with Facebook</span>
          </a>
        </div>

        <div class="media-options">
          <a href="#" class="field google">
            <img src="./img/google.png" alt="" class="google-img">
            <span>Login with Google</span>
          </a>
        </div> -->

        </div>
      </section>

    </div>


    <!-- OTHER DEVICES end  -->

    <!-- ================================================================================================================================================ -->






    <!-- JavaScript -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./script.js"></script>
    <script src="./login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>

<?php
} else {
  header("Location: index.php");
  exit;
}
?>