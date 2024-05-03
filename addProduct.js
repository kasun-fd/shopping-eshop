const mediaQuery = window.matchMedia('(min-width: 768px)');

// You can also listen for changes in the screen state
mediaQuery.addEventListener('change', (event) => {
    if (event.matches) {

    } else {
        window.location.href = "index.php";
    }
});


var whichImage = 0;

const imageChooser = document.getElementById('imgChooser');
const allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];

imageChooser.addEventListener('change', (event) => {
    const file = event.target.files[0];

    const extension = file.name.split('.').pop().toLowerCase();

    if (!allowedExtensions.includes(extension)) {
        alert(`Only JPG, PNG, and SVG images are allowed. 
             You selected a "${extension}" file.`);
        imageChooser.value = ''; // Clear the selection
        return;
    } else {
        var selectedFiles = imageChooser.files;
        var length = selectedFiles.length;
        // var srcImg = document.getElementById("i0");
        // if(srcImg.src == ""){
        //     document.getElementById("imgDiv2").className = "d-none";
        //     document.getElementById("imgDiv3").className = "d-none";
        //     document.getElementById("imgDiv4").className = "d-none";
        // }
        if (length == 0) {
            document.getElementById("imgDiv2").className = "d-none";
            document.getElementById("imgDiv3").className = "d-none";
            document.getElementById("imgDiv4").className = "d-none";
        }
        if (length == 1) {
            document.getElementById("imgDiv2").className = "d-none";
            document.getElementById("imgDiv3").className = "d-none";
            document.getElementById("imgDiv4").className = "d-none";
        }
        if (length == 2) {
            whichImage = 0
            document.getElementById("r21").checked = false;
            document.getElementById("r22").checked = false;
            document.getElementById("imgDiv3").className = "d-none";
            document.getElementById("imgDiv4").className = "d-none";
            document.getElementById("imgDiv2").className = "d-block";
        }
        if (length == 3) {
            whichImage = 0
            document.getElementById("r31").checked = false;
            document.getElementById("r32").checked = false;
            document.getElementById("r33").checked = false;
            document.getElementById("imgDiv2").className = "d-none";
            document.getElementById("imgDiv4").className = "d-none";
            document.getElementById("imgDiv3").className = "d-block";
        }
        if (length == 4) {
            whichImage = 0
            document.getElementById("r41").checked = false;
            document.getElementById("r42").checked = false;
            document.getElementById("r43").checked = false;
            document.getElementById("r44").checked = false;
            document.getElementById("imgDiv2").className = "d-none";
            document.getElementById("imgDiv3").className = "d-none";
            document.getElementById("imgDiv4").className = "d-block";
        }

    }

    // Additional checks (optional)
    // - Check file size
    // - Check image dimensions
    // ...
});


function addProduct() {
    var title = document.getElementById("title");
    var description = document.getElementById("description");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var condition = 0;

    if (document.getElementById("condition1").checked) {
        condition = 1;
    } else if (document.getElementById("condition2").checked) {
        condition = 2;
    }

    var qty = document.getElementById("qty");
    var cost = document.getElementById("price");
    var discount = document.getElementById("discount");
    var image = document.getElementById("imgChooser");
    var color = document.getElementById("color");
    var discount_type = document.getElementById("discount_type");

    var imageLength = image.files.length;

    if (imageLength == 0) {
        whichImage = 0;
    } else if (imageLength == 1) {
        whichImage = 0;
    } else if (imageLength == 2) {
        if (document.getElementById("r21").checked) {
            whichImage = 0;
        } else if (document.getElementById("r22").checked) {
            whichImage = 1;
        }
    } else if (imageLength == 3) {
        if (document.getElementById("r31").checked) {
            whichImage = 0;
        } else if (document.getElementById("r32").checked) {
            whichImage = 1;
        } else if (document.getElementById("r33").checked) {
            whichImage = 2;
        }
    } else if (imageLength == 4) {
        if (document.getElementById("r41").checked) {
            whichImage = 0;
        } else if (document.getElementById("r42").checked) {
            whichImage = 1;
        } else if (document.getElementById("r43").checked) {
            whichImage = 2;
        } else if (document.getElementById("r44").checked) {
            whichImage = 3;
        }
    }


    // alert(title.value);
    // alert(description.value);
    // alert(cost.value);
    // alert(discount.value);
    // alert(qty.value);
    // alert(condition);
    // alert(image.Files);
    // alert(category.value);
    // alert(brand.value);
    // alert(model.value);

    var f = new FormData();
    f.append("title", title.value);
    f.append("desc", description.value);
    f.append("price", cost.value);
    f.append("discount", discount.value);
    f.append("qty", qty.value);
    f.append("condition", condition);
    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }
    f.append("cat", category.value);
    f.append("brand", brand.value);
    f.append("model", model.value);
    f.append("color", color.value);
    f.append("whichImage", whichImage);
    f.append("discount_type",discount_type.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("addProductDiv").style.display = "none";
                window.location.href = "becomeASeller.php";
                document.getElementById("title").value = "";
                document.getElementById("description").value = "";
                document.getElementById("category").value = "";
                document.getElementById("brand").value = "";
                document.getElementById("model").value = "";
                document.getElementById("qty").value = "";
                document.getElementById("price").value = "";
                document.getElementById("discount").value = "";
                document.getElementById("discount_type").value = "";
                document.getElementById("imgChooser").value = "";
                document.getElementById("color").value = "";

            } else {
                document.getElementById("addProduct").innerHTML = t;
                document.getElementById("addProductDiv").style.display = "block";
            }
        }
    }
    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}

function changeProductImage() {

    var image = document.getElementById("imgChooser");

    image.addEventListener('input', () => {
        for (var x = 0; x < 4; x++) {
            document.getElementById("i" + x).src = "./resource/addProduct/addproductimg.svg";
            document.getElementById("imgDiv2").className = "d-none";
            document.getElementById("imgDiv3").className = "d-none";
            document.getElementById("imgDiv4").className = "d-none";
        }
    });

    image.onchange = function () {
        var file_count = image.files.length;

        if (file_count <= 4) {
            document.getElementById("addProductDiv").style.display = "none";
            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        } else {
            document.getElementById("addProduct").innerHTML = file_count + " files. You are proceed to upload only 4 or less than 4 files.";
            document.getElementById("addProductDiv").style.display = "block";
        }
    }

}

function openDisType(){
    document.getElementById("disType").className = "d-block";
}