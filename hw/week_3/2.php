<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: 1px solid;
            /* height:200px; */
            /* width: 200px; */
            margin: auto;
        }
        table tr td{
            border: 1px solid;
            height: 50px;
            width: 50px;
        }

        h2{
            width: 230px;
            margin:auto;
            margin-top: 20px;
        }

        .input{
            width: 200px;
            margin: auto;
        }
        
    </style>
</head>
<body>
        <?php
            echo "<h2>Random Matrix</h2>";
            

            $matrix = [[], [], [], []]; 
            $old_value = "";
            if (isset($_POST['send'])){
                $old_value = $_POST['num'];
                $multiples = []; $sum = 0; $prod = 1;
                echo "<br>";
                for ($i=0; $i<sizeof($_POST['matrix']); $i++){
                    array_push($matrix[(int)$i/4], $_POST['matrix'][$i]);
                    if (($_POST['matrix'][$i] % $_POST['num']) == 0) array_push($multiples, $_POST['matrix'][$i]);
                }

                
                // MAIN MATRIX
                echo "<table>";
                foreach($matrix as $row){
                    echo "<tr>";
                    foreach($row as $col) echo "<td>" . $col . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // OUTPUTTING THE RESULT TABLE
                foreach($_POST['matrix'] as $val) $sum += $val; $prod *= $val;
                
            }
            // RANDOM MATRIX
            else {
                
                echo "<table>";
                foreach($matrix as &$row){
                    echo "<tr>";
                    for ($i=0; $i<4; $i++){
                        $cur_rand = rand(10, 100);
                        array_push($row, $cur_rand);
                        echo "<td>" . $cur_rand . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }


            $col_value = "";

            // DIAGONAL
            echo "<table>";
            echo "<h2>Above Main Diagonal</h2>";
            for ($i=0; $i<4; $i++){
                echo "<tr>";
                for ($j=0; $j<4; $j++) {
                    if ($j > $i) $col_value = $matrix[$i][$j];
                    echo "<td>" . $col_value . "</td>";
                    $col_value = "";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>

        <form method="post" autocomplete="off" class="input">
                Enter a number: <input type="text" name="num" value="<?=$old_value?>" required>
                <button name="send">Send</button>
            <?php 
                foreach($matrix as $row2){
                    foreach($row2 as $col2){
                        echo "<input type='hidden' name='matrix[]' value='" . $col2 . "' > ";
                    }
                }
            ?>
        </form>
        <form method="get" style="margin-left: 684px;">
            <button>Refresh</button>
        </form>

        <?php if(isset($_POST['send'])) {  ?>
        <h2>Result </h2>
        <table>
            <tr>
                <td>multiples</td>
                <td>sum</td>
                <td>mean</td>
                <td>product</td>
                <td>geometric mean</td>
                </tr>

            <tr>
                <td> <?php
                    if (!empty($multiples)){
                        foreach($multiples as $val){
                            echo $val . " ";
                        }
                    }
                ?> </td> 
                <td> <?=$sum?> </td>
                <td> <?=$sum/16?> </td>
                <td> <?=$prod?> </td>
                <td> <?=pow($prod,1/16)?> </td>
            </tr>
        </table>
        <?php } ?>
    

</body>
</html>