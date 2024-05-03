function change(x) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("imageChange").src = t;
        }
    }
    r.open("GET", "changeImage.php?x=" + x, true);
    r.send();
}

function cart(x) {

    var option = document.getElementById("option_cart");
    var qty = document.getElementById("qty");

    var f = new FormData();
    f.append("x",x);
    f.append("qty",qty.value);
    f.append("option",option.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "notSet"){
                window.location.href = "login.php";
            } else if(t == "success"){
                window.location.reload();
            } else{
                alert(t);
            }
        }
    }
    r.open("POST","singleProductprocess.php",true);
    r.send(f);
}

function cartDelete(x){
    var qty = document.getElementById("qty");
    var f = new FormData();
    f.append("x",x);
    f.append("qty",qty.value);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("POST","cartDeleteProcess.php",true);
    r.send(f);
}

function buyNowProduct(x){
    var qty = document.getElementById("qty");
    var option = document.getElementById("option_cart");
    
    var f = new FormData();
    f.append("qty",qty.value);
    f.append("option",option.value);
    f.append("x",x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "checkoutPage.php";
            }
        }
    }
    r.open("POST","goToCheckoutFromSinglePage.php",true);
    r.send(f);
}

function watchAdd(x){
    var qty = document.getElementById("qty");
    var option = document.getElementById("option_cart");
    
    var f = new FormData();
    f.append("qty",qty.value);
    f.append("x",x);
    f.append("option",option.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "notSet"){
                window.location.href = "login.php";
            } else if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("POST","wishlistProcess.php",true);
    r.send(f)
}

function watchDelete(x){
    var qty = document.getElementById("qty");

    var f = new FormData();
    f.append("qty",qty.value);
    f.append("x",x);

    var r = new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("POST","wishDeleteProcess.php",true);
    r.send(f);
}

