<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Posts</title>
</head>
<body>
  <h1>All Posts</h1>
  <?php
  session_start();
  require("../Connection/connection.php"); 
  $user_id=$_SESSION['user_id'];
  $obj=new ShowPosts($connect);
  $lists=$obj->getFollowers($user_id);
  $obj->show_posts($lists);
  class ShowPosts{
    private $connect;
    public function __construct($connection){
      $this->connect=$connection;

    }

    public function getFollowers($user_id){
      $sql="select following_id from followers where follower_id=$user_id";
      $following_list=array();
      $index=0;
      $result=mysqli_query($this->connect,$sql);
      if(mysqli_num_rows($result)> 0){
        while($row=mysqli_fetch_array($result)){
          // $temp=$row['following_id'];
          // echo "$temp";
          $following_list[$index++]=$row['following_id'];
        }
      }
      return $following_list;
    }

    public function show_posts($following_list)
    {
      if(count($following_list)==0){
        echo "NO followers has posted anything yet!!";
      }
      else
      {
        $cnt=1;
        $sql = "SELECT * FROM posts WHERE who_posted IN (" . implode(",", $following_list) . ") And type='public'";
        $filter_result = mysqli_query($this->connect, $sql);
        if(mysqli_num_rows($filter_result)> 0){
          while($row=mysqli_fetch_array($filter_result)){
            echo "<h2>This is post {$cnt}</h2>";
            $cnt++;
            $title=$row['title'];
            $writer=$row['writer'];
            $post_type=$row['type'];
            $description=$row['description'];
            echo "$title";
            echo "<br> <br>";
            echo "$writer";
            echo "<br> <br>";
            echo "$post_type";
            echo "<br> <br>";
            echo "$description";
            echo "<br> <br>";
      
          }
        }
      }
    }
  }

  ?>
</body>
</html>