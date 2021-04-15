<?php
    function create_vector($x, $n){
        if ($n == 0) {
            array_push($x, [rand(0,10)]);
            return $x;
        }
        $res = [];
        for ($i = 0; $i < $n; $i++){
            array_push($res, create_vector($x, $n-1));
        }
        return $res;
    }

    echo(create_vector([], 3));
?>