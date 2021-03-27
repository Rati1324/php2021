<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles/2.css">
</head>
<body>
    <?php
        function validate($x) {return is_numeric($x) && (int)$x == (float)$x && (int)$x > 0;}

        $errors = ["M" => '', "N" => '', "a" => '', "b" => ''];
        $old_data = ["old_M" => '', "old_N" => '', "old_a" => '', "old_b" => ''];
        $bool_check = 1;

        if (isset($_GET['send'])){
            foreach($_GET as $key => $value){
                $old_data['old_' . $key] = $value;
                    if ($key != "send" && !validate($value)){
                        $errors[$key] = "Enter a Positive Integer";
                        $bool_check = 0;
                }
            }
        }

        function create_table(){
            echo "<table>";
            for ($i=0; $i<$_GET['M']; $i++){
                echo "<tr>";
                for ($j=0; $j<$_GET['N']; $j++){
                    echo "<td>" . rand($_GET['a'], $_GET['b']) . "</td>";
            }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <form method="GET" autocomplete="off">
        <label> M: </label> <input type="text" name="M" value="<?=$old_data['old_M']?>" required> <span class="error"> <?=$errors["M"]?> </span><br>
        <label> N: </label> <input type="text" name="N" value="<?=$old_data['old_N']?>" required> <span class="error"> <?=$errors["N"]?> </span><br>
        <label> a: </label> <input type="text" name="a" value="<?=$old_data['old_a']?>" required> <span class="error"> <?=$errors["a"]?> </span><br>
        <label> b: </label> <input type="text" name="b" value="<?=$old_data['old_b']?>" required> <span class="error"> <?=$errors["b"]?> </span><br>
        <button name="send"> Send </button>
    </form>

    <?php 
        if ($bool_check && isset($_GET['send'])) create_table();
    ?>
    
</body>
</html>