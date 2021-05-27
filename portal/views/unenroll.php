<?php
    include('../db/db.php');
    $db = new Database();

    if (isset($_POST['atten_id'])){
        $db->unenroll($_POST['atten_id'], $_POST['user_id']);
    }