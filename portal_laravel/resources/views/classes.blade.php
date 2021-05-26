@extends('layout.app')
@section('content')
<div class="outer_container">
    <div class="header_and_content">

        <div class="content">

            <div class="info">
                <div class="search_wrapper">
                    <input type="text" class="search" id="search">
                    <span>Search by: </span>
                    <select name="" id="search_by">
                        <option value="Title">Title</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Credits">Credits</option>
                        <option value="Time">Time</option>
                        <option value="Code">Code</option>
                    </select>
                    <button class="search_btn" id="search_btn">Search</button>
                </div>

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

                    </tbody>
                </table>
            </div>
        </div>

    </div>
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

    var enroll_btn = document.querySelectorAll(".enroll");
    enroll_btn.forEach((b) => {
        b.addEventListener('click', () => {
            $.ajax({
                type: "POST",
                url: './classes.php',
                data: {
                    'atten': b.id,
                    'student': b.name
                },
                success: function(data) {
                    alert("Enrolled successfully")
                },
                error: (xhr, status, error) => {
                    console.error(xhr);
                }
            })
        })
    })
</script>
@endsection


