<?php
include('../orm/orm.php');
$obj = new Post($connect);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : null;

  if ($post_id) {
    $result = $obj->specific_post($post_id);
    if ($result) {
      $post = $result->fetch_assoc();
      include('../Views/header.php');
      ?>
        <h1>Edit Post</h1>
        <form action="../orm/edit_control.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">  <label for="title">Title:</label>
          <input type="text" name="title" value="<?php echo $post['title']; ?>" required><br><br>

          <label for="writer">Writer:</label>
          <input type="text" name="writer" value="<?php echo $post['writer']; ?>"><br><br>

          <label for="writer">Type:</label>
          <input type="text" name="type" value="<?php echo $post['type']; ?>" required><br><br>

          <label for="description">Description:</label>
          <textarea name="description" rows="5" required><?php echo $post['description']; ?></textarea><br><br>

          <label for="image">Image: (Optional)</label>

          <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">

          <input type="file" name="image"><br><br>  <button type="submit">Update Post</button>
        </form>
        <?php
         include('../Views/footer.php')
        ?>
      <?php
    } else {
      echo "Post with ID $post_id not found.";
    }
  } else {
    echo "Invalid or missing post ID.";
  }
} else {
  // Handle non-GET requests (optional)
  echo "This script expects a GET request with a 'post_id' parameter.";
}
?>
