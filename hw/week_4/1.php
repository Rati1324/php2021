<!DOCTYPE html>
<html lang="en">
<head>
    <title>Week 4</title>
    
    <style>
        table{
            border: 1px solid;
            margin:auto;
        }
        td{
            border: 1px solid;
            width:40px;
            height:30px;
        }
    </style>
</head>
<body>
    
    <?php
        function table(){
            echo "<table>";
                for ($i=0; $i<10; $i++){
                    echo "<tr>";
                    for($j=0; $j<10; $j++){
                        echo "<td>" . rand(10, 99) . "</td>";
                    }
                    echo "</tr>";
                }
            echo "</table>";
        }

        table();
    ?>
    
    
</body>
</html>