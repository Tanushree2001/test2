<?php
/**
 * @require ../controllers/login_restri.php restricts the user who has not logged in.
 */
require('../controllers/login_restri.php');
/**
 * This class insert the data in detail table
 */
class Detail{
  private $conn;
  
  /**
   * Construct a new Post's instance and establishes a database connection.
   */
  public function __construct()
  {
    $servername = "localhost";
    $username = "root";
    $password = "toor";
    $dbname = "test";

    $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$this->conn){
      die('Connection failed: ' .mysqli_connect_error());
    }  
  }
  /**
   * This function is used to insert the title , content ,names in database
   * 
   * @param string $title contains the title of the card.
   * @param string $content contains the content.
   * @param string $email contains the email of user.
   */
  public function get_detail($title, $content , $email){

    //This query retrieves the firstname and lastname from the signup table according the current user.
    $sql_name = "SELECT FirstName, LastName FROM signup WHERE email = '$email'";
    $sql_name_res = mysqli_query($this->conn, $sql_name); 
    if (mysqli_num_rows($sql_name_res) == 0){
      echo("No rows found from login table");
    }
    $sql_res = mysqli_fetch_assoc($sql_name_res);

    //This query insert the data in detail table.
    $sql = "INSERT INTO detail(Firstname, Lastname, Title, Content) VALUES('{$sql_res['FirstName']}','{$sql_res['LastName']}','$title','$content')";
    $res = mysqli_query($this->conn, $sql);
    if(!$res){
      echo "not inserted";
    }
  }
}
?>