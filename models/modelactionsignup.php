<?php
/**
 * This class handles login functionality
 * This class store the data in signup table.
 */
class Signup{
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
   * Check if a users login credential are valid
   * 
   * @param string $firstname consist of users firstname.
   * @param string $lastname consist of users lastname.
   * @param string $email consist of email of user.
   * @param string $user_password consist of user password. 
   */
  public function signupuser($firstname, $lastname, $email, $user_password){
    echo('inside function');
    $query = "INSERT INTO signup (FirstName ,LastName ,email ,password) VALUES ('$firstname','$lastname','$email','$user_password')";
    $result = mysqli_query($this->conn, $query);
    if($result){
      return true;
    }else{
      return false;
    }

  }
}

?>
