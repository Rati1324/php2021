<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="root">
        <h2>Root Folder</h2>
        <?php 
            $files = scandir("root");
            for($i=2; $i<count($files); $i++){
                echo "<p><a href='root.php?file=$i'> $files[$i] </a></p>";
            }
        ?>
    </div>    
    <div class="file">
        <?php
            if (isset($_GET['file'])){
                $file = "root/" . $files[$_GET['file']];
                $f = fopen($file, 'r');
                $file_info = fread($f, filesize($file));
                fclose($f);
                $posts = explode("-", $file_info);
                for ($j=0; $j<count($posts); $j++){
                    echo $posts[$j];
                    echo "<br>";
                }
            }
        ?>
    </div>
</body>
</html>