<?php
include('../Views/header.php')
?>
    <h1>Register</h1>
    <form method="post" action="../Controls/loginHandler.php" enctype="multipart/form-data"> 
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
    <?php
include('../Views/footer.php')
?>
