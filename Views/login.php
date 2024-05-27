<?php
include('../Views/header.php')
?>
    <form action="../Controls/loginController.php" method="post">
        <label>Emal:</label>
        <input type="text" name="email">
        <br>
        <label>Password:</label>
        <input type="text" name="password">
        <br>
        <input type="submit">
    </form>
    
<?php
include('../Views/footer.php')
?>