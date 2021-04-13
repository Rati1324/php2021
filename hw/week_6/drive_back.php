
<?php
    define("styles", "https://localhost/php2021/hw/week_6/styles/");
    $content_path = "content/";
   

    function create_new_folder($folder_name){
        // create folder and content folder inside
        $folder_path = 'content/' . "/" . $folder_name ;
        mkdir($folder_path);
        mkdir($folder_path . '/' . 'content/' );

        // create index.php 
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

?>

<div class="content">
    <h2> Files </h2>
    <?php
        $content = scandir($content_path);

        for ($j=2; $j<count($content); $j++){   
            $delete = "delete_file";
            if (is_dir($content_path . $content[$j])) $delete = "delete_folder";
            echo 
            "<li> <a class='read' href='" . "content/" . $content[$j] . "'>" . $content[$j] . "</a>" .
            "<button class='download'> <a href='" . $content_path . $content[$j] . "' download>" . "Download" . "</a> </button> " .
            "<form method='post'> <button type='hidden' name='" . $delete ."' value='" . $content[$j] . "'> Delete </button> </form> </li>";
        }
        
    ?>
</div>

</body>