<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $matrix = [];
        $high = 0;
        $low = 0;
        $old_value = "";

        for ($i=0; $i<3; $i++){
                array_push($matrix, [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)]);
        }

        if (isset($_POST['send'])) {
            foreach($matrix as $row){
                foreach($row as $col){
                    if ($col < (int)$_POST['num']) $low++;
                    else if ($col > $_POST['num']) $high++;
                }
            }
            $old_value = $_POST['num'];
        }

        echo "higher " . $high . "<br>";
        echo "lower " . $low;
    ?>
    <form action="" method="post" autocomplete="off">
        enter a number <input type="text" name="num" value = "<?=$old_value?>">
        <button name="send">send</button>
    </form>

    
</body>
</html>