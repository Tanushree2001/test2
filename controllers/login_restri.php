<?php
/**
 * This part does not access user if he is not logged in
 */
session_start();
if($_SESSION['loggedin']!==true){
  header('Location: ../public/index.php');
}
?>