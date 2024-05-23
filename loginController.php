<?php

session_start();

include('connection.php');
//$email = $_POST['email'];
//$entered_password = $_POST['password'];
$login=new loginController($connect);
$user=$login->getUser();
$login->check($user);
$instance->closeConnection();

class loginController{
  private $connect;
  public function __construct($connection)
  {
    $this->connect=$connection;
  }

  public function getUser()
  {
    $email=$_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($this->connect, $sql);
    return $result;
  }
  public function check($result)
  {
    $entered_password=$_POST['password'];
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if ($entered_password==$row['password']) 
      {
        echo "Login successful for: " . $row['username'] . "<br>";
        echo "Welcome back!";
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username']=$row['username'];
        header("Location: mainpage.php");
        exit;
      } else {
        echo "Invalid password.";
      }
    } else {
      echo "Invalid email or password.";
    }
  }

}

?>
