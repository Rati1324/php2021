<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'user');
    $name = "";
    $email = "";
    $errors = [];

    if (isset($_POST['send'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
        $pwd_2 = mysqli_real_escape_string($db, $_POST['pwd_2']);
         
        if (empty($name)){
            array_push($errors, "Name Cant be empty");
        }
        if (empty($email)){
            array_push($errors, "Email Cant be empty");
        }
        if (empty($pwd)){
            array_push($errors, "Password Cant be empty");
        }
        if ($pwd != $pwd_2){
            array_push($errors, "Passwords dont match");
        }

        if (count($errors) == 0){
            $password = md5($pwd);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "You are Logged In";
            header('location:index.php');
        }
    }

    
    if (isset($_POST['login'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
         
        if (empty($name)){
            array_push($errors, "Name Cant be empty");
        }
        if (empty($pwd)){
            array_push($errors, "Email Cant be empty");
        }

        if (count($errors) == 0){
            $pwd = md5($pwd);
            $query = "SELECT * FROM users WHERE name = '$name' AND password = '$pwd' ";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) == 1){
                $_SESSION['name'] = $name;
                $_SESSION['success'] = "You are Logged In";
                header('location: index.php');
            }
            else{
                array_push($errors, "Not Found");
                header("location: login.php");
            }
        }
    }

    if (isset($_GET['logout'])){
        session_destroy();
        print_r($_SESSION);
        unset($_SESSION ['name']);
        // header('location: login.php');
    }
?>