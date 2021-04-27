<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://localhost/php2021/hw/week_6/styles/drive.css">
</head>
<body>
    <?php
        $ext = "." . PATHINFO($_GET['file_name'], PATHINFO_EXTENSION);
        
        if (isset($_POST['save'])){
            $new_title = $_POST['new_title'];
            $body = $_POST['body'];
            rename("content/" . $_POST['old_title'] . $ext , "content/" . $new_title . $ext);
            $file_open = fopen("content/" . $new_title . $ext, 'w');
            fwrite($file_open, $body);
            fclose($file_open);
            header("Location:" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        }
        
        else{
            
            $name = basename($_GET['file_name'], $ext);
            $text = fopen($_GET['file_name'], 'r');
            $text_read = fread($text, filesize($_GET['file_name']));
            
        }

        
    ?>

    <form action="" class="edit_form" method="post">
        <label for="title" > Title </label>
        <input type="text" value="<?=$name?>" name="new_title" >
        <textarea name="body" id="" cols="30" rows="10" > <?=$text_read?> </textarea>
        <input type="hidden" name="old_title" value=<?=$name?>>
        <button name="save">Save</button>
    </form>

</body>
</html>