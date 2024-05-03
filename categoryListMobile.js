function hideElement() {
    // Use your preferred method to hide the element:
    document.getElementById('bodyCategories').style.display = 'block';
    // - element.classList.add('hidden');
    // ...
}

function showElement() {
    // Use your preferred method to show the element:
    document.getElementById('bodyCategories').style.display = 'none';
    // - element.classList.remove('hidden');
    // ...
}

function checkScreenSize() {
    let screenWidth = window.innerWidth;
    // Set your desired breakpoint here
    if (screenWidth <= 768) {
        // Element is on a small screen
        hideElement();
    } else {
        // Element is on a large screen
        showElement();
        window.location.href = "index.php";
    }
}

window.onload = checkScreenSize; // Call on page load
window.onresize = checkScreenSize; // Call on window resize

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

jQuery('.faq__accordian-heading').click(function(e){
  e.preventDefault();
  if (!jQuery(this).hasClass('active')) {
      jQuery('.faq__accordian-heading').removeClass('active');
      jQuery('.faq__accordion-content').slideUp(500);
      jQuery(this).addClass('active');
      jQuery(this).next('.faq__accordion-content').slideDown(500);
  }
  else if (jQuery(this).hasClass('active')) {
      jQuery(this).removeClass('active');
      jQuery(this).next('.faq__accordion-content').slideUp(500);
  }
});
