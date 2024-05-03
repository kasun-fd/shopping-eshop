// ================ LOGIN ======================

const forms = document.querySelector(".forms"),
    pwShowHide = document.querySelectorAll(".eye-icon")

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

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

function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

// ====================================================

var bm;
function forgotPassword() {
    var email = document.getElementById("emailSignIn");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState = 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                document.getElementById("msg1").innerHTML = t;
                document.getElementById("msgdiv1").classList.add("show");
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function showPassword() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {
        rnp.type = "text";
        rnpb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        rnp.type = "password";
        rnpb.innerHTML = '<i class="bi bi-eye"></i>';
    }
}

function closeX() {
    window.location.reload();
}

function resetPassword() {
    var email = document.getElementById("emailSignIn");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("np", np.value);
    f.append("rnp", rnp.value);
    f.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                swal({
                    title: "Good job!",
                    text: "Wait...",
                    icon: "success",
                    button: false
                });



                bm.hide();

                document.getElementById("PasswordSignIn").value = "";
                document.getElementById("np").value = "";
                document.getElementById("rnp").value = "";
                document.getElementById("vc").value = "";

                setTimeout(function () {
                    window.location.reload();
                }, 1000); // Delay of 2000 milliseconds (2 seconds)

            } else {
                document.getElementById("msg3").innerHTML = t;
                document.getElementById("msgdiv3").className = "d-block";
            }
        }
    };

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);
}

//   function cancelCookie(){
//     alert(ok);
//   }