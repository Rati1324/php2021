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
                $span = 1; 
                foreach ($classes_timetable as $c) {
                    echo "<tr>";
                    foreach ($c as $key => $value) {
                        if ($key == "day"){
                            if (isset($rowspans[$value])){
                                if ($rowspans[$value] == 0) continue;
                                $span = $rowspans[$value];
                                $rowspans[$value] = 0;
                            }
                        }
                        echo "<td rowspan=$span> $value </td>";
                        $span = 1;
                    }
                    echo "</tr>";
                            }
            ?>
        </tbody>
    </table>
</div>

{{-- <script src="../static/portal_scripts.js ">
</script> --}}
