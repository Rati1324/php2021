<?php  
    function check(){
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
        foreach(str_split($url) as $char){
            if (ctype_digit($char)) return 1;
        }
        return 0;
    }
?>   
