<!DOCTYPE html>
<html lang="en">
<head>
    <title>4</title>
</head>
<body>
    <?php
        $result = "";
        $input = "";
        $check = 1;

        if (isset($_GET['send'])){
            $answer = $_GET['answer'];
            if ($_GET['input'] == $_GET['answer']) {
                $result = "Success";
            }
            else {
                $check = 0;
                $result = "Invalid";
                $input = $_GET['input'];
            }
            $calc = $_GET['calc'];
        }

        if ($check){
            $calc = "";
            $x = rand(10,99);
            $y = rand(10,99);
            $operations = ["+", "-", "*", "/"];
            $operation = $operations[rand(0,3)];
            $calc = $x . " $operation " . $y . " = ";
            $answer = eval("return \$x" . $operation . $y . ";");
        }
    ?>
    
    <form action="" autocomplete="off" method="GET">
        <span> <?=$calc?> </span>
        <input type="text" name="input" value="<?=$input?>">
        <span class="result"> <?=$result?> </span>
        <button name="send">Send</button>

        <input type="hidden" name="calc" value="<?=$calc?>"> 
        <input type="hidden" name="answer" value="<?=$answer?>">
    </form>

    <?php
        if (!$check)
            echo "<script> document.querySelector('.result').style.color='red' </script>";
        else echo "<script> document.querySelector('.result').style.color='green' </script>";
    ?>
</body>
</html>