<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['user_id']))
{
  header('Location: login.php');
}
$user_id = $_SESSION['user_id'];
$follow=new followList($connect);
$res=$follow->getList($user_id);
$follow->show($res);
$instance->closeConnection();

class followList{
  private $connect;
  public function __construct($connection)
  {
    $this->connect = $connection;
  }
  public function getList($user_id)
  {
    $sql="select * from users where id<>$user_id";
    $result=mysqli_query($this->connect,$sql);
    return $result;
  }
  public function show($result)
  {
    if(mysqli_num_rows($result)> 0)
{
  while($row=mysqli_fetch_assoc($result))
  {
    $user_name=$row['username'];
    $following_id=$row['id'];
    echo "<div class='user-card'>";
    echo "  <p>$user_name</p>";
    echo "  <form action='follow.php' method='post'>";
    echo "    <input type='hidden' name='following_id' value='$following_id'>";
    echo "    <input type='hidden' name='following_name' value='$user_name'>";
      echo "    <button type='submit'>Follow</button>";
    echo "  </form>";
    echo "</div>";
  }
} else {
  echo "No other users found.";
}
  }
}
?>
