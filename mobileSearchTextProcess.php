<?php
include "./connection.php";
session_start();

$text = $_GET["searchText"];

if (!empty($text)) {
    $query_1 = Database::search("SELECT * FROM brand WHERE `brand_name` LIKE '$text%'");
    $num_1 = $query_1->num_rows;


    $query_2 = Database::search("SELECT * FROM brand WHERE `brand_name` LIKE '%$text'");
    $num_2 = $query_2->num_rows;

    $query_3 = Database::search("SELECT * FROM model WHERE `model_name` LIKE '$text%'");
    $num_3 = $query_3->num_rows;

    $query_4 = Database::search("SELECT * FROM model WHERE `model_name` LIKE '%$text'");
    $num_4 = $query_4->num_rows;

    if ($num1 > 0 || $num_2 > 0 || $num_3 > 0 || $num_4 > 0) {

        for ($i = 0; $i < $num_1; $i++) {
            $data_1 = $query_1->fetch_assoc();
?>
            <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4 boxHover" style="padding-left: 65px; font-size: 14px;">
                <div onclick="triggerBrand(<?php echo $data_1['product_id']; ?>);" style="font-weight: 400; overflow: hidden; height: 20px;" class="flex-grow-1"><?php echo $data_1["brand_name"]; ?></div>
                <i onclick="addTextToInput(<?php echo $data_1['product_id']; ?>)" class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i>
            </div>
        <?php
        }
        for ($i = 0; $i < $num_3; $i++) {
            $data_3 = $query_3->fetch_assoc();
        ?>
            <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4 boxHover" style="padding-left: 65px; font-size: 14px;">
                <div onclick="triggerModel(<?php echo $data_3['product_id']; ?>);" style="font-weight: 400; overflow: hidden; height: 20px;" class="flex-grow-1"><?php echo $data_3["model_name"]; ?></div>
                <i onclick="addTextToInputFromModel(<?php echo $data_3['product_id']; ?>);" class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i>
            </div>
        <?php
        }
        for ($i = 0; $i < $num_2; $i++) {
            $data_2 = $query_2->fetch_assoc();
        ?>
            <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4 boxHover" style="padding-left: 65px; font-size: 14px;">
                <div onclick="triggerBrand(<?php echo $data_2['product_id']; ?>);" style="font-weight: 400; overflow: hidden; height: 20px;" class="flex-grow-1"><?php echo $data_2["brand_name"]; ?></div>
                <i onclick="addTextToInput(<?php echo $data_2['product_id']; ?>)" class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i>
            </div>
        <?php
        }
        for ($i = 0; $i < $num_4; $i++) {
            $data_4 = $query_4->fetch_assoc();
        ?>
            <div class="col-12 border-bottom pt-3 pb-3 d-flex align-items-center justify-content-between pe-4 boxHover" style="padding-left: 65px; font-size: 14px;">
                <div onclick="triggerModel(<?php echo $data_4['product_id']; ?>);" style="font-weight: 400; overflow: hidden; height: 20px;" class="flex-grow-1"><?php echo $data_4["model_name"]; ?></div>
                <i onclick="addTextToInputFromModel(<?php echo $data_4['product_id']; ?>);" class="fa-solid fa-arrow-left fa-rotate-by" style="--fa-rotate-angle: 410deg; color: #808080;"></i>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="col-12 d-flex align-items-center justify-content-center mt-3" style="font-size: 14px;">
            <div class="col-11 d-flex flex-column align-items-center justify-content-center bg-white rounded-3" style="height: 80px;">
                <i class="fa-solid fa-magnifying-glass fs-5 mb-2 fw-400"></i>
                <span>Search result not found!</span>
            </div>
        </div>
<?php
    }
} else {
    echo "empty";
}
