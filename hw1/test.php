<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET</title>
    <style>
        form {
            border: solid 1px;
            margin: auto;
            width: 300px;
            padding: 10px;
        }

        form input  {
            margin: 10px;
        }

        table {
            border: solid 1px;
            border-collapse: collapse;
        }

        table td, th{
            border: solid 1px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <p>
        <a href="worker.php?cat=34">WEB PROGRAMMING PHP</a>
    </p>
    <form action="worker.php" method="get">
        <h1>GET</h1>
        <input type="text" name="user"> - USER
        <br>
        <input type="password" name="pass"> - PASSWORD
        <br>
        <button>SEND GET</button>
    </form>
    <br>
    <br>
    <hr>
    <?php
        if(!empty($_POST['user']) && !empty($_POST['pass'])){
    ?>
    <table>
        <tr>
            <th>USER</th>
            <th>Password</th>
        </tr>
        <tr>
            <td>
                <?php
                    echo $_POST['user'];
                ?>
            </td>
            <td>
                <?php
                    echo $_POST['pass'];
                ?>
            </td>
        </tr>
    </table>
    <?php
        }
    ?>
    <hr>

    <form method="post">
        <h1>POST</h1>
        <input type="text" name="user"> - USER
        <br>
        <input type="password" name="pass"> - PASSWORD
        <br>
        <button name="send_post">SEND POST</button>
    </form>

</body>
</html>