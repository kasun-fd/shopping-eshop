pwShowHide = document.querySelectorAll(".eye-icon")

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".passwordCom");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
})

pwShowHide1 = document.querySelectorAll(".eye-icon1")
pwShowHide1.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".passwordNew");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
})

pwShowHide1 = document.querySelectorAll(".eye-iconCur")
pwShowHide1.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".passwordCur");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
})

// var textField = document.getElementById("passwordCur");
// textField.oninput = function () {

//     var f = new FormData();
//     f.append("cur", textField.value);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function () {
//         if (r.readyState == 4 && r.status == 200) {
//             var t = r.responseText;
//             if (t == "success") {
//                 document.getElementById("msgCursuc").innerHTML = "Success";
//                 document.getElementById("msgdivCursuc").classList.add("show");
//                 document.getElementById("msgdivCur").classList.add("hide");
//             } else {
//                 document.getElementById("msgCur").innerHTML = t;
//                 document.getElementById("msgdivCur").classList.add("show");
//             }
//         }
//     }
//     r.open("POST", "changePasswordProcess.php", true);
//     r.send(f);
// };

function validateSignupForm() {
    var curP = document.getElementById("passwordCur");
    var newP = document.getElementById("passwordNew");
    var comP = document.getElementById("confirmPassword");

    var f = new FormData();
    f.append("curP", curP.value);
    f.append("newP", newP.value);
    f.append("comP", comP.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                if (window.innerWidth > 768) {
                    // Your action for screens wider than 768px
                    document.getElementById("msgdivCur").classList.add("hide");
                    window.location.href = "manageAccount.php";
                } else {
                    document.getElementById("msgdivCur").classList.add("hide");
                    window.location.href = "mobileAccount.php";
                }
            } else {
                document.getElementById("msgCur").innerHTML = t;
                document.getElementById("msgdivCur").classList.add("show");
            }
        }
    }
    r.open("POST", "changePasswordProcess.php", true);
    r.send(f);
}

function changePassword(event) {
    if (event.key === 'Enter') {

        validateSignupForm();
    }
}

function changePassword1(event) {
    if (event.key === 'Enter') {

        validateSignupForm();
    }
}

window.addEventListener('resize', function () {
    if (window.innerWidth > 768) {
        window.location.href = "manageAccount.php";
    }
});