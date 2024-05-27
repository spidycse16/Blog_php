<?php
include('../Views/header.php')
?>
  <h1>Create New Post</h1>
  <form action="../Controls/submit_post.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="Enter your post title" required><br><br>

    <label for="writer">Writer:</label>
    <input type="text" name="writer" placeholder="Enter your name"><br><br>

    <label for="writer">Writer:</label>
    <input type="text" name="type" placeholder="public/private"><br><br>

    <label for="description">Description:</label>
    <textarea name="description" rows="5" placeholder="Write a brief description of your post" required></textarea><br><br>

    <label for="image">Image:</label>
    <input type="file" name="image"><br><br>

    <button type="submit">Create Post</button>
  </form>
  <?php
include('../Views/footer.php')
?>
