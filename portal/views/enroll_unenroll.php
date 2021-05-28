<?php
include('../db/db.php');
$db = new Database;
if (isset($_POST['atten']) && isset($_POST['student'])){
    switch($_POST['action']){
        case 'Enroll':
            echo "enroll";
            $db->enroll($_POST['student'], $_POST['atten']);
            break;
        case 'Unenroll':
            echo "unenroll";
            echo $_POST['action'];
            $db->unenroll($_POST['student'], $_POST['atten']);
            break;
    }        
}