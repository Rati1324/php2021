<?php require_once('actions/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Action</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <ul>
            <li> <a href="?action=menu">Insert Into Menu</a> </li>
            <li> <a href="?action=student">Insert Into Student</a> </li>
            <li> <a href="?action=data">Insert Into Data</a> </li>
            <li> <a href="?action=get_menu">Menu Queries</a> </li>
            <li> <a href="?action=view_menu">edit/remove Menu Rows</a> </li>
        </ul>

        <?php
        
            if (isset($_GET['action'])){
                switch ($_GET['action']) {
                    case "menu":
                        include('actions/menu_insert.php'); break;
                    case "student":
                        include('actions/student_insert.php'); break;
                    case "data":
                        include('actions/data_insert.php'); break;
                    case "get_menu":
                        include('actions/get_menu.php'); break;
                    case "view_menu":
                        include('actions/view.php'); break;
                }
            }
            
        ?>
    </div>
</body>
</html>
