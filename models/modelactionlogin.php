<?php
/**
 * @require ../controllers/login_restri.php This file restricts access to users which are not login.
 */
require('../controllers/login_restri.php');
/**
 * This class contains the login form data
 * and check if it matches with the signup table. 
 */
class Login{
  private $conn;

  /**
   * Construct a new userpost's instance and establishes a database connection.
   */
  public function __construct()
  { 
    $servername = 'localhost';
    $username = 'root';
    $password = 'toor';
    $dbname = 'test';

    $this->conn = mysqli_connect($servername, $username,$password,$dbname);
    if(!$this->conn){
      die('Connection failed: ' .mysqli_connect_error());
    }  	
  }
  
  /**
   * This function checks if any match data is having then returns true otherwise false.
   * 
   * @param string $email contains the email of the user.
   * @param string $password contains the password of the user.
   */

  public function loginuser($email, $password){
    echo('its inside function');
    $query = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($this->conn, $query);

    if (mysqli_num_rows($result)>0){
      return true;
    }else{
      return false;
    }
  }
}
?>
