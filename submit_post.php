<?php
session_start();
require("connection.php");
$user_id=$_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = mysqli_real_escape_string($connect, $_POST["title"]);
  $writer = mysqli_real_escape_string($connect, $_POST["writer"]);
  $post_type = mysqli_real_escape_string($connect, $_POST["type"]);
  $description = mysqli_real_escape_string($connect, $_POST["description"]);

  $obj=new Submit($connect);
  $obj->submitPost($title,$writer,$post_type,$description,$user_id);

} else {
  echo "Invalid request method.";
}

class Submit{
  private $connect;
  public function __construct($connection)
  {
    $this->connect=$connection;
  }

  public function submitPost($title,$writer,$post_type,$description,$user_id)
  {
    $sql = "INSERT INTO posts (title, writer, type, description,who_posted)
    VALUES ('$title', '$writer', '$post_type', '$description' ,'$user_id')";
 
   if (mysqli_query($this->connect, $sql)) {
     echo "Post created successfully!";
   } else {
     echo "Error creating post: " . mysqli_error($this->connect);
   }
  }
}


?>