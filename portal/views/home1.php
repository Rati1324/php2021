<?php 
    session_start();
    include('../static/conn.php');
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        include('../db/student_info.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/layout.css">
    <link rel="stylesheet" href="../static/portal.css">
</head>

<body>
    <div class="outer_container">
        <div class="header_and_content">
            <?php include('./partials/header.php') ?>
            
            <div class="content">
                <?php include('./partials/sidebar.php') ?> 
                <div class="info">
                    <div class="student_outer">
                        <h2 class="header_texts"> Student </h2>
                        <hr>
                        <div class="student_info">
                            <div>
                                <p> <?=$student_info['first_name'] . " " . $student_info['last_name']?> </p>
                                <p> <?=$school_res?> </p>
                            </div>
                            
                            <div>
                                <p>Year: <?=$student_info['year']?></p>
                                <p>Semester: <?=$student_info['semester']?></p>
                            </div>
                            
                            <div>
                                <p>GPA: 0.3</p>
                                <p>Credits: <?=$student_info['credits']?></p>
                            </div>
                            
                            <div>
                                <p>Attendance: 68%</p>
                                <p>Fees: <?=$student_info['fees']?></p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="classes_outer">
                        <h2 class="header_texts" style="margin-top:2px;"> Classes </h2>
                        <hr>
                        <div class="table_wrapper">
                            <table>
                                <thead>
                                    <td>Name</td>
                                    <td>Lecturer</td>
                                    <td>Credits</td>
                                    <td>Code</td>
                                </thead>
                                <tbody>
                                    <?php 
                                        include ('../db/get_classes.php');
                                        foreach ($classes as $c){
                                            echo "<tr>";
                                            foreach ($c as $v){
                                                echo "<td>$v</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    ?>
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
               
            </div>   
             
        </div> 
        
    </div>

    <?php include('./partials/footer.php')?>
    <script src="../static/portal_scripts.js ">
    </script>

</body>
</html>
<?php }?>