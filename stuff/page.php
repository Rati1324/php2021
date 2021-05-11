<?php
    echo time();
    session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="page2.php" method="post">
            <input type="text" name="user">
            <button name="send">send</button>
        </form>
        <a href="page2.php">page2</a>

    </body>
</html>