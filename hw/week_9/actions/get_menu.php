<?php


    $query = "SELECT * FROM menu WHERE title='news' OR title='about'";
    $res = mysqli_query($conn, $query);
    
    echo "<h3> Where title = news or about</h3>";
    echo "<table>";
    if (mysqli_num_rows($res) > 0){
        $keys_finished = 0;
        $table_keys = "<tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            $table_values = "<tr>";
            foreach ($row as $key => $value) {
                if (!$keys_finished)
                    $table_keys .= "<td>" . $key . "</td>";
                $table_values .= "<td>" . $value . "</td>";
            }

            if (!$keys_finished) echo $table_keys;
            $keys_finished = 1;
            $table_values .= "</td>";
            echo $table_values;
        }
        $table_keys .= "</tr>";
    }
    echo "</table>";
    
?>

