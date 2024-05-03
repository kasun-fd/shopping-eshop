
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./langset.css">
</head>

<body style="-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

    <div class="dropdown1">
        <div class="dropbtn1">
            <div class="content1">
                <i style="font-size: 20px;" class="fa-solid fa-earth-americas"></i>
                <?php
                if(isset($_COOKIE["status"])){
                    $data = $_COOKIE["status"];
                    ?>
                    <span style="font-weight: 700;" id="lang"><?php echo $data ?></span>
                    <?php
                }else{
                    ?>
                    <span style="font-weight: 700;" id="lang">ENG</span>
                    <?php
                }
                ?>
                
            </div>
            <div class="content2">
                <i class="fa-solid fa-chevron-down fa-beat-fade"></i>
            </div>
        </div>

        <div class="dropdown-content1">
            <div style="width: 120px; display: flex; align-items: center; justify-content: center; position: absolute; margin-top: -36px; margin-left: -13px;">
                <i style="font-size: 60px; color: #ede4ff; " class="fa-solid fa-caret-up"></i>
            </div>
            <div style="height: 20px;">
                <span style="font-size: 11px; font-weight: bold;">Select Language</span>
            </div>

            <div class="form-check" style="margin-left: 10px; height: 25px; display: flex; align-items: center; justify-content: start;">
                <input style="width: 10px; height: 10px;" class="form-check-input cont1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="checkedRadio(1);" checked>
                <label style="font-size: 11px; font-weight: 500;" class="form-check-label" for="flexRadioDefault1">
                    ENG / English
                </label>
            </div>
            <div class="form-check" style="margin-left: 10px; height: 25px; display: flex; align-items: center; justify-content: start;">
                <input style="width: 10px; height: 10px;" class="form-check-input cont1" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="checkedRadio(2);">
                <label style="font-size: 11px; font-weight: 500;" class="form-check-label" for="flexRadioDefault2">
                    SIN / Sinhala
                </label>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>

</html>