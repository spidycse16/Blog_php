<?php
include('../Connection/connection.php');
class Orm{
    private $connect;
    public function __construct($connection){
        $this->connect = $connection;
    }

    public function create($title, $writer,$post_type,$description,$user_id,$file_name){
        $sql = "INSERT INTO posts (title, writer, type, description, who_posted, image)
        VALUES ('$title', '$writer', '$post_type', '$description' ,'$user_id', '" . $this->connect->escape_string($file_name) . "')";
        $result=mysqli_query($this->connect,$sql);
        if($result)
        echo "Post was successful";
    else
    echo "something went wrong";
    }

    public function all($user_id)
    {
        $sql="select * from posts where who_posted=$user_id";
        $result=mysqli_query($this->connect,$sql);
        return $result;
    }
    public function specific_post($post_id)
    {
        $sql="select * from posts where id=$post_id";
        $result=mysqli_query($this->connect,$sql);
        return $result;
    }

    public function delete($post_id)
    {
        $sql="delete from posts where id=$post_id";
        $result=mysqli_query($this->connect,$sql);
        if($result)
        echo "Post deleted successfully!";
    else
    throw new Exception(mysqli_error($this->connect));
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

    public function update($post_id,$title, $writer, $type, $description, $image_name) {

        $sql = "UPDATE posts SET title = '$title', writer = '$writer', type = '$type', description = '$description'";
        if ($image_name !== null) {
          $sql .= ", image = '$image_name'";
        }
        $sql .= " WHERE id = $post_id";
        $result = $this->connect->query($sql);
        if ($result) {
          echo "Post updated successfully!";
        } else {
          echo "Failed to update post: " . $this->connect->error;
        }
      }
      
}
?>