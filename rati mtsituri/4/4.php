<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="txt">
        <button name="upload"> Upload </button>
    </form>

    <?php
        function check_format($test){
            $test = explode("===", $test);
            array_shift($test); array_pop($test);

            foreach ($test as $q){
                $q_split = explode("\n", $q);
                if (!empty(trim($q_split[0])) || !empty(trim($q_split[1]))) { return 0; }
                if (!empty(trim(end($q_split))) || !empty(trim($q_split[ count($q_split) - 1 ]))) { return 0; }

                for ($i = 4; $i < count($q_split) - 2; $i++){
                       $split = explode(" ", $q_split[$i]);
                    if ( strlen($split[0]) != 2 || $split[0][1] != ")" || empty($split[1])) { return 0; }
                }
            } 
            return 1;
        }

        if (isset($_POST['upload'])){
            $file = $_FILES['txt']['tmp_name'];
            $content = fopen($file, 'r');
            $content = fread($content, filesize($file));
            if (check_format($content))
                move_uploaded_file($file, 'test.txt');
            else echo "invalid format";
        }
    ?>
</body>
</html>