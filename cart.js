function removeCart(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("GET","cartRemoveProcess.php?x="+x,true);
    r.send();
}

function continueShopping(){
    window.location.href = "index.php";
}

function deleteAllCart(){
    var r = new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "index.php";
            }
        }
    }
    r.open("GET","deleteAllProcess.php",true);
    r.send();
}

function goToSimglePage(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "singleProduct.php";
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","redirectSingleProductPageFromCart.php?x="+x,true);
    r.send();
}

function wishlistCart(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("GET","fromCartToAddWatchlistProcess.php?x="+x,true);
    r.send();
}

function deleteFromCartWishlist(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("GET","deleteFromCartWishlistOne.php?x="+x,true);
    r.send();
}

function checkoutcart(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "checkoutPage.php";
            }
        }
    }
    r.open("POST","checkoutCartProcess.php",true);
    r.send();
}