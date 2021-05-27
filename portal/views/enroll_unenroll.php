<?php
if (isset($_POST['atten']) && isset($_POST['student'])){
    switch($_POST['action']){
        case 'enroll':
            $db->enroll($_POST['student'], $_POST['atten']);
        case 'unenroll':
            $db->unenroll($_POST['student'], $_POST['atten']);
    }        
}