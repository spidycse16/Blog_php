<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if(strlen($password)<8)
{
    $password="";
}
  if (!empty($name) && !preg_match("/^[a-zA-Z\s\-']+$/", $name)) {
    $name="";
  }
  
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $email= "";
  }
 // echo $username.$email.$password;
$sql="insert into users(username,email,password) values('$username','$email','$password')";
if($username && $email && $password)
$result=mysqli_query($conn,$sql);
if ($result) {
  echo "Registration successful! You will be redirected to the login page in 5 seconds.";
  header("Refresh: 5; url=login.php"); 
} else {
  echo "Failed to register. Please try again.";
}

?>