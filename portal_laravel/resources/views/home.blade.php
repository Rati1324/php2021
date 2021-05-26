@dd(auth()->student())
@extends('layout.app')
@section('styles') <link rel="stylesheet" href="{{ asset('css/portal.css') }}"> @endsection
@section('content_inner')

    <div class="sidebar">
                    <a href="home1.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                        </svg>
                        <p class="menu_text"> Home </p>
                    </a>

                    <a href="timetable.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <p class="menu_text"> Timetable </p>
                    </a>

                    <a href="classes.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        </svg>
                        <p class="menu_text"> Classes </p>
                    </a>
                    
                    <a href="contact">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        <p class="menu_text"> Contact </p>
                    </a>
                </div>
    <div class="info">
        <div class="student_outer">
            <h2 class="header_texts"> Student </h2>
            <hr>
            <div class="student_info">
                <div>
                    <p>Name: </p>
                    <p>  </p>
                </div>
                
                <div>
                    <p>Year:</p>
                    <p>Semester:</p>
                </div>
                
                <div>
                    <p>GPA: 0.3</p>
                    <p>Credits: </p>
                </div>
                
                <div>
                    <p>Attendance: 68%</p>
                    <p>Fees: </p>
                </div>
                
            </div>
        </div>

        <div class="classes_outer">
            <h2 class="header_texts" style="margin-top:2px;"> Classes </h2>
            <hr>
            <div class="table_wrapper">
                <table>
                    <thead>

                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>    
            </div> 
        </div> 

        <div class="news_outer">
        <h2 class="header_texts">University News</h2>
        <hr>
        <div class="news">
            <div class="left" id="left">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
            </div>

            <div class="wrapper">

                <div class="images" id="images">
                    
                    <div>
                        <img src="img/1.jpg" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>

                    <div>
                        <img src="img/2.jpg" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>

                    <div>
                        <img src="img/3.png" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>
                    <div>
                        <img src="img/4.png" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>

                    <div>
                        <img src="img/5.png" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>

                    <div>
                        <img src="img/6.png" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>

                    <div>
                        <img src="img/7.jpg" alt="">
                        <span>
                            news!!!!
                        </span>
                    </div>
                </div>

            </div> 

            <div class="right" id="right">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
            </div>

        </div> 
        </div>

    </div>  

    <div class="calendar">

    <table>

        <thead>
            <tr>
                <td colspan="7" id="time"></td>
            </tr>                
            <tr class="year_month">
                <td colspan="4" style="padding-left:20px" id="month">
                <td colspan="4" style="padding-right:50px" id="year">
                </td>
            </tr>
            <tr id="days">

                <td>Sun</td>
                <td>Mon</td>
                <td>Tue</td>
                <td>Wed</td>
                <td>Thu</td>
                <td>Fri</td>
                <td>Sat</td>
                
            </tr>

        </thead>
    
    <tbody id="cal_tbody">
        
    </tbody>
        <tfoot>
            <tr>
                <td colspan="4" onclick="prev()"><button>Previous</button></td>
                <td colspan="3" onclick="next()"><button>Next</button></td>
            </tr>
        </tfoot>
    </table> 

    <div class="events">
        
    </div>
                
</div>

<script src="JS/calendar.js"></script>
@endsection
{{-- @endif --}}