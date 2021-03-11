<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ol{
            width:260px;
            margin: auto; 
        }
        
    </style>
</head>
<body>
    <?php
        $count = 0;
    ?>

    <table>
        <ol>
            <li> 
                <?php
                    if ($_POST['a_1'] == "ans_2"){
                        echo "ans_2" . "<span style='color:green'> Correct </span>";$count++;
                    }
                    else echo "ans_2" . "<span style='color:red'> InCorrect </span>";$count++;
                ?>
            </li>
            <li> 
                <?php
                    if ($_POST['a_1'] == "ans_1"){
                        echo "ans_2" . "<span style='color:green'> Correct </span>";$count++;
                    }
                    else echo "ans_2" . "<span style='color:red'> InCorrect </span>";
                ?>
            </li>
            <li> 
                <?php
                    if ($_POST['a_1'] == "ans_1"){
                        echo "ans_2" . "<span style='color:green'> Correct </span>";$count++;
                    }
                    else echo "ans_2" . "<span style='color:red'> InCorrect </span>";
                ?>
            </li>
            
        </ol>
        <?php echo "correct answers: " . $count ?>
    </table>
</body>
</html>