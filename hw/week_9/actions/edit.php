<?php require_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
        if (isset($_POST['edit'])) {
            $query = "SELECT * FROM menu WHERE id = '$_POST[id]'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
        ?>
            <form class="edit" method="POST">
                title <br>
                <input name="title" type="text" value="<?= $row['title'] ?>"> <br>
                text <br>
                <textarea name="text"><?= $row['text2'] ?></textarea> <br>
                <button name="save">Save</button>
                <input type="hidden" name="id" value=<?=$_POST['id']?>>
            </form>
    <?php }
    if (isset($_POST['save'])) {
        print_r($_POST);
        $query = "UPDATE menu SET title = '$_POST[title]', text2 = '$_POST[text]' where id='$_POST[id]'";
        mysqli_query($conn, $query);
        header('location: ../action.php?action=view_menu');
    }
    ?>
</body>

</html>