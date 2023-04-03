<?php
/**
 * @require login_restri.php This file restricts access to users which are not login.
 * 
 * @require_once ../models/modelactionuserpost.php This file contains the UserPost class.
 * 
 * @require_once ../views/personal.php This file containing the HTML for displaying users post.
 */
require('login_restri.php');
session_start();
require_once('../models/modelactionuserpost.php');

//connecting through database to retrive the firstname and lastname
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "test";
// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

//session variable
$email = $_SESSION['email'];

//query to retrieve the firstname and lastname from signup 
$sql_name = "SELECT FirstName, LastName FROM signup WHERE email = '$email'";
$sql_name_res = mysqli_query($conn, $sql_name); 
if (mysqli_num_rows($sql_name_res) == 0){
  echo("No rows found from login table");
}
$sql_res = mysqli_fetch_assoc($sql_name_res);
$fname = $sql_res['FirstName'];
$lname = $sql_res['LastName'];

//creting a new instance of UserPost class
$user_post = new UserPost();
//calling function getUserPost
$userpost = $user_post->getUserPost($fname, $lname);

/**
 * @require_once '../Views/personal.php' This contains the html for the following data.
 */
require_once('../Views/personal.php');

//if user wants to delete his post
if (isset($_POST['delete_post'])){
  $postid = $_POST['post_id'];
  $user_post->deletepost($postid);
}

//if the user wants to edit his post.
if (isset($_POST['edit_post'])){
  $postid = $_POST['post_id'];
  $edit = $_POST['edit'];
  $user_post_edit->editpost($postid, $edit);
}
?>

