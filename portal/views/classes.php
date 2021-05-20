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
                                        if ($k == "group") { ?>
                                            <tr>
                                                <td>sad</td>
                                            </tr>
                                <?php } else
                                            echo "<td>$v</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include('./partials/footer.php') ?>

    </body>

    </html>
<?php } ?>