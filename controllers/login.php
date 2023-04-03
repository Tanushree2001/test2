<?php
/**
 * This file contains the login form 
 * It accepts users data via post method
 * 
 * @require_once '../models/modelactionlogin.php' This contains the class Login.
 */

//start the session to the user data.
session_start();
require_once('../models/modelactionlogin.php');

// Check if the form is submitted using with post method 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];
  $user_password = $_POST['password'];
  
  //create a new instance of login class
  $login = new Login();

  //call the function
  $login_user = $login->loginuser($email, $user_password);

  //if the result is true
  if($login_user){
    $_SESSION['email'] = $email;
    $_SESSION['loggedin'] = true;
    header('Location: ../Views/details.php');
  } else {
    echo "Incorrect email or password";
  }
}

?>