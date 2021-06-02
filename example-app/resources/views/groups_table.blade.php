<?php
$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
$classes_groups = [];
foreach($groups as $g){
    if (isset($classes_groups[$g->class_id]))
    $classes_groups[$g->class_id][] = $g;
    else $classes_groups[$g->class_id] = [$g];
}

$student_id = auth()->user()->value('id');
$action = "Enroll";
foreach ($classes as $c) {
    // listing classes
    $class_id = $c->class_id;
    echo "<tr>";
    foreach ($c as $k => $v) {
        if ($k != "class_id")
            echo "<td class='class_info'>$v</td>";
    } ?>
    <td class='class_info'>
        <button id=<?= $class_id ?> class='group_appear'>
            View groups
        </button>
    </td>
    </tr>

    <tr id='nested_table_<?= $class_id ?>' style="display:none"> 
        <td></td>
        <td colspan="4" class="group_table_col">
            <table class="group_table">
                <tr name='group_head_<?= $class_id ?>'>
                    <td>Group</td>
                    <td>Day</td>
                    <td>Time</td>
                    <td>Room</td>
                    <td></td>
                </tr>
                 <!-- groups list on each class inside a nested table -->
                 <?php foreach ($classes_groups[$class_id] as $g) { 
                    
                    // check if already enrolled so that the button message is appropriate, and for the action paramater in ajax
                    $action = (in_array($g->atten_id, $student_atten_ids)) ? "Unenroll" : "Enroll";
                    ?>
                    <tr name='group_$class_id'>
                        <?php foreach ($g as $k => $v) {
                            if ($k != 'class_id' && $k != 'atten_id') { 
                                if (in_array($g->atten_id, $student_atten_ids))
                                    $action = "Unenroll";
                                else
                                    $action = "Enroll";
                                $v = $k == "day" ? $days[$v] : $v;
                                echo "<td> $v </td>";
                            }
                            }?>
                        <td> <button class="enroll" data-student-id=<?=$student_id?> data-action=<?=$action?> data-atten-id=<?=$g->atten_id?> onclick=enroll(this)> <?=$action?> </button> </td>
                    </tr>
                <?php } ?>
                    
            </table>
        </td>
    </tr>
<?php } ?>