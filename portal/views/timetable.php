<?php
session_start();
require('../db/db.php');

if (isset($_SESSION['email'])) {
    $db = new Database();
    $classes_timetable = $db->get_timetable($_SESSION['email']);    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/layout.css">
    <link rel="stylesheet" href="../static/timetable.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="outer_container">
        <div class="header_and_content">
            <?php include('./partials/header.php') ?>

            <div class="content">
                <?php include('./partials/sidebar.php') ?>
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
                                echo "<tr id=$c[atten_id]>";
                                foreach ($c as $key => $value) {
                                    if ($key == "day"){
                                        if (isset($rowspans[$value])){
                                            if ($rowspans[$value] == 0) continue;
                                            $span = $rowspans[$value];
                                            $rowspans[$value] = 0;
                                            $value = $days[$value];
                                        }
                                    }
                                    if ($key != 'user_id' && $key != 'day_c' && $key != 'atten_id')
                                        echo "<td rowspan=$span> $value </td>";
                                    $span = 1;
                                }?>
                                <td rowspan=<?=$span?>> <button class="unenroll" name="<?=$c['user_id']?>" value=<?=$c['atten_id']?> onclick='unenroll(this.value, this.name)'> Unenroll </button> </td>
                                </tr>
                            <?php }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    <?php include('./partials/footer.php') ?>
    <script>
        
        function unenroll(atten_id, user_id){
            $.ajax({
                type: 'post',
                url: 'unenroll.php',
                data:{
                    atten_id: atten_id,
                    user_id: user_id,
                },

                success: (data) => {
                    console.log(data)
                    $('#' + atten_id).remove();
                }
            })
            
        }
    </script>
</body>

</html>
<?php } 
    else {
        header('location: login.php');
    }
?>