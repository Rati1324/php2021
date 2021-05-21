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
                                    echo "<tr>";
                                    foreach ($c as $k => $v) {
                                        if ($k == "class_id") {
                                            echo "<td> <button id='group_appear'> Groups </button> </td>";
                                            echo "<tr class='group_title'>";
                                                echo "<td>Day</td>";
                                                echo "<td>Time</td>";
                                                echo "<td>Group</td>";
                                                echo "<td>Room</td>";
                                            echo "</tr>";
                                            foreach ($groups[$v] as $g) {
                                                
                                                echo "<tr class='group'>";
                                                    echo "<td>" . $g['day'] . "</td>";
                                                    echo "<td>" . $g['time'] . "</td>";
                                                    echo "<td>" . $g['group'] . "</td>";
                                                    echo "<td>" . $g['room'] . "</td>";
                                                echo "</tr>";
                                            }
                                        } 
                                        else
                                            echo "<td class='class_info'>$v</td>";
                                            
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <button class="butt">butt</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#group_appear").click(() => {
                $(".group").css("display", "table-row");
                $(".group_title").css("display", "table-row");
            })
        </script>
        <?php include('./partials/footer.php') ?>

    </body>

    </html>

<?php } ?>