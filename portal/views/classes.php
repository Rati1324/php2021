<?php
session_start();
include('../static/conn.php');

if (isset($_SESSION['email'])) {
    include('../db/get_all_classes.php');

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

                                foreach ($classes as $c) {
                                    $class_id = $c['class_id'];
                                    echo "<tr>";
                                    foreach ($c as $k => $v) {
                                        if ($k != "class_id")
                                            echo "<td class='class_info'>$v</td>";
                                    }?>
                                        <td> 
                                            <button id=<?=$class_id?> class='group_appear'> 
                                                View groups 
                                            </button> 
                                        </td>
                                    </tr>

                                    <tr name='group_head_<?=$class_id?>' style='display:none'>
                                        <td></td>
                                        <td>Day</td>
                                        <td>Time</td>
                                        <td>Group</td>
                                        <td>Room</td>
                                    </tr>

                                    <?php
                                    // try table nesting for better layout if not then idc
                                    foreach($groups[$class_id] as $g){
                                        echo "<tr name='group_$class_id' style='display:none'>";
                                        echo "<td></td>";
                                        foreach($g as $k => $i){
                                            if ($k!='id'){
                                                echo "<td>
                                                <table>
                                                <tr>
                                                    <td>$i</td>
                                                </tr>
                                                </table></td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                }
                                ?>
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
                    if (document.getElementsByName("group_head_" + b.id)[0].style.display != 'table-row') {
                        var elems = document.getElementsByName("group_" + b.id);
                        elems.forEach((x) => x.style.display = 'table-row');
                        document.getElementsByName("group_head_" + b.id)[0].style.display = 'table-row';
                    } else {
                        var elems = document.getElementsByName("group_" + b.id);
                        elems.forEach((x) => x.style.display = 'none');
                        document.getElementsByName("group_head_" + b.id)[0].style.display = 'none';
                    }
                })
            })
        </script>
        <?php include('./partials/footer.php') ?>

    </body>

    </html>

<?php } ?>