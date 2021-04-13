<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Upload</title>
</head>
<body>
    <div class="upload">
        <?php
            if (isset($_GET['folder'])) {
                mkdir("root");
            }
            if (is_dir("root")){
                echo '<p><a target="_blank" href="root.php">Root</a></p>';
            }
            else{
                echo '<p><a href="page.php?folder=root">Make Root</a></p>';
            }

            $size_error = "";
            $type_error = "";
            if (isset($_POST['upload'])){
                $file = $_FILES['file'];
                print_r($file);
                if ($file['size'] > 10 * 1024 * 1024){
                    $size_error = "File Too big";
                }
                $file_type = pathinfo($file['name'], PATHINFO_EXTENSION);
                if ($file_type != "txt"){
                    $type_error = "Invalid Type";
                }
                if (empty($size_error) && empty($type_error)){
                    $file_path = "root/" . date("Y-m-d-h-i-s") . $file_type;
                    move_uploaded_file($file['tmp_name'], $file_path);
                }
            }

        ?>
        <p> <?=$size_error?> </p>
        <p> <?=$type_error?> </p>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file"><br>
            <button name="upload">Upload</button>
        </form>

    </div>
</body>
</html>