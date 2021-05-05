<?php
    require_once ("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header> </header>
    <nav>
        <ul>
            <li><a href="?action=insert">insert</a></li>
            <li><a href="?action=posts">posts</a></li>
        </ul>
    </nav>
    <main>
        <?php
            if (isset($_GET['action']) && $_GET['action'] == "insert"){
                include "actions/insert.php";
            }
            else {
                include "actions/posts.php";
            }
            
        ?>
    </main>

</body>
</html>