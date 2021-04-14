<head>
    <meta charset="UTF-8">
    <title>Drive</title>
    <link rel="stylesheet" href="https://localhost/php2021/hw/week_6/styles/drive.css">
</head>

<?php
    if (!is_dir('content')) mkdir('content');

    if (isset($_GET['txt'])){
        $file = fopen('./content' . '/' . $_GET['txt'], 'r');
        $text = fread($file, filesize('./content' . '/' . $_GET['txt']));
        echo "<div class='output'>";
            echo $text;
        echo "</div>";
        exit();
    }

    $content_path = "content/";
    
    function create_new_folder($folder_name){
        $folder_path = 'content/' . "/" . $folder_name ;
        mkdir($folder_path);
        mkdir($folder_path . '/' . 'content/' );

        $index = fopen($folder_path . "/" . "index.php", 'w');
            fwrite($index, '<?php include($_SERVER[\'DOCUMENT_ROOT\'] . 
            "/php2021/hw/week_6/drive_back.php");');
    }

    function clear_dir($dir) {
        if (is_dir($dir)){
            $files = scandir($dir);
            $files = array_slice($files, 2);
            foreach($files as $v){
                if (is_dir($dir . "/" . $v)){
                    clear_dir($dir . "/" . $v);
                }
                else 
                unlink($dir . "/" . $v);
            }
            rmdir($dir);
        }
    }
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

        if (pathinfo($file['name'], PATHINFO_EXTENSION) != "txt")
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
            $delete = "delete_file";
            $href = "?txt=$content[$j]";
            $download = "<button> <a href='" . $content_path . $content[$j] . "' download>" . "Download" . "</a> </button> ";
            if (is_dir($content_path . $content[$j])) {
                $href = "$content_path/$content[$j]/index.php";
                $delete = "delete_folder";
                $download = "";
            }
            echo
            "<ul class='item'> 
                <li> <a class='read' href='" . $href . "'>" . $content[$j] . "</a>" . $download . 
                "<form method='post' class='delete'> <button type='hidden'  name='" . $delete ."' value='" . $content[$j] . "'> Delete </button> </form> </li>" . 
            "</ul>";
            
        }
        
    ?>
</div>

</body>
</html>