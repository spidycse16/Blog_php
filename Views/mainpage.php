<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: Views/login.php");
  exit;
}
?>

<?php
include('../Views/header.php')
?>
  <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

    <a href="../Controls/show_page.php">Show posts</a> <br> <br>
    <a href="../Views/create.php">Create Blog</a><br> <br>
    <a href="../Controls/follow_list.php">Follow People</a><br> <br>
    <a href="../orm/orm_create_form.php">Post by orm</a><br> <br>
    <a href="../Views/orm_delete.php">Delete by orm</a><br><br>
    <a href="../orm/orm_edit_view.php">Edit by orm</a>
    <a href="../Controls/logout.php">Logout</a><br> <br>

    <?php
include('../Views/footer.php')
?>