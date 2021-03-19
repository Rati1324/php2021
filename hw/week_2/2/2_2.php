<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            /* width:600px; */
            margin:auto;
            border: 1px solid;
        }
        thead td{
            height: 20px;
            border: 1px solid;
            width: 170px;
            background-color: grey;
        }
        td{
            height:30px;
            border: 1px solid;
            width: 180px;
        }

    </style>
</head>
<body>
    
    <table>
        <thead>
            <td>name</td>
            <td>last name</td>
            <td>year</td>
            <td>semester</td>
            <td>course</td>
            <td>grade</td>
        </thead>

        <tr>
            <td> <?=$_POST['name']?> </td>
            <td> <?=$_POST['l_name']?> </td>
            <td> <?=$_POST['year']?> </td>
            <td> <?=$_POST['semester']?> </td>
            <td> <?=$_POST['course']?> </td>
            <td> <?= calc_grade() ?> </td>
        </tr>
    </table>

    <?php
            function calc_grade(){
                if ((int)$_POST['grade'] >= 91 ) $final_grade = "A";
                else if ((int)$_POST['grade'] >= 81 ) $final_grade = "B";
                else if ((int)$_POST['grade'] >= 71 ) $final_grade = "C";
                else if ((int)$_POST['grade'] >= 61 ) $final_grade = "D";
                else if ((int)$_POST['grade'] >= 51 ) $final_grade = "E";
                else $final_grade = "F";
                return $final_grade;
            }
    ?>
    
</body>
</html>