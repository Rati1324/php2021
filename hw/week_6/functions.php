<?php
    function read(){
        $file = fopen('./content' . '/' . $_GET['txt'], 'r');
        $text = fread($file, filesize('./content' . '/' . $_GET['txt']));
        echo "<div class='output'>";
            echo $text;
        echo "</div>";
     
    }

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
                if (is_dir($dir . "/" . $v))
                    clear_dir($dir . "/" . $v);
                else 
                    unlink($dir . "/" . $v);
            }
            rmdir($dir);
        }
    }
?>