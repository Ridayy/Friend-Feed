<?php
    ob_start();
    session_start();

    $timezone = date_default_timezone_set("Asia/Karachi");

    $con = mysqli_connect("localhost", "root", "", "friendfeed");

    if(mysqli_connect_errno()){
        echo 'Failed To Connect '.mysqli_connect_errno();
        die();
    }
?>