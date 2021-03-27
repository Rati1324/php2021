<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $error = ""; $code = "";
        if (isset($_POST['send'])){
            if ($_POST['user_code'] != $_POST['site_code']){
                $error = "Invalid Code";
                $code = $_POST['site_code'];
            }
            else {
                echo "<span style='color:green'> Success </span>";
            }
        }
        
        else{
            for($i=0; $i<5; $i++){
                $code .= (string)rand(0,9);
            }
        }
    ?>
    
    <span> <?=$code?> </span>
    <span style="color: red"> <?=$error?> </span>

    <form action="" method="POST" autocomplete="off" >
        Code <input type="text" name="user_code" required>
        <button name="send">Send</button>
        <input type="hidden" value="<?=$code?>" name="site_code">
    </form>
    
</body>
</html>