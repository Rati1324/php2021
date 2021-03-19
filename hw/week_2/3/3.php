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

    <form action="3_2.php" method="POST" autocomplete="off">
            <p>question 1</p>
            <input type="radio" name="a_1" value="ans_1">1
            <input type="radio" name="a_1" value="ans_2">2
            <input type="radio" name="a_1" value="ans_3">3
            <input type="radio" name="a_1" value="ans_4">4

            <p>question 2</p>
            <input type="radio" name="a_2" value="ans_1">1
            <input type="radio" name="a_2" value="ans_2">2
            <input type="radio" name="a_2" value="ans_3">3
            <input type="radio" name="a_2" value="ans_4">4

            <p>question 3</p>
            <input type="radio" name="a_3" value="ans_1">1
            <input type="radio" name="a_3" value="ans_2">2
            <input type="radio" name="a_3" value="ans_3">3
            <input type="radio" name="a_3" value="ans_4">4
            <br>
            <input type="text" placeholder="???????">
            <br>
            <input type="text" placeholder="????">
            <br>
            <button>send</button>
    </form>

    

</body>
</html>