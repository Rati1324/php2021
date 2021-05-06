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
        function split_into_quesitons($arr){
            if (trim($arr[0]) != "===") return 0;
            $res = [];
            $index = -1;
            for ($i = 0; $i < count($arr); $i++) {
                if (trim($arr[$i]) == "===") {
                    array_push($res, []);
                    $index++;
                }
                if ($index != -1) array_push($res[$index], $arr[$i]);
            }
            return $res;
        }
    
        function check_format($test){
            $test = explode("\n", $test);
            $q_split = split_into_quesitons($test);
            if (!$q_split) return 0;
            
            foreach ($q_split as $q){
                if (count($q) > 1){
                    if (trim($q[0]) != "===" || !empty(trim($q[1])) || empty(trim($q[2])) 
                        || !empty(trim($q[3])) || !empty(trim(end($q)))) return 0;
                        
                        for ($i = 4; $i < count($q) - 1; $i++){
                            $split = explode(" ", $q[$i]);
                            if ( strlen($split[0]) != 2 || $split[0][1] != ")" || empty($split[1])) { return 0; }
                    }
                }
            } 
            if (count(end($q_split)) != 1 && trim(end($q_split)[0]) != "===") return 0;
            return 1;
        }

        if (isset($_POST['upload'])){
            $file = $_FILES['txt']['tmp_name'];
            $content = fopen($file, 'r');
            $content = fread($content, filesize($file));
            if (check_format($content)){
                move_uploaded_file($file, 'test.txt');
                echo "uploaded successfully";
            }
            else echo "invalid format";
        }
    ?>
</body>
</html>