// if(window.innerWidth < 768){
//   window.location.href = "mobileProfileInfo.php";
// }
window.onload = handleDropdownChange;
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
    window.location.href = "myOrders.php";
  } else {
    window.location.href = "mobileMyOrder.php";
    // Screen became narrower
  }
});

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

function handleDropdownChange(event){
  const selectedValue = event.target.value;

  var list = 15;

  // Perform actions based on the selected value
  if(selectedValue === "5"){
    list = 5;
  } else if (selectedValue === "15") {
    list = 15;
  } else if (selectedValue === "30") {
    list = 30;
  } else if (selectedValue === "all") {
    list = "all";
  } else {
    list  = 5;
  }

  var f = new FormData();
  f.append("list",list);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t = r.responseText;
      document.getElementById("addContent").innerHTML = t;
    }
  }
  r.open("POST","chageListProcess.php",true);
  r.send(f);

}
// window.onload = dropdown;
const dropdown = document.getElementById("orderDate");
dropdown.addEventListener("change", handleDropdownChange);

// window.onload = dropdownMenu;


function goToIndexFromOrder(){
  window.location.href = "index.php";
}