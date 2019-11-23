<?php

    require 'config/config.php';
    require 'includes/form_handlers/register_handler.php';
    require 'includes/form_handlers/login_handler.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FriendFeed - Register Or Log In!</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>

</head>
<body>
    <?php
     
     if(isset($_POST['register_button'])){
         echo '
           <script>
                 $(document).ready(function() {
                    $("#first").hide();
                    $("#second").show();
                });
           </script>
         ';
     }

    ?>
    <div id="wrapper">
        <div id='login_box'>
            <div id="login_header">
                <h1>Friendfeed!</h1>
                <p><em>Login Or Sign Up Today!</em></p>
            </div>
            <div id="first">
                <form action="register.php" method="POST">
                    <input type="email" name='log_email' placeholder="Email Address"><br>
                    <input type="password" name='log_password' placeholder="Password"><br>
                    <?php put_error('Invalid Email Or Password<br>'); ?>
                    <input type="submit" name="log_button" value="Login">
                    
                    <br>
                    <a href="#" id='signup' class='sign_up'>
                        Need An Account? Register Here
                    </a>
                </form>
            </div>

            <div id="second">
                
            <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder='First Name' value="<?php echo put_value('reg_fname'); ?>" required>
                    <br>
                    <?php put_error("Your first name must be between 3 and 25 characters<br>"); ?>

                    <input type="text" name="reg_lname" placeholder='Last Name' value="<?php echo put_value('reg_lname'); ?>" required>
                    <br>
                    <?php put_error("Your last name must be between 3 and 25 characters<br>"); ?>

                    <input type="email" name="reg_email" placeholder='Email' value="<?php echo put_value('reg_email'); ?>" required>
                    <br>
                    <?php put_error("Email already in use<br>"); ?>
                    <?php put_error("Invalid Format<br>"); ?>

                    <input type="email" name="reg_email2" placeholder='Confirm Email' value="<?php echo put_value('reg_email2'); ?>" required>
                    <br>
                    <?php put_error("Emails Don't Match<br>"); ?>

                    <input type="password" name="reg_password" placeholder='Password' required>
                    <br>
                    <?php put_error("Password can only contain English Characters Or Numbers<br>"); ?>
                    <?php put_error("Your Password must be between 5 and 30 characters<br>"); ?>

                    <input type="password" name="reg_password2" placeholder='Confirm Password' required>
                    <br>
                    <?php put_error("Passwords don't match<br>"); ?>


                    <input type="submit" name="register_button" value="Register" id='reg'>
                    <?php put_error("<span style='color:#14C800'><br>You are all set. You can log in successfully! </span><br>"); ?>
                    <br>
                    <a href="#" id='signin' class='sign_in'>
                        Already Have An Account? Sign In Here
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>