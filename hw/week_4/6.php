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
        
        function create_table($cols){
            echo "<table>";
            $col_sum = [];
            $row_sum = [];
            $col_sum = array_fill(0, $cols, 0);
            for ($i=0; $i<$_GET['M']; $i++){
                echo "<tr>";
                array_push($row_sum,0);
                for ($j=0; $j<$_GET['N']; $j++){
                    $cur_rand = rand($_GET['a'], $_GET['b']);
                    echo "<td>" . $cur_rand . "</td>";
                    $row_sum[$i] += $cur_rand;
                    $col_sum[$j] += $cur_rand;
                }
                echo "</tr>";
            }
            echo "</table>";
            return [$row_sum, $col_sum];
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
        if ($bool_check && isset($_GET['send'])) {
            $res = create_table($_GET['N']);
            echo "<div class='result'> Sum of rows: ";
            foreach($res[0] as $elem) echo $elem . " ";
            echo "<br>Sum of cols: ";
            foreach($res[1] as $elem2) echo $elem2 . " ";
            echo "</div>";
        }
    ?>
    
</body>
</html>