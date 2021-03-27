<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible;" content="IE=edge">
    <meta http-equiv="refresh" content="1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<?php
    function recur($arr) {
        if (!is_array($arr)){
            echo $arr;
            return;
        }
        foreach($arr as $val) recur($val);
    }

    $x = [[1,2,3],4,[5,6,7,['q','e','r', [65,45,65]]]];
?>
</body>
</html>

