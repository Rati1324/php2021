<?php
    $span = 1; 
    foreach ($classes_timetable as $c) {
        echo "<tr>";
        print_r($c);
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