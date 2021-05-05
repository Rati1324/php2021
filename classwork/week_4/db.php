<?php
    $servername = "localhost";
    $username = "gau";
    $password = "gau123456";
    $dbname = "gaudb";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?> 