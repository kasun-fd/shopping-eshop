<?php

function generateID() {
    // Use random_int for cryptographically secure random number generation
    $random_number = random_int(1000000000, 9999999999); // Generate a random 9-digit integer
  
    // Prepend "#" symbol
    return "#" . $random_number;
  }
  

?>