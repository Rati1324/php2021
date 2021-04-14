<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://localhost/php2021/hw/week_6/styles/output.css">
    <title>Document</title>
</head>
<body>
    <div class="output">
        <?php
            echo "sad";
            if (isset($_GET['txt'])){
                echo "asd";
                $file = fopen($_GET['txt'], 'r');
                $text = fread($file, filesize($_GET['txt']));
                echo $text;
            }
        ?>
    </div>
</body>
</html>
