<?php

include('../orm/orm.php');
$title = mysqli_real_escape_string($connect, $_POST["title"]);
$writer = mysqli_real_escape_string($connect, $_POST["writer"]);
$post_type = mysqli_real_escape_string($connect, $_POST["type"]);
$description = mysqli_real_escape_string($connect, $_POST["description"]);
$post_id=mysqli_real_escape_string($connect, $_POST["post_id"]);
$file_name=$_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
$folder='images/'.$file_name;

$obj=new Post($connect);
$obj->update($post_id,$title,$writer,$post_type,$description,$file_name);

?>