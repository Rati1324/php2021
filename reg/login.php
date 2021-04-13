<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        form{
            width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php include('server.php'); ?>

    <div class="container">
        <div class="row">
            <div class="column">

                <form action="" method="POST" autocomplete="OFF">
                    <?php include('errors.php'); ?>

                    <div class="form-group col-lg-6">
                        <label for="email">Name :</label>
                        <input type="username" class="form-control" name="name">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-default">Submit</button>
                </form> 

            </div>
        </div>

        <div class="row">
            <a href="reg.php">Sign Up</a>
        </div>
    </div>

    <script src = "https://code.jquery.com/jquery.js"></script>
    <script src = "js/bootstrap.min.js"></script>
</body>
</html>