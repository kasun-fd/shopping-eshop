function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

const capitalizedSentence = capitalizeFirstLetter(sentence);


function signUp() {
  var fn = document.getElementById("fname").value;
  const fnn = capitalizeFirstLetter(fn);
  var ln = document.getElementById("lname").value;
  const lnn = capitalizeFirstLetter(ln);
  var e = document.getElementById("email");
  var pw = document.getElementById("password");
  var m = document.getElementById("mobile");
  var g = document.getElementById("gender");

  // var className = document.querySelector("");

  var f = new FormData();
  f.append("fname", fnn);
  f.append("lname", lnn);
  f.append("email", e.value);
  f.append("password", pw.value);
  f.append("mobile", m.value);
  f.append("gender", g.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "singleProductprocess.php") {
        window.location.href = "singleProduct.php";
      } else if (t == "cart.php") {
        window.location.href = "cart.php";
      } else if (t == "checkout") {
        window.location.href = "checkoutPage.php";
      } else if (t == "myOrder") {
        window.location.href = "myOrders.php";
      } else if (t == "wishlist.php") {
        if (window.innerWidth > 768) {
          window.location.href = "myWishlist.php";
        } else {
          window.location.href = "mobileMyWishlist.php";
        }
      } else if (t == "watchAdd") {
        window.location.href = "singleProduct.php";
      } else if (t == "Success") {

        if (window.innerWidth > 768) {
          // Your action for screens wider than 768px
          window.location.href = "index.php";
        } else {
          window.location.href = "mobileAccount.php";
        }

        document.getElementById("fname").value = "";
        document.getElementById("lname").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("mobile").value = "";
        document.getElementById("gender").value = "";


        setTimeout(function () {
          document.getElementById("fname").value = "";
          document.getElementById("lname").value = "";
          document.getElementById("email").value = "";
          document.getElementById("password").value = "";
          document.getElementById("mobile").value = "";
          document.getElementById("gender").value = "";
        }, 5);

      } else {
        document.getElementById("msg2").innerHTML = t;
        document.getElementById("msgdiv2").classList.add("show");
      }
    }
  }
  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}


// function signUpMobile() {
//   var fn = document.getElementById("fnameMobile").value;
//   const fnn = capitalizeFirstLetter(fn);
//   var ln = document.getElementById("lnameMobile").value;
//   const lnn = capitalizeFirstLetter(ln);
//   var e = document.getElementById("emailMobile");
//   var pw = document.getElementById("passwordMobile");
//   var m = document.getElementById("mobileMobile");
//   var g = document.getElementById("genderMobile");


//   // alert(fn);
//   // alert(ln);
//   // alert(e);
//   // alert(pw);
//   // alert(m);
//   // alert(g);

//   var f = new FormData();
//   f.append("fname", fnn);
//   f.append("lname", lnn);
//   f.append("email", e.value);
//   f.append("password", pw.value);
//   f.append("mobile", m.value);
//   f.append("gender", g.value);

//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4 && r.status == 200) {
//       var t = r.responseText;
//       if (t == "Success") {
//         window.location.href = "mobileAccount.php";
//       } else {
//         document.getElementById("msg2").innerHTML = t;
//         document.getElementById("msgdiv2").classList.add("show");
//       }
//     }
//   }

//   r.open("POST", "mobileSignUpPorcess.php", true);
//   r.send(f);

// }

const button = document.getElementById("close");
const button1 = document.getElementById("test");

button.addEventListener("click", function () {

  button1.remove();
});


function signInForm() {

  var email = document.getElementById("emailSignIn");
  var password = document.getElementById("PasswordSignIn");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "singleProductprocess.php") {
        window.location.href = "singleProduct.php";
      } else if (t == "cart.php") {
        window.location.href = "cart.php";
      } else if (t == "checkout") {
        window.location.href = "checkoutPage.php";
      } else if (t == "myOrder") {
        window.location.href = "myOrders.php";
      } else if (t == "wishlist.php") {
        if (window.innerWidth > 768) {
          window.location.href = "myWishlist.php";
        } else {
          window.location.href = "mobileMyWishlist.php";
        }
      } else if (t == "watchAdd") {
        window.location.href = "singleProduct.php";
      } else if (t == "success") {

        if (window.innerWidth > 768) {
          window.location.href = "index.php";
        } else {
          window.location.href = "mobileAccount.php";
        }


        // window.location.href = "index.php";
        // window.location.href = "mobileAccount.php";

      } else {
        document.getElementById("msg1").innerHTML = t;
        document.getElementById("msgdiv1").classList.add("show");
      }
    }
  }

  r.open("POST", "signInProcessNew.php", true);
  r.send(f);

}



function signInFormPress(event) {
  if (event.key === 'Enter') {
    signInForm();
    // Your function logic for Enter key press goes here
  }
}

function signUpPress(event) {
  if (event.key === 'Enter') {
    signUp();
    // Your function logic for Enter key press goes here
  }
}


// function signInMobile() {

//   var email = document.getElementById("emailM");
//   var password = document.getElementById("passwordM");

//   var f = new FormData();
//   f.append("e", email.value);
//   f.append("p", password.value);

//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4 && r.status == 200) {
//       var t = r.responseText;
//       if (t == "success") {




//         window.location.href = "mobileAccount.php";
//       } else {
//         document.getElementById("msg1").innerHTML = t;
//         document.getElementById("msgdiv1").classList.add("show");
//       }

//     }
//   }

//   r.open("POST", "mobileSignInProcess.php", true);
//   r.send(f);

// }

var bm;
function forgotPassword() {

  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        var m = document.getElementById("forgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        document.getElementById("msg2").innerHTML = t;
        document.getElementById("msgdiv2").className = "d-block";
      }
    }
  };

  r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}

function resetPassword() {
  var email = document.getElementById("email2");
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
          text: "Wait..",
          icon: "success",
          button: false
        });

        bm.hide();

        document.getElementById("email2").value = "";
        document.getElementById("password2").value = "";
        document.getElementById("rememberme").checked = false;
        grecaptcha.getResponse().value = "";

        document.getElementById("email2").value = "";
        document.getElementById("np").value = "";
        document.getElementById("rnp").value = "";
        document.getElementById("vc").value = "";

        setTimeout(function () {
          window.location.reload();
        }, 1000); // Delay of 2000 milliseconds (1 seconds)

      } else {
        document.getElementById("msg3").innerHTML = t;
        document.getElementById("msgdiv3").className = "d-block";
      }
    }
  };

  r.open("POST", "resetPasswordProcess.php", true);
  r.send(f);
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

// ==========================================================================

function truncateText(element, lines) {
  const originalText = element.textContent;
  const lineHeight = element.offsetHeight; // Assuming a fixed line height
  const maxHeight = lines * lineHeight;

  element.style.height = `${maxHeight}px`;
  element.style.overflow = 'hidden';

  if (element.offsetHeight > maxHeight) {
    element.textContent = originalText.slice(0, originalText.lastIndexOf(' ', maxHeight / lineHeight * 0.95)) + '...';
  }
}

const paragraph = document.getElementById('my-paragraph');
truncateText(paragraph, 2); // Truncate to 2 lines

// ==============================================================

window.addEventListener('scroll', function () {
  const contentContainer = document.getElementById('content-container');
  const scrollTop = contentContainer.scrollTop; // Distance scrolled within container
  const scrollHeight = contentContainer.scrollHeight; // Total height of content
  const viewportHeight = contentContainer.clientHeight; // Visible area height

  if (scrollTop + viewportHeight >= scrollHeight - 100) { // Trigger when near bottom
    loadMoreContent();
  }
});

function loadMoreContent() {
  const loadingIndicator = document.getElementById('loading-indicator');
  loadingIndicator.style.display = 'block'; // Show loading indicator

  // Simulate fetching new content (replace with your actual data fetching)
  setTimeout(function () {
    const newContent = document.createElement('div');
    newContent.innerHTML = `
<p>This is newly loaded content!</p>
<img src="https://example.com/image.jpg" alt="New content image">
`;
    document.getElementById('content-container').appendChild(newContent);
    loadingIndicator.style.display = 'none'; // Hide loading indicator
  }, 2000); // Delay to simulate loading time
}

function checkedRadio(x) {
  var status = x;
  var lang = document.getElementById("lang");

  if (x == 1) {
    lang.innerHTML = "ENG";
  } else {
    lang.innerHTML = "SIN";
  }
}

function redirectLogin() {
  window.location.href = "login.php";
}

function signout() {

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;
      if (response == "success") {

        window.location.reload();


      }
    }
  }

  request.open("GET", "signOutProcess.php", true);
  request.send();

}


// ========================== Search Dropdown =========================

function mainSearch(event) {
  const text = document.getElementById("mainSearch");
  document.getElementById("dropdownSearch").style.marginTop = "280px";
  document.getElementById("dropdownSearch").style.height = "230px";
  document.getElementById("dropdownSearch").style.display = "block";
  var searchBar = document.getElementById("mainSearch");
  if (searchBar.value == "") {
    document.getElementById("dropdownSearch").style.marginTop = "0px";
    document.getElementById("dropdownSearch").style.height = "0px";
    document.getElementById("dropdownSearch").style.display = "none";
  }
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      document.getElementById("dropdownSearch").innerHTML = t;
    }
  }
  r.open("GET", "mainSearchProcess.php?text=" + text.value, true);
  r.send();

  if (event.key == "Enter") {
    const searchText = document.getElementById("mainSearch");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4 && r.status == 200) {
        var t = r.responseText;
        if (t == "success") {
          window.location.href = "product_list.php";
        }
      }
    }
    r.open("GET", "goToProductListPageFromDesktopSearchProcess.php?text=" + searchText.value, true);
    r.send();
  }

}

function addTextToTextField(x) {
  const searchText = document.getElementById("mainSearch");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      searchText.value = t;
    }
  }
  r.open("GET", "addTextToTextFieldProcess.php?x=" + x, true);
  r.send();
}

function addTextToTextFieldModel(x) {
  const searchText = document.getElementById("mainSearch");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      searchText.value = t;
    }
  }
  r.open("GET", "addTextToTextFieldModelProcess.php?x=" + x, true);
  r.send();
}

function clickButtonAndGoProductList() {
  const text = document.getElementById("mainSearch");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "product_list.php";
      }
    }
  }
  r.open("GET", "clickButtonSearchProcess.php?text=" + text.value, true);
  r.send();
}

// ====================================================

const contentDiv = document.getElementById("content");
const loaderDiv = document.getElementById("loader");

let hasMoreContent = true; // Flag to indicate if more content is available
let loading = false; // Flag to prevent multiple simultaneous loading requests

window.addEventListener("scroll", () => {
  const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  const windowHeight = window.innerHeight;
  const contentHeight = contentDiv.scrollHeight;

  if (scrollTop + windowHeight >= contentHeight - 100 && hasMoreContent && !loading) {
    // User has scrolled near the bottom and more content is available
    loading = true; // Set loading flag to prevent further requests
    loaderDiv.style.display = "block"; // Show loading indicator

    // Simulate fetching new content (replace with your actual logic)
    setTimeout(() => {
      contentDiv.innerHTML += "<p>This is new content loaded on scroll.</p>";
      loading = false; // Reset loading flag
      loaderDiv.style.display = "none"; // Hide loading indicator

      // Check if there's more content available (update based on your logic)
      hasMoreContent = false; // Assuming this is the last page
    }, 1000); // Simulate a delay for fetching (replace with actual fetch time)
  }
});


// ============================ product index ======================

function getIndex(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "singleProduct.php";
      } else {
        alert(t);
      }
    }
  }
  r.open("GET", "puttingIndexIntoSingleProduct.php?x=" + x, true);
  r.send();
}

function goToProductListPageFromCategories(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "product_list.php"
      }
    }
  }
  r.open("GET", "goToProductListPageFromCategories.php?x=" + x, true);
  r.send();
}

// ===========================================================

function goToOrderPageFromParchase() {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 & r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "myOrders.php";
      } else {
        window.location.href = "login.php";
      }
    }
  }
  r.open("GET", "sessionProcessOrder.php", true);
  r.send();
  // window.location.href = "myOrders.php";
}

function goToIndexPageFromParchase() {
  window.location.href = "index.php";
}
// {/* <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> */}

function downloadReciept() {
  html2canvas(document.body).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    const doc = new jsPDF();
    doc.addImage(imgData, 'PNG', 0, 0);
    doc.save('download.pdf');
  });
}

// function getPrint() {
//   window.print();
// }

function searchMobile() {
  window.location.href = "mobile_search.php";
}

function backToIndexFromSearchPage() {
  window.location.href = "index.php";
}

function searchBoxOpen(event) {
  const searchText = document.getElementById("searchText");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "empty") {
        document.getElementById("searchResultBox").className = "d-none";
      } else {
        document.getElementById("searchResultBox").innerHTML = t;
        document.getElementById("searchResultBox").className = "d-block";
      }
    }
  }
  r.open("GET", "mobileSearchTextProcess.php?searchText=" + searchText.value, true);
  r.send();
}

function addTextToInput(x) {
  const searchText = document.getElementById("searchText");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      searchText.value = t;
    }
  }
  r.open("GET", "addTextFromBrandProcess.php?x=" + x, true);
  r.send();
}

function addTextToInputFromModel(x) {
  const searchText = document.getElementById("searchText");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      searchText.value = t;
    }
  }
  r.open("GET", "addTextFromModelProcess.php?x=" + x, true);
  r.send();
}

function triggerBrand(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        if (window.innerWidth > 768) {
          window.location.href = "product_list.php";
        } else {
          window.location.href = "mobile_product_list.php";
        }
      }
    }
  }
  r.open("GET", "triggerBrandProcess.php?x=" + x, true);
  r.send();
}

function triggerModel(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        if (window.innerWidth > 768) {
          window.location.href = "product_list.php";
        } else {
          window.location.href = "mobile_product_list.php";
        }

      }
    }
  }
  r.open("GET", "triggerModelProcess.php?x=" + x, true);
  r.send();
}

function searchMobileButton() {
  const searchText = document.getElementById("searchText");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.href = "mobile_product_list.php";
      }
    }
  }
  r.open("GET", "searchButtonMobileProcess.php?text=" + searchText.value, true);
  r.send();
}

function backToIndexFromProductPage() {
  window.location.href = "mobile_search.php";
}

function goToSearchPageFromProductList() {
  window.location.href = "mobile_search.php";
}

function goToCartFromProductList() {
  window.location.href = "cart.php";
}

function getCategoryDataMobile(x) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      }
    }
  }
  r.open("GET", "filterCategoryToProductListMobile.php?x=" + x, true);
  r.send();
}

function goWishlist(){
  if (window.innerWidth > 768) {
    window.location.href = "myWishlist.php";
  } else {
    window.location.href = "mobileMyWishlist.php";
  }
}

function goOrder(){
  if (window.innerWidth > 768) {
    window.location.href = "myOrders.php";
  } else {
    window.location.href = "mobileMyOrder.php";
  }
}

function showShop(){
  window.location.href = "flashSale.php";
}