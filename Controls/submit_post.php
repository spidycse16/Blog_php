<?php
session_start();
require("../Connection/connection.php");
$user_id=$_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = mysqli_real_escape_string($connect, $_POST["title"]);
  $writer = mysqli_real_escape_string($connect, $_POST["writer"]);
  $post_type = mysqli_real_escape_string($connect, $_POST["type"]);
  $description = mysqli_real_escape_string($connect, $_POST["description"]);
  
  $file_name=$_FILES['image']['name'];
  $temp_name = $_FILES['image']['tmp_name'];
  $folder='images/'.$file_name;


  $obj=new Submit($connect);
  $obj->submitPost($title,$writer,$post_type,$description,$user_id,$file_name);
  //$obj->uploadImage($file_name,$temp_name,$folder);
} else {
  echo "Invalid request method.";
}

class Submit{
  private $connect;
  public function __construct($connection)
  {
    $this->connect=$connection;
  }

  public function submitPost($title,$writer,$post_type,$description,$user_id,$file_name)
  {
    $sql = "INSERT INTO posts (title, writer, type, description, who_posted, image)
VALUES ('$title', '$writer', '$post_type', '$description' ,'$user_id', '" . $this->connect->escape_string($file_name) . "')";

 
   if (mysqli_query($this->connect, $sql)) {
     echo "Post created successfully!";
   } else {
     echo "Error creating post: " . mysqli_error($this->connect);
   }
  }

  public function uploadImage($file_name, $temp_name, $folder) {
    $sql = "INSERT INTO posts (image) VALUES ('" . $this->connect->escape_string($file_name) . "')";
    $result = $this->connect->query($sql);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            echo "Image upload successful";
        } else {
            echo "Failed to move uploaded file";
        }
    } else {
        echo "Failed to upload image: " . $this->connect->error;
    }
}

}


?>