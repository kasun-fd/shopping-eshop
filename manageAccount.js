//   ======================== Set Greeting =================

function updateGreeting() {
  const date = new Date();
  const hours = date.getHours();
  let greeting;

  if (hours < 12) {
    greeting = "Good Morning,";
  } else if (hours < 18) {
    greeting = "Good Afternoon,";
  } else {
    greeting = "Good Evening,";
  }

  // Update DOM element
  const greetingElement = document.getElementById("greetingManage");
  greetingElement.textContent = greeting;
}

// Update greeting every 10 seconds
setInterval(updateGreeting, 1);

function changePassword() {
  document.getElementById("myProfileContent").className = "d-none";
  document.getElementById("msgDivUpdateProfile").className = "d-none";
  document.getElementById("changePasswordContent").classList.add("d-block");

}

function myProfile() {
  window.location.reload();
  // document.getElementById("myProfileContent").className = "d-block";
  // document.getElementById("changePasswordContent").className = "d-none";
}

function changeProfileImg() {
  var img = document.getElementById("upoadImage");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    document.getElementById("img").src = url;
    document.getElementById("comfirmButtons").className = "d-block";
  }
}

function confirmDP(){
  var img = document.getElementById("upoadImage");

  var f = new FormData();
  f.append("img",img.files[0]);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState ==  4 && r.status == 200){
      var t = r.responseText;
      if(t == "Saved"){
        document.getElementById("comfirmButtons").className = "d-none";
        window.location.reload();
      }else if(t == "Updated"){
        document.getElementById("comfirmButtons").className = "d-none";
        window.location.reload();
      }else{
        alert(t);
      }
    }
  }
  r.open("POST","profileUploadProccessDesktop.php",true);
  r.send(f);
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");


  // alert(fname);
  // alert(lname);
  // alert(mobile);
  // alert(line1);
  // alert(line2);
  // alert(province);
  // alert(district);
  // alert(city);
  // alert(pcode);
  // alert(image);

  var f = new FormData();
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("mobile", mobile.value);
  f.append("line1", line1.value);
  f.append("line2", line2.value);
  f.append("province", province.value);
  f.append("district", district.value);
  f.append("city", city.value);
  f.append("pcode", pcode.value);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "save" || t == "update") {
        window.location.reload();
      } else {
        if (t == "updatePlease Enter Your Address Line two.") {
          document.getElementById("msgProfileUpdate").innerHTML = "Please Enter Your Address Line two.";
          document.getElementById("msgDivUpdateProfile").classList.add("show");
        } else if (t == "updatePlease Enter Your Postal Code.") {
          document.getElementById("msgProfileUpdate").innerHTML = "Please Enter Your Postal Code.";
          document.getElementById("msgDivUpdateProfile").classList.add("show");
        } else if (t == "updatePlease Select Your Province.") {
          document.getElementById("msgProfileUpdate").innerHTML = "Please Select Your Province.";
          document.getElementById("msgDivUpdateProfile").classList.add("show");
        } else if (t == "updatePlease Select Your District.") {
          document.getElementById("msgProfileUpdate").innerHTML = "Please Select Your District.";
          document.getElementById("msgDivUpdateProfile").classList.add("show");
        } else if (t == "updatePlease Select Your City.") {
          document.getElementById("msgProfileUpdate").innerHTML = "Please Select Your City.";
          document.getElementById("msgDivUpdateProfile").classList.add("show");
        } else {
          window.location.reload();
        }
      }
    }
  }

  r.open("POST", "updateProfile.php", true);
  r.send(f);
}


// if(window.innerWidth < 768){
//   window.location.href = "mobileProfileInfo.php";
// }
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
    
  } else {
    window.location.href = "mobileAccount.php";
    // Screen became narrower
  }
});

// ====================== not now =====================
function notNow(){
  window.location.reload();
}
