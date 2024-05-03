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
    window.location.href = "myWishlist.php";
  } else {
    window.location.href = "mobileMyWishlist.php";
    // Screen became narrower
  }
});

function backToSingle(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4 && r.status == 200) {
          var t = r.responseText;
          if (t == "success") {
              window.location.href = "singleProduct.php";
          } else {
              alert(t);
          }
      }
  }
  r.open("GET", "redirectSinglePageFromWishlist.php?x=" + x, true);
  r.send();
}

function deleteFromWishlist(x){
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
      if(r.readyState == 4 && r.status == 200){
          var t = r.responseText;
          if(t == "success"){
              window.location.reload();
          }
      }
  }
  r.open("GET","deleteFromWishlistProcess.php?x="+x,true);
  r.send();
}

function addTocartOne(x){
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
      if(r.readyState == 4 && r.status == 200){
          var t = r.responseText;
          if(t == "success"){
              window.location.reload();
          } else {
              window.location.reload();
          }
      }
  }
  r.open("GET","addToCartFromWishlistOneProcess.php?x="+x,true);
  r.send();
}

function addAllTocart(){
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
      if(r.readyState == 4 && r.status == 200){
          var t = r.responseText;
          if(t == "success"){
              window.location.reload();
          }else{
              window.location.reload();
          }
      }
  }
  r.open("GET","addToCartAllProcess.php",true);
  r.send();
}

function goHomeFromWish(){
  window.location.href = "index.php";
}