<?php
    if (isset($_POST['send'])){
        $servername = "localhost";
        $username = "gau";
        $password = "gau123456";
        $dbname = "cv";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $id = $_POST['q'];
        $query = "SELECT * FROM applicant WHERE first_name = '$id'";    
        echo $query;
        $res = mysqli_query($conn, $query);
        $res2 = mysqli_fetch_assoc($res);
        print_r($res2);
    }
?>
<html>
    <form action="" method="post">
        <input type="text" name="q">
        <button name="send">send</button>
    </form>
</html>































    