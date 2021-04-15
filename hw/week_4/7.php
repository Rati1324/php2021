<?php
    // num_of_elements aris titoeul vectorshi elementebis raodenoba
    function create_vector($x, $dimension, $num_of_elements){
        if ($dimension == 0) {
            for ($j = 0; $j < $num_of_elements; $j++){
                array_push($x, [rand(0,10)]);
            }
            return $x;
        }
        $res = [];
        array_push($res, create_vector($x, $dimension-1, $num_of_elements));
        return $res;
    }

    print_r(create_vector([], 2, 4));
?>