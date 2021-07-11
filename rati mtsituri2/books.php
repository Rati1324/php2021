<?php
    require('db.php');
    if (isset($_POST['delete'])){
        $id = $_POST['delete'];
        $query = "DELETE FROM book WHERE id = '$id'";
        mysqli_query($conn, $query);
    }

    else if (isset($_POST['save'])){
        $id = $_POST['save'];
        $name = $_POST['name_b'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];
        $price = $_POST['price'];
        $code = $_POST['code'];
        $query = "UPDATE book SET name_b='$name', author='$author', pages=$pages, price=$price, code='$code' WHERE id = $id";
        echo $query;
        mysqli_query($conn, $query);
    }

    $query = "SELECT * FROM book";
    $res = mysqli_query($conn, $query);
    $books = [];
    if (mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res)){
            $books[] = $row;
        }
    }
    $books2 = [];
    while (count($books2) < 5){
        $random_book = rand(0,count($books) - 1);
        if (!in_array($books[$random_book], $books2)) $books2[] = $books[$random_book];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="books">
        <table>
            <thead>
                <tr>
                    <td>name</td>
                    <td>author</td>
                    <td>price</td>
                    <td>code</td>
                    <td>pages</td>
                </tr>
            </thead>
            <?php
                foreach($books2 as $b){
                    echo "<tr>";
                    echo '<form method="POST">';
                    foreach($b as $k => $v){
                        if ($k != 'id')
                            echo "<td><input type='text' name='$k' value=$v> </td>";
                    }
                    $id = $b['id'];
                    echo "<td><button name='delete' value=$id> delete </button></td>";
                    echo "<td><button name='save' value=$id>> save changes </button></td>";
                    echo "</form>";
                    ?>
                        
                    </tr>
                <?php }
            ?>
        </table>
    </div>
</body>
</html>