<?php 
    function get_classes($email, $conn){
        $query = "SELECT attendance.day, attendance.time, class.name, CONCAT(lecturer.first_name, ' ', lecturer.last_name), class.credit, s_group.code FROM attendance
        JOIN student_atten ON
        student_atten.attendance_id = attendance.id
        JOIN class ON
        class.id = attendance.class_id
        JOIN lecturer ON
        lecturer.id = attendance.lecturer_id
        JOIN s_group ON
        s_group.id = attendance.group_id
        JOIN student ON
        student_atten.student_id = student.id
        where student.email = '$email'
        ORDER BY attendance.day"
        ;

        $classes_timetable = [];
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
                array_push($classes_timetable, $row);
                }
            }
        return $classes_timetable;
    }
?>