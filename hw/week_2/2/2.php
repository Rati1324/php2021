<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:300px;
            margin:auto;
        }
        form *{
            margin:10px;
        }
    </style>
</head>
<body>

    <form action="2_2.php" method="POST" autocomplete="off">
            <input type="text" name="name" required> name
            <br>
            <input type="text" name="l_name" required> last name
            <br>
            <input type="number" min="1" max="6" name="year" required> year
            <br>
            <input type="number" min="1" max="8" name="semester" required> semester
            <br>
            <input type="text" name="course" required> course
            <br>
            <input type="number" min="0" max="100" name="grade" required> grade
            <br>
            
            <button>send</button>
    </form>

    

</body>
</html>