<?php
include 'Connection/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$validator=new validate();
$validator->checkName($username);
$validator->checkPassword($password);
$validator->checkEmail($email);
$registor=new register($connect);
$registor->checkRegister($username, $email, $password);

class validate
{
  public function checkName($name)
  {
    if (!empty($name) && !preg_match("/^[a-zA-Z\s\-']+$/", $name)) {
      $name = "";
    }
  }
  public function checkEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $email = "";
    }
  }

  public function checkPassword($password)
  {
    if (strlen($password) < 8) {
      $password = "";
    }
  }
}

class register{
  private $connect;
  public function __construct($connection){
    $this->connect=$connection;
  }

  public function checkRegister($username,$email,$password)
  {
    $sql = "insert into users(username,email,password) values('$username','$email','$password')";
if ($username && $email && $password)
  $result = mysqli_query($this->connect, $sql);
if ($result) {
  echo "Registration successful! You will be redirected to the login page in 5 seconds.";
  header("Refresh: 5; url=Views/login.php");
} else {
  echo "Failed to register. Please try again.";
}

  }
}

?>