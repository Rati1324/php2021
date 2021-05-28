<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../db/db.php');
    $db = new Database;
    $student_id = $db->find_id($_SESSION['email']);
    $classes = $db->classes();
    $groups = $db->groups();

    $student_attens = $db->student_classes($_SESSION['email']);
    $student_atten_ids = [];
    foreach($student_attens as $s_g)
        $student_atten_ids [] = $s_g['atten_id'];
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
                            <input type="text" class="search" id="search" placeholder="Enter a class name">
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
                                $action = "Enroll";
                                foreach ($classes as $c) {
                                    // listing classes
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
                                                <!-- groups list on each class inside a nested table -->
                                                <?php foreach ($groups[$class_id] as $g) { 
                                                    // check if already enrolled so that the button message is appropriate, and for the action paramater in ajax
                                                    $action = (in_array($g['atten_id'], $student_atten_ids)) ? "Unenroll" : "Enroll";
                                                    ?>
                                                    <tr name='group_$class_id'>
                                                        <?php foreach ($g as $k => $v) {
                                                            if ($k != 'id' && $k != 'atten_id') { 
                                                                if (in_array($g['atten_id'], $student_atten_ids)){
                                                                    echo "<td> $v </td>";
                                                                    $action = "Unenroll";
                                                                }
                                                                else{
                                                                    $action = "Enroll";
                                                                    echo "<td> $v </td>";
                                                                }
                                                            }
                                                         }?>
                                                        <td> <button class="enroll" data-student-id=<?=$student_id['id']?> data-action=<?=$action?> data-atten-id=<?=$g['atten_id']?> onclick=enroll(this)> <?=$action?> </button> </td>
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

            function enroll (a){
                var student_id = a.getAttribute('data-student-id')
                var atten_id = a.getAttribute('data-atten-id')
                var action = a.getAttribute('data-action')
                var new_action = "Enroll";
                
                var new_action = action == "Enroll" ? "Unenroll" : "Enroll"
                $.ajax({
                    type: "POST",
                    url: 'enroll_unenroll.php',
                    data: {
                        'atten': atten_id,
                        'student': student_id,
                        'action': action,
                    },
                    
                    success: (data) =>{
                        alert(action + "ed successfully")
                        $('*[data-atten-id=' + atten_id + ']').attr('data-action', new_action)
                        $('*[data-atten-id=' + atten_id + ']').html(new_action)
                    },
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