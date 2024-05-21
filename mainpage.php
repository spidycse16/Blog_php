<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

    <a href="show_page.php">Show posts</a>
    <a href="create.php">Create Blog</a>
    <button name="follow">Follow</button>
    <a href="logout.php">Logout</a>

</body>
</html>
