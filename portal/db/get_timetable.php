<?php
    include('get_classes_f.php');
    $classes_timetable = get_classes($_SESSION['email'], $conn);
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    $rowspans = [0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1];

    $prev = -1;
    foreach ($classes_timetable as $c){
        foreach ($c as $key => $value){
            if ($key == "day"){
                if ($value == $prev) $rowspans[$value]++;
                $prev = $value;
            }
        }
    }   
    foreach ($rowspans as $k => $v) if ($v == 1) unset($rowspans[$k]);


