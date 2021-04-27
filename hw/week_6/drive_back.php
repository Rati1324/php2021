<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drive</title>
    <link rel="stylesheet" href="https://localhost/php2021/hw/week_6/styles/drive.css">
</head>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/php2021/hw/week_6/functions.php");
    if (!is_dir('content')) mkdir('content');

    if (isset($_GET['txt'])) { read(); exit();}
    if (isset($_GET['file_name'])) {
        include($_SERVER['DOCUMENT_ROOT'] . "/php2021/hw/week_6/edit.php");
        exit();
    }
    $content_path = "content/";
    $content = scandir($content_path);

    if (isset($_POST['create_file'])){
        if (in_array($_POST['file_name'] . ".txt", $content))
            $file = fopen($content_path . $_POST['file_name'] . "(" . date("y-m-d-h-i-s") . ")" . ".txt", 'w');
        else{
            $file = fopen($content_path . $_POST['file_name'] . ".txt", 'w');
        }
        fwrite($file, $_POST['file_data']);
    }

    if (isset($_POST['create_folder'])){
        if (in_array($_POST['folder_name'], $content)){
            $folder_name = $_POST['folder_name'] . "(" . date("y-m-d-h-i-s") . ")";
            create_new_folder($folder_name);
        }
        else{
            $folder_name = $_POST['folder_name'];
            create_new_folder($folder_name);
        }
    }

    if (isset($_POST['delete_file'])){
        unlink($content_path . $_POST['delete_file']);
    }

    if (isset($_POST['delete_folder'])){
        $path = realpath($content_path . $_POST['delete_folder']);
        clear_dir($path);
    }

    $type_check = "";
    $size_check = "";
    if (isset($_POST['upload'])){
        $file = $_FILES['file'];
        
        if (pathinfo($file['name'], PATHINFO_EXTENSION) != "txt" &&
                pathinfo($file['name'], PATHINFO_EXTENSION) != "JPG")
            $type_check = "Invalid File Type";
        if ($file['size'] > 50 * 1024 * 1024) 
            $size_check = "Can't be bigger than 50mb";
        if (empty($type_check . $size_check)){
            move_uploaded_file($file['tmp_name'], "content/" . $file['name']);
        }
    }

    include($_SERVER['DOCUMENT_ROOT'] . "/php2021/hw/week_6/drive_front.php");
?>

<div class="content">
    <h2> Files </h2>
    <?php
        $content = scandir($content_path);
        
        for ($j=2; $j<count($content); $j++){  
            $edit = "";
            $name = "";
            $href = "";
            $download_button = "<button class='download_button'> <a href='" . $content_path . $content[$j] . "' download>" . "Download" . "</a> </button> ";
            if (pathinfo($content[$j], PATHINFO_EXTENSION) == "txt"){
                $name = "delete_file";
                $href = "?txt=$content[$j]";
                $edit = "<button class='edit' value='$path'> <a href=?file_name=$path> Edit </a>  </button> ";
            }
            
            $path = "content\\" . $content[$j];
            
            if (is_dir($content_path . $content[$j])) {
                $href = "$content_path/$content[$j]/index.php";
                $name = "delete_folder";
                $download_button = "";
                $edit = "";
            }
    ?>

        <div class='item'> 
            <a class='read' href='<?=$href?>'> <?=$content[$j]?> </a> 
            <?=$download_button?>
            <form method='post' class='delete'> 
                <button type='hidden'  name='<?=$name?>' value='<?=$content[$j]?>'> Delete </button> 
            </form> 

            <?=$edit?>
        </div>
            
    <?php } ?>
        
</div>

</body>
</html>