function goingToLogin() {
  window.location.href = "login.php";
}

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
  const greetingElement = document.getElementById("greeting");
  greetingElement.textContent = greeting;
}

// Update greeting every 10 seconds
setInterval(updateGreeting, 1);

// ============================= ALERT ================================

let box = document.querySelector(".box");
let image = document.querySelector(".image");
let message = document.querySelector(".message");


let alertDisplayed = false;

window.onload = function () {
  if (!alertDisplayed) {
    setTimeout(() => {
      box.style.transitionDelay = "unset";
      box.style.top = "14%";
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


