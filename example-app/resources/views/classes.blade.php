@extends('layout.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/classes.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content_inner')
<div class="info">
    <form class="search_form" action={{ route('search') }} method="GET">
        <input type="text" class="search" id="search" name="keyword" placeholder="Enter a class name">
        <button class="btn_1" id="search_btn" name="search">Search</button>
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
        var atten_id = a.getAttribute('data-atten-id')
        var action = a.getAttribute('data-action')
        var new_action = "Enroll";
        var new_action = action == "Enroll" ? "Unenroll" : "Enroll"

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type: "POST",
            url: '/classes',
            data: {
                _token: CSRF_TOKEN,
                'atten': atten_id,
                'action': action,
            },
            success: function (data){
                alert(action + "ed successfully")
                $('*[data-atten-id=' + atten_id + ']').attr('data-action', new_action)
                $('*[data-atten-id=' + atten_id + ']').html(new_action)
            },
        })
    }

</script>
@endsection