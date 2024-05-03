<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Order Successfully</title>
    <link rel="stylesheet" href="./orderSuccess.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #EDE4FF;">
    <div class="col-12 d-flex align-items-center justify-content-center pt-3" style="height: 100vh; width: 100vw;">
        <div class="bg-white col-10 rounded-4 pb-4 shadow-lg">
            
            <!-- <div class="col-12 d-flex align-items-center justify-content-center mt-5 ">
                <div class="col-8 d-flex align-items-center justify-content-between">
                    <div class="col-6">Get By</div>
                    <i class="fa-solid fa-download me-2 fs-5" style="cursor: pointer; color: #31363F;" onclick="downloadReciept();"></i>
                </div>-->
            <!-- </div>  -->
            <div class="col-12 d-flex align-items-start justify-content-center pt-0 pb-0">
                <img src="./resource/failed-to-make-payment-by-credit-card-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-vector-removebg-preview.png" class="imgEdit" alt="">
            </div>

            <div class="col-12 d-flex align-items-center justify-content-center mt-1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: #FE4D3C; font-size: 35px;">Payment failed!</div>

            <div class="col-12 d-flex align-items-center justify-content-center mt-4">
                <div class="col-8 d-flex align-items-center justify-content-center">
                    <button class="p-3 rounded-3" style="border: none; background-color: #FE4D3C; color: white;" onclick="goToIndexPageFromParchase();">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>