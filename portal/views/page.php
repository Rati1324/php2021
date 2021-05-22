<?php
    if (isset($_POST['atten'])) {
        include('../db/db.php');
        $db = new Database();
        echo $_POST['atten'];
        $db->enroll($student_id, $_POST['atten']);
        echo "asd";
    }
