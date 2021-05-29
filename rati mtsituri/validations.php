<?php 
    function valid_name($name){
        if (strlen($name) < 2 || strlen($name) > 100)
            return "name must be between 2 and 100 characters";
    }

    function valid_author($author){
        if (strlen($author) < 5 || strlen($author) > 50)
            return "author must be between 5 and 50 characters";
    }

    function get_price(){
        $pages = rand(50, 1000);
        return ($pages * 20) / 100;
    }

    function get_code(){
        $chars = [];
        for ($i=97; $i<=122; $i++) {  
            $chars[] = chr($i);
        }
        $code = "";
        for ($i=0; $i<12; $i++){
            $code .= $chars[rand(0,25)];
        }
        return $code;
    }
    
    function insert(){
        

    }

    if (isset($_POST['name']) && isset($_POST['author'])){
        $errors = ["name" => "", "author" => ""];
        $errors['name'] = valid_name($_POST['name']);
        $errors['author'] = valid_author($_POST['author']);
        
        if (empty($errors['name'] . $errors['author'])){
            require('db.php');
            
            $author = $_POST['author'];
            $name = $_POST['name'];
            $pages = rand(50, 1000);
            $price = get_price($pages);
            $code = get_code();

            $servername = "localhost";
            $username = "gau";
            $password = "gau123456";
            $dbname = "books";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $query = "INSERT INTO book VALUES(null, '$name', '$pages', $price, '$code', '$author')";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        }
        else{ 
            $errors = json_encode($errors);
            echo $errors;
        }
    }

