<div>
    <?php
        $query = "SELECT title FROM post";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
          } else {
            echo "0 results";
        }
    ?>
</div>