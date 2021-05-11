<?php
    if (isset($_POST['send'])) {
        session_start();
        $_SESSION["name"] = $_POST['user'];
        
    }

    echo "Welcome " . $_SESSION['name'] . "!";
?>