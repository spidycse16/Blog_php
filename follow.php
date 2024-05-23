<?php

session_start();

include 'connection.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$follower_id = $_SESSION['user_id'];
$following_id = $_POST['following_id'];
$following_name=$_POST['following_name'];
$check_sql = "SELECT * FROM followers WHERE follower_id = $follower_id AND following_id = $following_id";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
  echo "You already follow this user.";
  exit;
}

$sql = "INSERT INTO followers (follower_id, following_id) VALUES ($follower_id, $following_id)";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "You are following $following_name";
} else {
  echo "Failed to follow user.";
}

mysqli_close($conn); // Close connection

?>
