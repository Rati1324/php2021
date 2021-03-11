<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:230px;
            margin:auto;
        }
        form *{margin:2px;}
    </style>
</head>
<body>
    <form action="1_2.php" method="GET">
        <input type="text" name="name"> name
        <br>
        <input type="text" name="l_name"> last name
        <br>
        <input type="text" name="rank"> rank
        <br>
        <input type="number" step="50" name="salary"> salary
        <br>
        <button>send</button>
    </form>
   
    
</body>
</html>