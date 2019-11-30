<?php  require 'config/config.php'; 

    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }else {
        header('Location:register.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FriendFeed</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css" integrity="sha256-NLrvgeXi+02q9aAWcEyFGGJIfa8GXj4gO0K+nIFJaTA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css">
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/emojionearea.js"></script>
    <script src="assets/js/main.js"></script>

</head>
<body>
    <div class="top_bar">
        <div class='logo'>
            <a href="index.php">FriendFeed</a>
        </div>
        <nav>
            <a href="#">
                <i class='fa fa-home fa-lg'>
                </i>
            </a>
            <a href="#">
                <i class='fab fa-facebook-messenger'></i>
            </a>
            <a href="#">
                <i class='fa fa-bell'></i>
            </a>
             <a href="#">
                <i class='fa fa-users'></i>
            </a>
            <a href="#">
                <i class='fa fa-cog'></i>
            </a>
             <a href="includes/handlers/logout.php">
               <i class="fas fa-sign-out-alt"></i>
            </a>
            <a href="<?php echo $userLoggedIn; ?>">
                
                <span class='username'><?php echo $userLoggedIn ?></span>
                <img src="<?php echo $user['profile_pic']; ?>" alt="" width="25" height="25" class='nav_image'>

            </a>
        </nav>
    </div>
    <div class="main_wrapper">
