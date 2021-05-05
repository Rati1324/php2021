<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/classes.css">
</head>


<body>
    <div class="outer_container">
        <!-- <%- include("./partials/sidebar.ejs") %> -->
    
        <div class="content">
            <header>
                <h2>Student Portal</h2>
                <span style="margin-right:10px">Log Out</span>
                <div class="logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                </div>
            </header>
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
                            <td style="width:30%"> Title </td>
                            <td style="width:20%"> Lecturer </td>
                            <td> Credit </td>
                            <td> Room </td>
                            <td> Time </td>
                            <td> Code </td>
                            <td></td>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <!-- <% for (let i=0; i<classes.length; i++) { %>
                            <% var days = ['Mon','Tue','Wed','Thur','Fri','Sat','Sun'] %>
                            <tr>
                                <td> <%= classes[i].Title %> </td>
                                <td> <%= classes[i].Lecturer %> </td>
                                <td> <%= classes[i].Credits %> </td>
                                <td> <%= classes[i].Room %> </td>
                                <td> <%= classes[i].Time %> </td>
                                <td> <%= classes[i].Code %> </td>
                                <td> <%= days[classes[i].Day] %> </td>
                                <td> <button class="choose" class="choose" value = <%= classes[i].Code %> >Choose</button> </td>
                            </tr>
                        <% } %> -->
                    </tbody>
                </table>
            
        </div> 
    </div>
    <footer>
    </footer> 

</body>
</html>