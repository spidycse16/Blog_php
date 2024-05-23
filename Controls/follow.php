<?php

session_start();

include '../Connection/connection.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: Views/login.php");
  exit;
}

$follower_id = $_SESSION['user_id'];
$following_id = $_POST['following_id'];
$following_name = $_POST['following_name'];
$follower = new followHandler($connect);
$flag = $follower->checkfollower($follower_id, $following_id, $following_name);
if ($flag == false)
  $follower->followuser($follower_id, $following_id, $following_name);
  $instance->closeConnection();
class followHandler
{
  private $connect;
  public function __construct($connection)
  {
    $this->connect = $connection;

  }
  public function checkfollower($follower_id, $following_id, $following_name)
  {
    $check_sql = "SELECT * FROM followers WHERE follower_id = $follower_id AND following_id = $following_id";
    $check_result = mysqli_query($this->connect, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
      echo "You already follow this user.";
      return true;
    } else {
      return false;
    }


  }

  public function followuser($follower_id, $following_id, $following_name)
  {
    $sql = "INSERT INTO followers (follower_id, following_id) VALUES ($follower_id, $following_id)";
    $result = mysqli_query($this->connect, $sql);

    if ($result) {
      echo "You are following $following_name";
    } else {
      echo "Failed to follow user.";
    }
  }


}

?>