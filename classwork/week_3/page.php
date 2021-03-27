<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width:500px;
            margin:auto;
            padding:10px;
            border: solid;
            
        }
    </style>
</head>
<body>
    <div>
        <h2>Multidimensional array</h2>
        <?php
            $matrix = [
                [2,3,4],
                ['hi','hello'],
                4,
                ['price' => 231],
            ];
            echo "<pre>";
            print_r($matrix);
            echo "<pre>";

        ?>
    </div>

    <div>
        <h2>assoc array</h2>
        <?php
            $arr3 = ['name' => 'john', 'age' => 32];
            $arr4 = ['name' => 'john2'];
            echo "<pre>";
            print_r($arr3);
            echo "<pre>";
            
            $merged = array_merge($arr3, $arr4);
            echo "<pre>";
            print_r($merged);
            echo "<pre>";

            foreach ($merged as $key => $value){
                echo "<br>";
                echo $key . " : " . $value;
            }
        ?>
        

    </div>
    <div>
        <h2>Indexed Array</h2>

        <?php
            $arr = Array(5,3);
            $arr2 = [2,3,4, "hi",4];
            array_push($arr2, "added item");
            echo $arr2[5];

            echo "<pre>";
            print_r($arr2);
            echo "<pre>";


        ?>
    </div>
</body>
</html>