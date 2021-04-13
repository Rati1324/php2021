<?php include('server.php') ?>
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
    <div class="container">
        <div class="row">
            <div class="column">
                <form action="" method="POST" autocomplete="OFF">

                    <?php include ('errors.php') ?>

                    <div class="form-group col-lg-6">
                        <label for="email">Name :</label>
                        <input type="username" class="form-control" name="name" value="<?php echo $name;?>">
                    </div> 
                    <div class="form-group col-lg-6">
                        <label for="email">Email address:</label>
                        <input type="username" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="pwd">Password Confirm:</label>
                        <input type="password" class="form-control" name="pwd_2">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" name="send" class="btn btn-default">Submit</button>
                </form> 
            </div>
        </div>

        <div class="row">
            <a href="login.php">Log In</a>
        </div>
    </div>

    <script src = "https://code.jquery.com/jquery.js"></script>
    <script src = "js/bootstrap.min.js"></script>
</body>
</html>