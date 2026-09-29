<?php
  $errors = array();
 
  // Fetch values from POST request
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $ccnumber = $_POST['ccnumber'];
  $phone    = $_POST['phone'];
 
  // 1. Email Validation
  if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
      $errors[] = "Invalid email format.";
  }
 
  // 2. Password Strength Validation (Must be at least 8 characters long)
  if (strlen($password) < 8) {
      $errors[] = "Password must be at least 8 characters long.";
  }
 
  // 3. Credit Card Validation (Must be exactly 16 digits)
  if (!preg_match("/^[0-8]{16}$/", $ccnumber)) {
      $errors[] = "Credit Card must be exactly 16 digits.";
  }
 
  // 4. Phone Number Validation (Must be exactly 10 digits)
  if (!preg_match("/^[0-8]{10}$/", $phone)) {
      $errors[] = "Phone Number must be exactly 10 digits.";
  }
 
  // Output results
  if (empty($errors)) {
      echo "<h3 style='color: green;'>Registration successful!</h3>";
  } else {
      echo "<h3 style='color: red;'>Validation Errors:</h3>";
      foreach ($errors as $e) {
          echo "- " . $e . "<br>";
      }
  }
?>
