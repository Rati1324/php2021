<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="worker.php" method="GET">
        <h1>GET</h1>
        <input type="text" name="user"> user
        <br>
        <input type="text" name="pw"> pw
        <br>
        <button>send</button>
    </form>
    <br>

    <hr>
        <table>
            <tr>
                <th>user</th>
                <th>pw</th>
            </tr>
            <tr>
                <td>
                    <?php
                        $_POST['user'];
                    ?>
                </td>
                <td>
                    <?php
                        $_POST['pw'];
                    ?>
                </td>
            </tr>
            
        </table>
    <hr>

    <form action="" method="POST">

        <h1>POST</h1>
        <input type="text" name="user"> user
        <br>
        <input type="text" name="pw"> pw
        <br>
        <button name="sendpost">send</button>
        
    </form>

    
</body>
</html>