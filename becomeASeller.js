window.onload = function () {
  sort1(0);
};
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

const mediaQuery = window.matchMedia('(min-width: 768px)');

// You can also listen for changes in the screen state
mediaQuery.addEventListener('change', (event) => {
  if (event.matches) {

  } else {
    window.location.href = "index.php";
  }
});

function sendid(x) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;

      if (response == "Success") {
        window.location.href = "updateProduct.php";
      } else {
        alert(response);
      }
    }
  }

  request.open("GET", "sendIdProcess.php?id=" + x, true);
  request.send();
}

function changeStatus(id) {
  var product_id = id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;
      if (response == "deactivated" || response == "activated") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  }

  request.open("GET", "changeStatusProcess.php?id=" + product_id, true);
  request.send();

}

function sort1(x) {
  var search = document.getElementById("search");
  var min = document.getElementById("min");
  var max = document.getElementById("max");
  var date = 0;

  if (document.getElementById("new").checked) {
    date = 1;
  } else if (document.getElementById("old").checked) {
    date = 2;
  }

  var condition = 0;

  if (document.getElementById("brandNew").checked) {
    condition = 1;
  } else if (document.getElementById("used").checked) {
    condition = 2;
  }

  var qty = 0;

  if (document.getElementById("high").checked) {
    qty = 1;
  } else if (document.getElementById("low").checked) {
    qty = 2;
  }

  var f = new FormData();
  f.append("search", search.value);
  f.append("min", min.value);
  f.append("max", max.value);
  f.append("date", date);
  f.append("condition", condition);
  f.append("qty", qty);
  f.append("page", x);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      document.getElementById("sort").innerHTML = t;
    }
  }
  r.open("POST", "sortProcess.php", true);
  r.send(f);
}

function search(event) {
  if (event.key == 'Enter') {
    sort1(0);
  }
}

function clearSort() {
  window.location.reload();
}

function logoutSeller() {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "becomeASellerLoginLogin.php";
      } else {
        alert(t);
      }
    }
  }
  r.open("POST", "deleteSellerProcess.php", true);
  r.send();
}

// function refreshPage(){
//   window.location.reload();
// }

function addShippingSection(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
      if(r.readyState == 4 && r.status == 200){
        var t = r.responseText;
        window.location.reload();
      }
    }
    r.open("GET","addToShippingSectionProcess.php?x="+x,true);
    r.send();
}

function addShippedSection(x){
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t = r.responseText;
      window.location.reload();
    }
  }
  r.open("GET","addToShippedSection.php?x="+x,true);
  r.send();
}

function callToCustomer(email){
  // var callNumber = document.getElementById("callNumber");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t = r.responseText;
      // callNumber.href = "tel:t";
      // alert(t);
    }
  }
  r.open("GET","callProcess.php?x="+email,true);
  r.send();
}


