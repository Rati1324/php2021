<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!-- <form action=""> -->
        <input type="text" id="name" name="name" placeholder="name" require>
        <div class="errors" id="name_error">
            
        </div>
        <input type="text" id="author" name="author" placeholder="author">
        <div class="errors" id="author_error">
            
        </div>
        <button name="send" onclick="send()">Send</button>

        <a href="books.php">View and edit rows</a>
    <!-- </form> -->
    <script>    
        function send(){
            var name = $('#name').val();
            var price = $('#page_number').val();
            var author = $('#author').val();
            $.ajax({
                type:'post',
                url: 'validations.php',
                data:{
                    name: name,
                    price: price,
                    author: author,
                },
                success: (data) =>{
                    if (data){
                        console.log(data)
                        var errors = JSON.parse(data);
                        $('#name_error').html(errors['name']);
                        $('#author_error').html(errors['author']);
                    }
                }
            })
    }
    </script>
</body>
</html>