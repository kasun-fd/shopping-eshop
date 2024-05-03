const mediaQuery = window.matchMedia('(min-width: 768px)');

// You can also listen for changes in the screen state
mediaQuery.addEventListener('change', (event) => {
    if (event.matches) {

    } else {
        window.location.href = "index.php";
    }
});


function sellerLogin() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.href = "becomeASeller.php";
                document.getElementById("sellerLoginDiv").style.display = "none";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
            } else {
                document.getElementById("sellerLogin").innerHTML = t;
                document.getElementById("sellerLoginDiv").style.display = "block";
            }
        }
    }
    r.open("POST", "becomeASellerLoginLoginProcess.php", true);
    r.send(f);
}

function pressLogin(event) {
    if (event.key == 'Enter') {
        sellerLogin();
    }
}

function forgotPasswordSeller() {
    document.getElementById("loginDiv").style.display = "none";
    document.getElementById("resetDiv").style.display = "none";
    document.getElementById("nicDiv").style.display = "block";

}

function nicCheck() {
    var nic = document.getElementById("nicCheck");

    var f = new FormData();
    f.append("n", nic.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("sellerNicDiv").style.display = "none";
                document.getElementById("loginDiv").style.display = "none";
                document.getElementById("nicDiv").style.display = "none";
                document.getElementById("resetDiv").style.display = "block";
                document.getElementById("nicCheck").value = "";
            } else {
                document.getElementById("sellerNic").innerHTML = t;
                document.getElementById("sellerNicDiv").style.display = "block";
            }
        }
    }
    r.open("POST", "nicProcess.php", true);
    r.send(f);
}

function pressNic(event) {
    if (event.key == 'Enter') {
        nicCheck();
    }
}

function resetSeller() {
    var newpass = document.getElementById("resetSellerNew");
    var compass = document.getElementById("resetSellerCom");
    var code = document.getElementById("varCode");

    var f = new FormData();
    f.append("newPass", newpass.value);
    f.append("comPass", compass.value);
    f.append("code", code.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("resetPassSellerDiv").style.display = "none";
                document.getElementById("nicDiv").style.display = "none";
                document.getElementById("resetDiv").style.display = "none";
                document.getElementById("loginDiv").style.display = "block";
                document.getElementById("resetSellerNew").value = "";
                document.getElementById("resetSellerCom").value = "";
                document.getElementById("varCode").value = "";
                window.location.reload();
            } else {
                document.getElementById("resetPass").innerHTML = t;
                document.getElementById("resetPassSellerDiv").style.display = "block";
            }
        }
    }
    r.open("POST", "resetSellerProcess.php", true);
    r.send(f);
}

function pressReset(event) {
    if (event.key == 'Enter') {
        resetSeller();
    }
}