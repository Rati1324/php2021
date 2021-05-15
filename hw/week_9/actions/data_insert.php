<?php 
    if (isset($_POST['send'])) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $photo = $_POST['photo'];
        $text = $_POST['text'];
        $author = $_POST['author'];
        $desc = $_POST['desc'];
        $meta_k = $_POST['meta_k'];
        $meta_d = $_POST['meta_d'];
        
        $query = "INSERT INTO data1 VALUES(NULL, '$title', '$date', '$type', '$photo', '$text', '$author', '$desc', '$meta_k', '$meta_d')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
    }
?>

<form class="insert" method="post" autocomplete="off">
    <input type="text" name="title" placeholder="title"> <br> 
    <input type="text" name="type" placeholder="type"> <br>
    <input type="text" name="photo" placeholder="photo"> <br>
    <input type="text" name="text" placeholder="text"> <br> 
    <input type="text" name="author" placeholder="author"> <br> 
    <input type="text" name="desc" placeholder="desc"> <br> 
    <input type="text" name="meta_k" placeholder="meta_k"> <br> 
    <input type="text" name="meta_d" placeholder="meta_d"> <br> 
    <input type="hidden" name="date" value=<?php echo date('y-m-d') ?>>  
    <button name="send">Send</button>
</form>