<?php
    $info_query = "SELECT * FROM student WHERE email = '$email'";
    $info_res = mysqli_query($conn, $info_query);
    $student_info = mysqli_fetch_assoc($info_res);
    $school_query = "SELECT name FROM school JOIN student
        ON school.school_id = student.school_id
        WHERE student.email = '$email'
        ";
    $school_query = mysqli_query($conn, $school_query);
    $school_res = mysqli_fetch_assoc($school_query)['name'];