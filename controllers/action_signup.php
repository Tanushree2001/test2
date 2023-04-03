<?php
/**
 * This file is responsible for signing up of user 
 * It accepts user data via post method.
 * 
 * @require_once ../models/modelactionsignup.php contains the class Signup and method signupuser
 */

//  start the session to user data 
session_start();
require_once('../models/modelactionsignup.php');

// Check if the form is submitted using with post method 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $user_password = $_POST['password'];
  
  // created a new instance of Signup class 
  $signin = new Signup();
  $sign_in = $signin->signupuser($firstname, $lastname, $email, $user_password);
  echo('its working still ');

  //if it is successfull
  if($sign_in){
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header('Location: ../Views/details.php');
  }else{
    echo('incorrect email or password');
  }
}
?>