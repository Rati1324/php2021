<?php
    if (isset($_POST['send'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];
        $date = $_POST['date'];
        $query = "INSERT INTO post(title, author, body, date) VALUES('$title', '$author', '$body', '$date')";
        
        if (mysqli_query($conn, $query)) {
            echo "insert success";
            header("location: action.php");
        }
        else {
            echo "error" . "<br>" . $query . mysqli_error($conn);
        }
        
        
    }
?>

<div>
    <h2>insert</h2>

    <form action="" method="post">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="author" placeholder="author">
        <input type="text" name="body" placeholder="body">
        <input type="date" name="date">
        <button name="send">send</button>
    </form>
</div>
