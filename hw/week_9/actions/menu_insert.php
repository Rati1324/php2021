<?php 
    if (isset($_POST['send'])) {
        $title = $_POST['title'];
        $meta_k = $_POST['meta_k'];
        $meta_d = $_POST['meta_d'];
        $text = $_POST['text'];
        $query = "INSERT INTO menu VALUES(NULL, '$title', '$meta_k', '$meta_d', '$text')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
    }
?>
            
<form class="insert" method="post" autocomplete="off">
    <input type="text" name="title" placeholder="title"> <br> 
    <input type="text" name="meta_k" placeholder="meta_k"> <br>
    <input type="text" name="meta_d" placeholder="meta_d"> <br>
    <input type="text" name="text" placeholder="text"> <br> 
    <button name="send">Send</button>
</form>