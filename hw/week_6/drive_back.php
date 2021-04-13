
<?php
    define("styles", "https://localhost/php2021/hw/week_6/styles/");
    $content_path = "content/";
   
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
    
    include($_SERVER['DOCUMENT_ROOT'] . "/php2021/hw/week_6/drive_front.php");
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
            mkdir($content_path . $_POST['folder_name'] . "(" . date("y-m-d-h-i-s") . ")");
            mkdir($folder_path);
            mkdir($folder_path . "/" . "content/" );
        }
        else{
            $folder_path = $content_path . $_POST['folder_name'];
            mkdir($folder_path);
            mkdir($folder_path . "/" . "content/" );
        }
    }

    if (isset($_POST['delete_file'])){
        echo $content_path . $_POST['delete_file'];
        unlink($content_path . $_POST['delete_file']);
    }

    if (isset($_POST['delete_folder'])){
        $path = realpath($content_path . $_POST['delete_folder']);
        clear_dir($path);
    }

    else{
        if (isset($_GET['dir']))
            echo $content_path = "content/" . $_GET['dir'];
    }
?>

<!-- <link rel="stylesheet" href="<?php echo $_SERVER['DOCUMENT_ROOT'] . "/php2021/hw/week_6/styles/drive.css"?> "> -->
<div class="content">
    <h2> Files </h2>
    <?php
        $content = scandir($content_path);

        for ($j=2; $j<count($content); $j++){   
            $delete = "delete_file";
            echo realpath($content[$j]);
            if (is_dir($content_path . $content[$j])) $delete = "delete_folder";
            echo 
            "<li> <a class='read' href='" . "content/" . $content[$j] . "'>" . $content[$j] . "</a>" .
            "<button class='download'> <a href='" . $content_path . $content[$j] . "' download>" . "Download" . "</a> </button> " .
            "<form method='post'> <button type='hidden' name='" . $delete ."' value='" . $content[$j] . "'> Delete </button> </form> </li>";
        }
        
    ?>
</div>

</body>