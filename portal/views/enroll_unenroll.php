<?php
include('../db/db.php');
$db = new Database;
echo "asd";
if (isset($_POST['atten']) && isset($_POST['student'])){
    echo $_POST['action'];
    switch($_POST['action']){
        case 'enroll':
            // echo $_POST['student'] . " " . $_POST['atten'];
            $db->enroll($_POST['student'], $_POST['atten']);
            break;
        case 'unenroll':
            $db->unenroll($_POST['student'], $_POST['atten']);
            break;
    }        
}