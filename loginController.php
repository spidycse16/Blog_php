<?php

session_start();

include('connection.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);

  if ($password==$row['password']) 
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

mysqli_close($conn);

?>
