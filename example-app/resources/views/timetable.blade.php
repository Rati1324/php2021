@extends('layout.app')
@section('styles') <link rel="stylesheet" href="{{ asset('css/timetable.css') }}"> @endsection
@section('content_inner')
<div class="info">
    <table>
        <thead>
            <tr>
                <td>Day</td>
                <td>Time</td>
                <td>Class</td>
                <td>Lecturer</td>
                <td>Credit</td>
                <td>Code</td>
            </tr>

        </thead>
        <tbody>
            <?php

                $days = ["Monday", "Tuestday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                $span = 1; 
                foreach ($classes_timetable as $c) {
                    echo "<tr>";
                    foreach ($c as $key => $value) {
                        if ($key != 'user_id' && $key != 'atten_id'){
                            if ($key == "day"){
                                if (isset($rowspans[$value])){
                                    if ($rowspans[$value] == 0) continue;
                                    $span = $rowspans[$value];
                                    $rowspans[$value] = 0;
                                }
                                $value = $days[$value];
                            }
                            echo "<td rowspan=$span> $value </td>";
                            $span = 1;
                        }
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
@endsection
{{-- <script src="../static/portal_scripts.js ">
</script> --}}
