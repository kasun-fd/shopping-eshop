const mediaQuery = window.matchMedia('(min-width: 768px)');

// You can also listen for changes in the screen state
mediaQuery.addEventListener('change', (event) => {
    if (event.matches) {

    } else {
        window.location.href = "index.php";
    }
});


function sellerSignup() {
    var full_name = document.getElementById("fullName");
    var user_name = document.getElementById("userName");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var nic = document.getElementById("nic");
    var male = document.getElementById("dot-1");
    var female = document.getElementById("dot-2");

    var aName = document.getElementById("aName");
    var aNum = document.getElementById("aNumber");
    var bank = document.getElementById("bank");
    var branch = document.getElementById("branch");

    var f = new FormData();
    f.append("fullName", full_name.value);
    f.append("uName", user_name.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("nic", nic.value);
    f.append("male", male.checked);
    f.append("female", female.checked);
    f.append("aName", aName.value);
    f.append("aNum", aNum.value);
    f.append("bank", bank.value);
    f.append("branch", branch.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("sellersignupDiv").style.display = "none";
                window.location.href = "becomeASeller.php";
                document.getElementById("fullName").value = "";
                document.getElementById("userName").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("nic").value = "";

                document.getElementById("aName").value = "";
                document.getElementById("aNumber").value = "";
                document.getElementById("bank").value = "";
                document.getElementById("branch").value = "";

            } else {
                document.getElementById("sellersignup").innerHTML = t;
                document.getElementById("sellersignupDiv").style.display = "block";
            }
        }
    }
    r.open("POST", "becomeSellerSignupProcess.php", true);
    r.send(f);

}

function pressSignup(event) {
    if (event.key == 'Enter') {
        sellerSignup();
    }
}


function showText() {
    document.getElementById("showContentPassword").style.display = "block";
}
