<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets-bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets-bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets-bootstrap/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Shopping | Admin Login</title>
</head>

<body>
    <section class="form-08 d-flex align-items-center justify-content-center">
        <div class="d-block" id="firstPage">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-12">
                        <div class="_form-08-main">
                            <div class="_form-08-head">
                                <h2>Welcome Back</h2>
                            </div>

                            <div class="form-group">
                                <!-- <label>Enter Your Email</label> -->
                                <input onkeypress="getCode(event);" autocapitalize="off" autocomplete="off" type="email" id="email" class="form-control" placeholder="Enter Email" required="" aria-required="true">
                            </div>

                            <!-- <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="password" class="form-control" type="text" placeholder="Enter Password" required="" aria-required="true">
              </div> -->

                            <!-- <div class="checkbox mb-0 form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="">
                  <label class="form-check-label" for="">
                    Remember me
                  </label>
                </div>
                <a href="#">Forgot Password</a>
              </div> -->

                            <div class="form-group">
                                <div class="_btn_04" onclick="getCodeIndex();">
                                    <a class="text-white">Get Verification Code</a>
                                </div>
                            </div>

                            <div class="sub-01">
                                <img src="assets-bootstrap/images/shap-02.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none" id="secondPage">
            <div class="container d-flex align-items-center justify-content-center">

                <div class="row">
                    <div class="col-12">

                        <div class="_form-08-main">
                            <!-- <i onclick="backToFistPage();" class="fa-solid fa-chevron-left" style="font-size: 20px; margin-left: 10px; cursor: pointer;"></i> -->
                            <div class="_form-08-head">
                                <h2>Verification Code</h2>
                            </div>

                            <div class="form-group">
                                <!-- <label>Enter Your Email</label> -->
                                <input autocapitalize="off" onkeypress="loginPress(event);" autocomplete="off" class="form-control" type="text" id="vcode" placeholder="Enter Verification Code" required="" aria-required="true">
                            </div>

                            <!-- <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="password" class="form-control" type="text" placeholder="Enter Password" required="" aria-required="true">
              </div> -->

                            <!-- <div class="checkbox mb-0 form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="">
                  <label class="form-check-label" for="">
                    Remember me
                  </label>
                </div>
                <a href="#">Forgot Password</a>
              </div> -->

                            <div class="form-group">
                                <div class="_btn_04"  onclick="login();">
                                    <a class="text-white">Login</a>
                                </div>
                            </div>

                            <div class="sub-01">
                                <img src="assets-bootstrap/images/shap-02.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./script.js"></script>
</body>

</html>