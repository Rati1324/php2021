<?php
    session_start();
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
    if (isset($_POST['submit'])) {
        $servername = "localhost";
        $username = "gau";
        $password = "gau123456";
        $dbname = "portal";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $query = "SELECT email, pw FROM student";
        $students = mysqli_query($conn, $query);
        print_r($students);

        if (mysqli_num_rows($students) > 0) {
            while ($row = mysqli_fetch_assoc($students)) {
                if ($_POST['email'] === $row['email'] && $_POST['password'] == $row['pw']) {
                    $_SESSION['email'] = $_POST['email'];
                    header('location: home1.php');
                }
            }
        }
    }
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
                            <p class="errors"></p>
                        </div>
                </div>
            </div>
                
        </div>
    </div>
    <?php include('./partials/footer.php')?>
</body>
</html>