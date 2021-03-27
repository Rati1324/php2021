<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Strength</title>
    <style>
        form{
            width: 350px;
            margin:auto;
            margin-top: 200px;
        } 
    </style>
</head>
<body>
    <?php
        function find_strength($numbers, $symbols, $uppercase){
            $strength = "";
            if ($numbers){
                if ($symbols) $strength = "Strong";
                else if ($uppercase) $strength = "Strong";
                else $strength = "Average";
            }
            
            else if ($symbols){
                if ($numbers) $strength = "Strong";
                else if ($uppercase) $strength = "Strong";
                else $strength = "Average";
            }
            
            else if ($uppercase){
                if ($numbers) $strength = "Strong";
                else if ($symbols) $strength = "Strong";
                else $strength = "Average";
            }

            else {$strength = "Weak";}
            return $strength;
        }


        if (isset($_POST['send'])){
            $ms = ""; 
            $strength = "";
            $numbers = 0;
            $symbols = 0;
            $uppercase = 0;
            $letters = 0;
            if (strlen($_POST['pw']) < 6) $ms = "Password must be atleast 6 characters";
            foreach(str_split($_POST['pw']) as $char){
                if (ctype_digit($char)) {$numbers = 1;}
                else if (!ctype_alpha($char)) {$symbols = 1;}
                else if (ctype_upper($char)) $uppercase = 1;
                else if (ctype_lower($char) && ctype_alpha($char)) $letters = 1;
            }
            if (!$letters) $ms = "Password must contain atleast one lowercase alphabetic character.";
            else {$strength = find_strength($numbers, $symbols, $uppercase);}
            if ($strength == "Weak") $ms = "Password is too weak. try using symbols, numbers and uppercase letters";

        }
        else {$ms = ""; $strength = "";}
    ?>

    <form autocomplete="off" method="POST">
        Password: <input type="text" name="pw">
        <span name="message" class="message"> <?=$strength?> </span> <br>
        <span name="message" style="color:red"> <?=$ms?> </span> <br>
        <button name="send">Send</button>
    </form>
    <?php
        if ($strength == "Weak")
            echo "<script> document.querySelector('.message').style.color='red' </script>";
        else if ($strength == "Average")
            echo "<script> document.querySelector('.message').style.color='Green' </script>";
        else
            echo "<script> document.querySelector('.message').style.color='blue' </script>";
    ?>
</body>
</html>