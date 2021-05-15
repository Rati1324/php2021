<?php 
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $reg_date = $_POST['reg_date'];
        $pw = $_POST['pw'];
        $gender = $_POST['gender'];

        $query = "INSERT INTO student VALUES(NULL, '$name', '$last_name', '$age', '$reg_date',
                    '$pw', '$gender')";

        mysqli_query($conn, $query);
        mysqli_close($conn);
    }
?>

<form class="insert" action="" method="post" autocomplete="off">

    <input type="text" name="name" placeholder="name"> <br> 
    <input type="text" name="last_name" placeholder="last_name"> <br>
    <input type="text" name="age" placeholder="age"> <br>
    <input type="text" name="pw" placeholder="password"> <br> 
    <input type="text" name="gender" placeholder="gender"> <br> 
    <input type="hidden" name="reg_date" value="<?php echo date('y-m-d') ?>"> <br> 

    <button name="send">Send</button>
</form>