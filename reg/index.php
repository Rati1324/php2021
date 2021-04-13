<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
</head>
<body>
    <?php 
        if (empty($_SESSION['name'])){
            header('location: login.php');
        }
    ?>

    <div class="content">
        <?php if (isset($_SESSION['success'])){ ?>

            <div>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>

    <?php if (isset($_SESSION['name'])){ ?>
        <p> Welcome <?php echo $_SESSION['name']; ?> </p>
        <a href="login.php?logout='1'">Logout</a>
        <!-- It was redirecting to index originally -->
    <?php } ?>
    
    </div>
</body>
</html>