<?php
    
    $query_class = "SELECT c_name, lec_name, credit, code, class_id FROM classes";
    $query_group = "SELECT * FROM groups";
    $res_class = mysqli_query($conn, $query_class);
    $res_group = mysqli_query($conn, $query_group);

    $classes = [];
    if (mysqli_num_rows($res_class) > 0){
        while ($row = mysqli_fetch_assoc($res_class)){
            if (!isset($classes[$row['class_id']]))
                $classes[$row['class_id']] = $row;
        }
    }

    $groups = [];
    if (mysqli_num_rows($res_group) > 0){
        while ($row = mysqli_fetch_assoc($res_group)){
            if (isset($groups[$row['id']])) $groups[$row['id']][] = $row;
            else $groups[$row['id']] = [$row];
        }
    }
    // echo "<pre>";
    // print_r($groups);
    // echo "</pre>";
    
    