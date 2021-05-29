<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../db/db.php');
    $db = new Database;
    $student_id = $db->find_id($_SESSION['email']);
    if (isset($_POST['search']))
        $classes = $db->classes($_POST['keyword']);
    else 
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
                        <form class="search_wrapper" method="post">
                            <input type="text"  class="search" id="search" name="keyword" placeholder="Enter a class name">
                            <button class="search_btn" id="search_btn" name="search">Search</button>
                        </form>

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
                                <!-- creating groups and classes tablle from classes and groups array -->
                                <?php include('includes/groups_table.php') ?>
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