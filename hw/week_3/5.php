<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 570px;
            padding: 10px;
            border: solid;
            margin: auto;
            margin-bottom:20px;
        }
        form input[type="text"], textarea{
            margin: 10px;
            width:230px;
        }
        .error{
            color: red;
            font-size: 14px;
        }
        table{
            margin-top: 30px;
            border: solid black 1px;
            border-collapse: collapse;
            margin:auto;
        }
        table td {
            border: solid black 1px;
            padding: 10px;
        }

        thead tr{
            background-color: grey;
        }
        .label{
            display: inline-block;
            width: 65px;
        }
        
    </style>
</head>
<body>
    <?php

        $user_error = ['name' => "", 'e-mail' => ""];
        $validation_fields = ['name' => "", 'e-mail' => ""];
        $old_data = ['name' => "", 'e-mail' => "", 'website' => "", 'comment' => "", 'gender' => ""];
        $data_bool = true;

        if(isset($_POST['send_user'])){

            $old_data['name'] = $_POST['name'];
            $old_data['e-mail'] = $_POST['e-mail'];
            $old_data['website'] = $_POST['website'];
            $old_data['comment'] = $_POST['comment'];
            $old_data['gender'] = $_POST['gender'];

            foreach($_POST as $key => $value){
                if ( isset($validation_fields[$key]) ){
                    if (empty($_POST[$key])) {
                        $user_error[$key] = "this field cant be empty"; $data_bool = false;
                        
                    }
                    else if (!ctype_alpha($_POST[$key])) {$user_error[$key] = "only alphabetic characters allowed!"; 
                        $data_bool = false;}                
                        
                };
            }
        }
        
    ?>


    <form method="POST" autocomplete="off">

        <h2>PHP form validation</h2>
        <span class="label">name:</span> <input type="text" name="name" value = "<?=$old_data['name']?>"> <span id = "name"> * </span>
        <label for="" class="error"><?= $user_error['name'] ?></label>
        <br>
        <span class="label"> e-mail: </span> <input type="text" name="e-mail" value = "<?=$old_data['e-mail']?>"> <span id = "e-mail"> * </span>
        <label for="" class="error"><?=$user_error['e-mail']?></label>

        <br>
        <span class="label"> website: </span> <input type="text" name="website" value = "<?=$old_data['website']?>"> 
        <br>
        <span class="label"> comment: </span> <textarea id="" cols="30" rows="10" name="comment" value=""><?=$old_data['comment']?></textarea>
        <br>

        <span class="label"> gender: </span>
        <input type="radio" name="gender" value="male" <?php echo (($_SERVER['REQUEST_METHOD'] === 'GET') || ($old_data['gender']=='male')) ? 'checked' : '' ?> > male
        <input type="radio" name="gender" value="female" <?php echo ($old_data['gender']=='female') ? 'checked' : ''?>  > female
        <input type="radio" name="gender" value="other" <?php echo ($old_data['gender']=='other') ? 'checked' : ''?> > other *
        <button name="send_user">Submit</button>
    </form>
    
    <?php if (isset($_POST['send_user']) && $data_bool){ ?>
        
        <table>
            <thead>
                <td> User </td>
                <td> E-mail </td>
                <td> Website </td>
                <td> Comment </td>
                <td> Gender </td>
            </thead>

            <tr>
                <td> <?=$_POST['name'] ?> </td>
                <td> <?=$_POST['e-mail'] ?> </td>
                <td> <?=$_POST['website'] ?> </td>
                <td> <?=$_POST['comment'] ?> </td>
                <td> <?=$_POST['gender'] ?> </td>
            </tr>
        </table>
        
    <?php }
      
        if (!$data_bool){
            foreach($user_error as $key => $value){
                if (!empty($value))  
                    echo "<script> document.querySelector('#$key').style.color = 'red'  </script>";
                }
            }
            else {
                foreach($user_error as $key => $value){
                    echo "<script> document.querySelector('#$key').style.color = 'black'  </script>";

            }
        }

    ?>
    

</body>
</html>