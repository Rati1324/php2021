<?php
session_start();
include('../static/conn.php');

if (isset($_SESSION['email'])) {
    // $email = $_SESSION['email'];
    // $info_query = "SELECT * FROM student WHERE email = '$email'";
    // $info_res = mysqli_query($conn, $info_query);
    // $student_info = mysqli_fetch_assoc($info_res);
    // $school_query = "SELECT name FROM school JOIN student 
    //                     ON school.school_id = student.school_id
    //                     WHERE student.email = '$email'
    //     ";
    // $school_query = mysqli_query($conn, $school_query);
    // $school_res = mysqli_fetch_assoc($school_query)['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/layout.css">
    <link rel="stylesheet" href="../static/timetable.css">
</head>

<body>
    <div class="outer_container">
        <div class="header_and_content">
            <?php include('./partials/header.php') ?>

            <div class="content">
                <?php include('./partials/sidebar.php') ?>
                <?php include('../db/get_timetable.php') ?>
                <div class="info">
                    <table>
                        <thead>
                            <tr>
                                <td>Day</td>
                                <td>Time</td>
                                <td>Class</td>
                                <td>Lecturer</td>
                                <td>Credit</td>
                                <td>Code</td>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                                $span = 1; 
                                foreach ($classes_timetable as $c) {
                                    echo "<tr>";
                                    foreach ($c as $key => $value) {
                                        if ($key == "day"){
                                            if (isset($rowspans[$value])){
                                                if ($rowspans[$value] == 0) continue;
                                                $span = $rowspans[$value];
                                                $rowspans[$value] = 0;
                                            }
                                            $value = $days[$value];
                                        }
                                        echo "<td rowspan=$span> $value </td>";
                                        $span = 1;
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
    <script src="../static/portal_scripts.js ">
    </script>

</body>

</html>
<?php } ?>