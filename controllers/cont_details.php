<?php
/**
 * @require ../contollers/login_restri.php This file restricts access to users which are not login.
 * 
 * @require_once ../models/modeldetail.php This file contains the class Detail
 */
require('login_restri.php');
//start the session 
session_start();
require_once('../models/modeldetail.php');

// Check if the form is submitted using with post method 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = $_POST['title'];
  $content = $_POST['content'];

  //session variable
  $email = $_SESSION['email'];

  //created a new instance of Detail class
  $detail = new Detail();
  $get_detail = $detail->get_detail($title, $content, $email);
  header('Location: cont_data.php'); 
}
?>