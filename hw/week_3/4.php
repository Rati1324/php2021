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
            margin: auto;
        }
        td{
            border: 1px solid;
            height: 40px;
            width: 40px;
        }
    </style>
</head>
<body>
    <?php
        $cars = array(
            array("Make"=>"Toyota", 
                "Model"=>"Corolla", 
                "Color"=>"White", 
                "Mileage"=>24000, 
                "Status"=>"Sold"),
        
            array("Make"=>"Toyota", 
                "Model"=>"Camry", 
                "Color"=>"Black", 
                "Mileage"=>56000, 
                "Status"=>"Available"),
                
            array("Make"=>"Honda", 
                "Model"=>"Accord", 
                "Color"=>"White", 
                "Mileage"=>15000, 
                "Status"=>"Sold")  );
    ?>

    <table>
        

        <?php 
            
            echo "<tr>";
            foreach ($cars[0] as $key => $value){
                echo "<td>";
                echo $key;
                echo "</td>";
            }
            echo "</tr>";

            foreach($cars as $val){
                echo "<tr>";
                foreach ($val as $key => $value){
                    echo "<td>";
                    echo $value;
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
            
    </table>
</body>
</html>