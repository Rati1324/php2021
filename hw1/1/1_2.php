<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{

            border: 1px solid;
            margin:auto;
            height:100px;
            width: 500px;
            text-align: center;

        }

        tr td{
            border: 1px solid;
        }

        thead td{
            height:20px;
            width: 200px;
        }
        
    </style>
</head>
<body>
    <table>
        <thead>

            <td> name </td>
            <td> last name </td>
            <td> rank </td>
            <td> salary </td>
            <td> income tax </td>
            <td> income </td>

        </thead>
        
        <tr>
            <td> <?=$_GET['name']?> </td>
            <td> <?=$_GET['l_name']?> </td>
            <td> <?=$_GET['rank']?> </td>
            <td> <?=$_GET['salary']?> </td>
            <td> <?=$_GET['salary'] * 0.2?> </td>
            <td> <?=$_GET['salary'] - ($_GET['salary'] * 0.2)?> </td>
        </tr>
        
    </table>
    
    
</body>
</html>