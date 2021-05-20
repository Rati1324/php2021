<?php
    $query_class = "SELECT c_name, lec_name, credit, code, 'group' FROM classes";
    $query_group = "SELECT * FROM groups";
    $res_class = mysqli_query($conn, $query_class);
    $res_group = mysqli_query($conn, $query_group);

    $classes = [];
    if (mysqli_num_rows($res_class) > 0){
        while ($row = mysqli_fetch_assoc($res_class)){
            $classes[] = $row;
        }
    }

    $groups = [];
    if (mysqli_num_rows($res_group) > 0){
        while ($row = mysqli_fetch_assoc($res_group)){
            if (isset($groups[$row['id']])) $groups[$row['id']][] = $row;
            else $groups[$row['id']] = [$row];
        }
    }
    
    