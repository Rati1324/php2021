<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../db/db.php');
    $db = new Database();
    $student_id = $db->find_id($_SESSION['email']);
    $classes = $db->classes();
    $groups = $db->groups();
    $student_attens = $db->student_classes($_SESSION['email']);

    $student_atten_ids = [];
    foreach($student_attens as $s_g){
        $student_atten_ids [] = $s_g['atten_id'];
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../static/classes.css">
        <link rel="stylesheet" href="../static/layout.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>


    <body>
        <div class="outer_container">
            <div class="header_and_content">
                <?php include('./partials/header.php') ?>

                <div class="content">
                    <?php include('./partials/sidebar.php') ?>

                    <div class="info">
                        <div class="search_wrapper">
                            <input type="text" class="search" id="search">
                            <span>Search by: </span>
                            <select name="" id="search_by">
                                <option value="Title">Title</option>
                                <option value="Lecturer">Lecturer</option>
                                <option value="Credits">Credits</option>
                                <option value="Time">Time</option>
                                <option value="Code">Code</option>
                            </select>
                            <button class="search_btn" id="search_btn">Search</button>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td style="width:30%"> Name </td>
                                    <td style="width:20%"> Lecturer </td>
                                    <td> Credit </td>
                                    <td> Code </td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $roll = "Enroll";
                                $function = 'enroll(this.name, this.id)';
                                foreach ($classes as $c) {
                                    $class_id = $c['class_id'];
                                    echo "<tr>";
                                    foreach ($c as $k => $v) {
                                        if ($k != "class_id")
                                            echo "<td class='class_info'>$v</td>";
                                    } ?>
                                    <td class='class_info'>
                                        <button id=<?= $class_id ?> class='group_appear'>
                                            View groups
                                        </button>
                                    </td>
                                    </tr>

                                    <tr id='nested_table_<?= $class_id ?>' style="display:none">
                                        <td></td>
                                        <td colspan="4" class="group_table_col">
                                            <table class="group_table">
                                                <tr name='group_head_<?= $class_id ?>'>
                                                    <td>Group</td>
                                                    <td>Day</td>
                                                    <td>Time</td>
                                                    <td>Room</td>
                                                    <td></td>
                                                </tr>
                                                <?php foreach ($groups[$class_id] as $g) { ?>
                                                    <tr name='group_$class_id'>
                                                        <?php foreach ($g as $k => $v) {
                                                            if ($k != 'id' && $k != 'atten_id') { 
                                                                if (in_array($g['atten_id'], $student_atten_ids)){
                                                                    echo "<td> $v </td>";
                                                                    $roll = "Unenroll";
                                                                    $function = 'unenroll(this.name, this.id)';
                                                                }
                                                                else{
                                                                    $roll = "Enroll";
                                                                    echo "<td> $v </td>";
                                                                }
                                                            }
                                                         }?>
                                                        <td> <button class="enroll" name=<?=$student_id['id']?> id=<?= $g['atten_id']?> onclick=enroll(this.name,this.id)> <?=$roll?> </button> </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var buttons = document.querySelectorAll(".group_appear");
            buttons.forEach((b) => {
                b.addEventListener('click', () => {
                    var elem = document.querySelector("#nested_table_" + b.id);
                    if (elem.style.display == 'none')
                        elem.style.display = 'table-row';
                    else elem.style.display = 'none';
                })
            })

            function enroll (stud_id, atten_id){
                $.ajax({
                    type: "POST",
                    url: 'enroll_unenroll.php',
                    data: {
                        'atten': atten_id,
                        'student': stud_id,
                        'action': 'enroll',
                    },
                    success: (data) =>{
                        $('#' + atten_id).html("Unenroll")
                        $('#' + atten_id).attr('onclick', 'unenroll()');
                        alert("Enrolled successfully")
                    },
                })
            }
            
            function unenroll(stud_id, atten_id){
                $.ajax({
                    type: "POST",
                    url: 'enroll_unenroll.php',
                    data: {
                        'atten': atten_id,
                        'student': stud_id,
                        'action': 'unenroll',
                    },
                    success: (data) =>{
                        $('#' + atten_id).html("Unenroll")
                        $('#' + atten_id).attr('onclick', 'unenroll()');
                        alert("Unenrolled successfully");
                        console.log(data)
                    }
                })
            }
        </script>
        <?php include('./partials/footer.php') ?>

    </body>

    </html>

<?php }
    else {
        header('location: login.php');
    }
?>