<?php
    session_start();
    require('../db/db.php');
    $DB = new Database();
    if (isset($_POST['logout'])){
        echo "logou";
        session_destroy();
    }

    $error = "";
    if (isset($_POST['submit'])) {
        include('../static/conn.php');
        $email = $DB->check_login($_POST['email'], $_POST['password']);

        if ($email == 0) {
            $error = "Incorrect email or password";
        }
        else {
            $_SESSION['email'] = $_POST['email'];
            header('location: home1.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/login.css">
    <link rel="stylesheet" href="../static/layout.css">
</head>
<?php 
    
?>
<body>
    <div class="outer_container">

        <div class="header_and_content">
            <?php include('./partials/logged_out_header.php') ?>  
            
            <div class="content">
                <div class="info">
                    <h3>Log in</h3>
                        <form autocomplete="off" method="post">
                            <ul>
                                <li>
                                    <label for="email">E-mail:</label><br>
                                    <input type="text" id="email" name="email" >
                                </li>
                                    
                                <li>
                                    <label for="password">Password:</label><br>
                                    <input type="password" id="password" name="password"  >
                                </li>

                                <li style="display:flex;flex-direction: column;">
                                    <button id="submit" name="submit">Submit</button>
                                </li>
                                    
                            </ul>
                        </form>
                        <div class="errors_wrapper">
                            <p class="errors"><?=$error?></p>
                        </div>
                </div>
            </div>
                
        </div>
    </div>
    <?php include('./partials/footer.php')?>
</body>
</html>