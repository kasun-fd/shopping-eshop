<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping | Search</title>
    <link rel="stylesheet" href="./mobile_search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-0" style="background-color: #f5f5f5; -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <div class="col-12 d-flex position-sticky" style="z-index: 99999; top: 0; height: 60px; background-image: linear-gradient(to right,#8b2be2,#4d02e0);">
        <div class="col-2 d-flex align-items-center justify-content-center"><i onclick="backToIndexFromSearchPage();" class="fa-solid fa-arrow-left fs-4 text-white"></i></div>
        <div class="col-7 d-flex align-items-center justify-content-center">
            <input autocomplete="off" autofocus="off" autocapitalize="off" onkeyup="searchBoxOpen(event);" id="searchText" type="text" class="col-12 searchBarMobile border-0 text-white" style="height: 45px; background-color: transparent; font-size: 14px; color: white;" placeholder="What are you looking for?">
        </div>
        <div onclick="searchMobileButton();" class="col-3 d-flex align-items-center justify-content-center" style="font-size: 15px; font-weight: 500; color: white;">SEARCH</div>
    </div>

    <div class="col-12 d-none mb-3" id="searchResultBox">
        <!-- <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div>
        <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div>
        <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div>
        <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div>
        <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div>
        <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4" style="padding-left: 65px; font-size: 14px;"><div style="font-weight: 400; overflow: hidden; height: 20px;">Lorem ipsum dolor</div><i class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i></div> -->
    </div>

    <!-- <div class="col-12 d-flex align-items-center justify-content-center mt-3">
        <div class="col-11 d-flex">
            <div class="col-6 d-flex align-items-center justify-content-start" style="font-size: 14px; font-weight: 500; color: dark;">Search History</div>
            <div class="col-6 d-flex align-items-center justify-content-end"><i class="fa-solid fa-trash" style="font-size: 15px; color: #808080;"></i></div>
        </div>
    </div>

    <div class="col-12 d-flex align-items-center justify-content-center mt-3">
        <div class="col-11 d-flex row gap-2 bg-black" style="width: 100px; overflow: hidden;">
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdvcsdf</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdvcsdf</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdvcsdf</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdvcsdf</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdfvsdfv</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdvcsdf</span>
            <span class="bg-secondary-subtle p-2 rounded-3" style="font-size: 13px;">sdfvdvdf</span>
        </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>