<?php
    $query = "SELECT c_name, lec_name, credit, code FROM classes";
    $res = mysqli_query($conn, $query);
    $classes = [];
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($classes, $row);
        }
    }
    