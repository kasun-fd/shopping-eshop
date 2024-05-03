function changeProfileImgMobile(){
    var img = document.getElementById("upoadImageMobile");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    document.getElementById("imgMobile").src = url;
    document.getElementById("buttoncon").className = "d-block";
  }
}

function updateProfile(){
  var img = document.getElementById("upoadImageMobile");

  var f = new FormData();
  f.append("img",img.files[0]);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t = r.responseText;
      if(t == "Saved"){
        document.getElementById("buttoncon").className = "d-none";
        window.location.reload();
      }else if(t == "Updated"){
        document.getElementById("buttoncon").className = "d-none";
        window.location.reload();
      }else{
        alert(t);
      }
    }
  }
  r.open("POST","profileImageUpdate.php",true);
  r.send(f);
}

function notNowCon(){
  window.location.reload();
}

// ============================= ALERT ================================

let box = document.querySelector(".box");
let image = document.querySelector(".image");
let message = document.querySelector(".message");


let alertDisplayed = false;

window.onload = function () {
  if (!alertDisplayed) {
    setTimeout(() => {
      box.style.transitionDelay = "unset";
      box.style.top = "8%";
      box.style.position = "fixed";
      message.style.fontSize = "13px";
      message.style.margin = "0px 0px 0px 5px";
      message.style.transitionDelay = "500ms";
    }, 1500);

    settimeout = setTimeout(() => {
      box.style.top = "-10%";
      message.style.fontSize = "0px";
      message.style.margin = "0px";
      box.style.transitionDelay = "1000ms";

    }, 4000);
    alertDisplayed = true;
  }
};

// ================================== Screen Width ============================

const mediaQuery = window.matchMedia('(min-width: 768px)');

if (mediaQuery.matches) {
  // Apply styles or behavior for large screens
  document.body.style.display = 'none';
} else {
  // Apply styles or behavior for small screens
  document.body.style.display = 'block';
}

// You can also listen for changes in the screen state
mediaQuery.addEventListener('change', (event) => {
  if (event.matches) {
    window.location.href = "manageAccount.php";
  } else {
    // Screen became narrower
  }
});

//  ================================ profile update =============================

function saveProfile(){
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");

  var f = new FormData();
  f.append("fn",fname.value);
  f.append("ln",lname.value);
  f.append("m",mobile.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t = r.responseText;
      if(t == "updated"){
        window.location.reload();
      }else if(t == "saved"){
        window.location.reload();
      }else{
        alert(t);
      }
    }
  }
  r.open("POST","updateProfieBasic.php",true);
  r.send(f);
}

function pressProfile(event){
  if(event.key == 'Enter'){
    saveProfile();
  }
}
