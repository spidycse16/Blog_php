<?php
include('../orm/orm.php');
session_start();
$user_id=$_SESSION['user_id'];
$obj=new Post($connect);
$posts=$obj->all($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Delete posts</h1>
    <?php if (empty($posts)) : ?>
    <p>You havnt posted anything yet</p>
    <a href="../Views/create.php">Create One now</a>
    <?php else:?>
        <?php foreach($posts as $post):?>
            <?php echo $post['title']; ?> <form action="../orm/edit_page.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <button type="submit">Edit</button>
            <br><br>
            </form>
            <?php endforeach;?>
            <?php endif; ?>
</body>
</html>