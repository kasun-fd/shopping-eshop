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
  }
});

// ============================= ALERT ================================

let box = document.querySelector(".box");
let image = document.querySelector(".image");
let message = document.querySelector(".message");


let alertDisplayed = false;

window.onload = function () {
  if (!alertDisplayed) {
    setTimeout(() => {
      box.style.transitionDelay = "unset";
      box.style.top = "13%";
      box.style.position = "fixed";
      message.style.fontSize = "13px";
      message.style.margin = "0px 0px 0px 5px";
      message.style.transitionDelay = "500ms";
    }, 1000);

    settimeout = setTimeout(() => {
      box.style.top = "-10%";
      message.style.fontSize = "0px";
      message.style.margin = "0px";
      box.style.transitionDelay = "1000ms";

    }, 4000);
    alertDisplayed = true;
  }
};

// ================================ update & save Basic info ============================

function saveAddressInfo() {
  var line1 = document.getElementById("line01");
  var line2 = document.getElementById("line02");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");

  // alert(line1.value);
  // alert(line2.value);
  // alert(province.value);
  // alert(district.value);
  // alert(city.value);
  // alert(pcode.value);

  var f = new FormData();
  f.append("line1",line1.value);
  f.append("line2",line2.value);
  f.append("province",province.value);
  f.append("district",district.value);
  f.append("city",city.value);
  f.append("pcode",pcode.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if(t == "Saved"){
        document.getElementById("msgDivAddress").className = "d-none";
        window.location.reload();
      }else if(t == "Updated"){
        document.getElementById("msgDivAddress").className = "d-none";
        window.location.reload();
      }else{
        document.getElementById("msgAddress").innerHTML = t;
        document.getElementById("msgDivAddress").className = "d-block";
      }
    }
  }
  r.open("POST","addressProcessInfo.php",true);
  r.send(f);
}

function adressPress(event){
  if(event.key == 'Enter'){
    saveAddressInfo();
  }
}
