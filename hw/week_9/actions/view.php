<?php
    if (isset($_POST['remove'])) {
        $query = "DELETE FROM menu WHERE id = '$_POST[id]'";
        mysqli_query($conn, $query);
    }

    if (isset($_GET["action"]) && $_GET["action"] == "view_menu") {
        $query = "SELECT * FROM menu";
        $res = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($res) > 0) {
            $head = 0;
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <div class="menu">
                    <div class="title"><?= $row['title'] ?></div>
                    <div class="text"><?= $row['text2'] ?></div>
                    <div class="edit_wrapper">
                        <form method="POST" action="actions/edit.php">
                            <button name="edit">Edit</button>
                            <input type="hidden" name="id" value="<?=$row['id']?>">
                            <button name="remove">Remove</button>
                        </form>
                    </div>
                </div>
        <?php }
        }
    }
?>
