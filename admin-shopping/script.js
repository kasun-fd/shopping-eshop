function getCodeIndex() {
    var fPage = document.getElementById("firstPage");
    var sPage = document.getElementById("secondPage");
    var email = document.getElementById("email");

    var f = new FormData();
    f.append("email", email.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                fPage.className = "d-none";
                sPage.className = "d-block";
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "getVerificationCodeProcess.php", true);
    r.send(f);
}

function backToFistPage() {
    window.location.reload();
}

function login() {
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("vcode", vcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.href = "dashboard.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "goToDashBoardPaseFromLoginProcess.php", true);
    r.send(f);
}

function logOut(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "index.php";
            }
        }
    }
    r.open("GET","logOutProcess.php",true);
    r.send();
}

function blockSeller(x){
    // var email = document.getElementById("getEmail");
    // alert(x);
    
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","blockSellerProcess.php?id="+x,true);
    r.send();

}

function unBlockSeller(x){
    // var email = document.getElementById("emailGet");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","unblockSellerProess.php?id="+x,true);
    r.send();
}

function unBlockUser(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","unblockUserProess.php?id="+x,true);
    r.send();
}

function blockUser(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("GET","blockUserProess.php?id="+x,true);
    r.send();
}

function searchSellers(){
    var text = document.getElementById("searchTextSeller");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState ==  4 && r.status == 200){
            var t = r.responseText;
            document.getElementById("tableBody").innerHTML = t;
        }
    }
    r.open("GET","searchSellerProcess.php?text="+text.value,true);
    r.send();
}

function searchUser(){
    var text = document.getElementById("searchTextUser");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState ==  4 && r.status == 200){
            var t = r.responseText;
            document.getElementById("tableBody").innerHTML = t;
        }
    }
    r.open("GET","searchUserProcess.php?text="+text.value,true);
    r.send();
}

function updateSlide(){
    var img_1 = document.getElementById("carousl_img_1");
    var img_2 = document.getElementById("carousl_img_2");
    var img_3 = document.getElementById("carousl_img_3");
    var img_4 = document.getElementById("carousl_img_4");
    var img_5 = document.getElementById("carousl_img_5");

    var f = new FormData();
    f.append("img1",img_1.files[0]);
    f.append("img2",img_2.files[0]);
    f.append("img3",img_3.files[0]);
    f.append("img4",img_4.files[0]);
    f.append("img5",img_5.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            alert(t);
        }
    }
    r.open("POST","updateCarouselSliders.php",true);
    r.send(f);
}

function getCode(event){
    if(event.key == "Enter"){
        getCodeIndex();
    }
}

function loginPress(event){
    if(event.key == "Enter"){
        login();
    }
}

function updateService(x){
    var name = document.getElementById("name");
    var number = document.getElementById("number");

    var f = new FormData();
    f.append("name",name.value);
    f.append("number",number.value);
    f.append("id",x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("POST","updateServiceProcess.php",true);
    r.send(f);
}