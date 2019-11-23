<?php
    if(isset($_POST['log_button'])){
        $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
        $_SESSION['log_email'] = $email;
        $password = md5($_POST['log_password']);

        $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        if(mysqli_num_rows($check_database_query) == 1){
            $row = mysqli_fetch_array($check_database_query);
            $username = $row['username'];

            if($row['user_closed'] === 'yes'){
                $account_closed_query = mysqli_query($con, "UPDATE users SET user_closed = 'no' WHERE email = '$email'");
            }
            // session_destroy();
            $_SESSION['username'] = $username;
            echo 'Success';
            header('Location:index.php');
            exit();
        }else {
            array_push($error_array, 'Invalid Email Or Password<br>');
        }
    }
?>