<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/login.css">
    <link rel="stylesheet" href="../static/layout.css">
</head>
<?php
    // if (isset($_POST['submit'])) {
    //     $email = $_POST['email'];
    //     $pw = $_POST['password'];
    //     $pw_confirm = $_POST['password_confirm'];
    //     $dob = $_POST['dob'];
    //     $f_name = $_POST['f_name'];
    //     $l_name = $_POST['l_name'];
    //     $phone = $_POST['phone'];


    // }
?>

<body>
    <div class="outer_container">

        <div class="header_and_content">
            <?php include('./partials/logged_out_header.php') ?>  
            
            <div class="content">
                <div class="info">
                    <h3>Log in</h3>
                    <form autocomplete="off">
                        <ul>
                            <li>
                                <label for="email">E-mail:</label><br>
                                <input type="text" id="email" name="email" >
                                <div class="errors" id="email_errors">

                                </div>    
                            </li>
                                
                            <li>
                                <label for="password">Password:</label><br>
                                <input type="password" id="password" name="password"  >
                                <div class="pw_strength" id="pw_strength">
                                    <span class="strength_text" id="strength_text">Password Strength: </span>
                                    <span id="strength" class="strength"></span>
                                </div>
                            </li>

                            <li>
                                <label for="password_confirm">Confirm Password:</label><br>
                                <input type="password" id="password_confirm" name="password_confirm" >
                                <div class="errors" id="pw_errors">

                                </div>
                            </li>
                                
                            <li>
                                <label for="dob">Date of Birth:</label><br>
                                <input type="date" id="dob" name="dob">
                            </li>

                            <li class="name_input">
                                <label>Name:</label><br>
                                <input type="text" id="f_name" placeholder="First" name="f_name" >
                                <input type="text" id="l_name" placeholder="Last" name="l_name" >
                            </li>

                            <li>
                                <label for="phone">Phone:</label><br>
                                <input type="text" id="phone" name="phone" >
                                <div class="errors" id="phone_errors">

                                </div>
                                
                            </li>

                            <li style="display:flex;flex-direction: column;">
                                <button name="submit">Submit</button>
                            </li>
                        </ul>
                    </form>
                        <div class="errors_wrapper">
                            <p class="errors"></p>
                        </div>
                </div>
            </div>
                
        </div>
    </div>
    <?php include('./partials/footer.php')?>

    <script src="../static/validation.js">
        
    </script>
    <script>
        var email_input = document.querySelector("#email");
        var pw_input = document.querySelector("#password");
        var pw_confirm_input = document.querySelector("#password_confirm");
        var phone_input = document.querySelector("#phone");
        
        email_input.addEventListener('keyup', () => valid_email(email_input.value));
        pw_input.addEventListener('keyup', () => valid_pw(pw_input.value, pw_confirm_input.value));
        pw_confirm_input.addEventListener('keyup', () => valid_pw(pw_input.value, pw_confirm_input.value));
        phone_input.addEventListener('keyup', () => valid_phone(phone_input.value));
    </script>
</body>
</html>