<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: Views/login.php");
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

    <a href="../Controls/show_page.php">Show posts</a>
    <a href="../Views/create.php">Create Blog</a>
    <a href="../Controls/follow_list.php">Follow People</a>
    <a href="../Controls/logout.php">Logout</a>

</body>
</html>
