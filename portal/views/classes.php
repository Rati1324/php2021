<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/classes.css">
    <link rel="stylesheet" href="../static/layout.css">
</head>


<body>
    <div class="outer_container">
        <div class="header_and_content">
            <?php include('./partials/header.php')?>
            
            <div class="content">
                <?php include('./partials/sidebar.php') ?>
    
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
        </div> 
    </div>
    <?php include('./partials/footer.php')?>

</body>
</html>