@extends('layout.app')
@section('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/classes.css">
@endsection
@section('content_inner')

<div class="info">
    <form class="search_wrapper" method="post">
        <input type="text"  class="search" id="search" name="keyword" placeholder="Enter a class name">
        <button class="search_btn" id="search_btn" name="search">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <td style="width:30%"> Name </td>
                <td style="width:20%"> Lecturer </td>
                <td> Credit </td>
                <td> Code </td>
            </tr>
        </thead>
        <tbody>
            <!-- creating groups and classes tablle from classes and groups array -->
            @include('groups_table')
        </tbody>
    </table>
</div>
<script>
    var buttons = document.querySelectorAll(".group_appear");
    buttons.forEach((b) => {
        b.addEventListener('click', () => {
            var elem = document.querySelector("#nested_table_" + b.id);
            if (elem.style.display == 'none')
                elem.style.display = 'table-row';
            else elem.style.display = 'none';
        })
    })

    function enroll (a){
        var student_id = a.getAttribute('data-student-id')
        var atten_id = a.getAttribute('data-atten-id')
        var action = a.getAttribute('data-action')
        var new_action = "Enroll";
        
        var new_action = action == "Enroll" ? "Unenroll" : "Enroll"
        $.ajax({
            type: "POST",
            url: 'enroll_unenroll.php',
            data: {
                'atten': atten_id,
                'student': student_id,
                'action': action,
            },
            
            success: (data) =>{
                alert(action + "ed successfully")
                $('*[data-atten-id=' + atten_id + ']').attr('data-action', new_action)
                $('*[data-atten-id=' + atten_id + ']').html(new_action)
            },
        })
    }
</script>
@endsection