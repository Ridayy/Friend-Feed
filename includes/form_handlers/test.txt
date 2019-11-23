<?php
    $fname = "";
    $lname = "";
    $em = "";
    $em2 = "";
    $password = "";
    $date = "";
    $error_array = array();

    function all_param_set(){
        $arr = [
            'register_button',
            'reg_fname',
            'reg_lname',
            'reg_email',
            'reg_email2',
            'reg_password',
            'reg_password2'
        ];
        $valid = true;
        foreach ($arr as $a){
            
            if(!isset($_POST[$a]) ){
                $valid = false;
            }
        }
        
        return $valid;
    }
    function put_value($value){
        if(isset($_SESSION[$value])){
            return $_SESSION[$value];
        }else {
            return '';
        }
    }

     function put_error($value){
        global $error_array;

        if(in_array($value, $error_array)){
            echo $value;
        }
    }

    if(isset($_POST['register_button'])){
        if(all_param_set()){

        
            $fname = strip_tags($_POST['reg_fname']);
            $fname = str_replace(' ', '', $fname);
            $fname = ucfirst(strtolower($fname));
            $_SESSION['reg_fname'] = $fname;

            $lname = strip_tags($_POST['reg_lname']);
            $lname = str_replace(' ', '', $lname);
            $lname = ucfirst(strtolower($lname));
            $_SESSION['reg_lname'] = $lname;

            $em = strip_tags($_POST['reg_email']);
            $em = str_replace(' ', '', $em);
            $_SESSION['reg_email'] = $em;

            $em2 = strip_tags($_POST['reg_email2']);
            $em2 = str_replace(' ', '', $em2);
            $_SESSION['reg_email2'] = $em2;

            $password = strip_tags($_POST['reg_password']);
            $password2 = strip_tags($_POST['reg_password2']);

            $date = date("Y-m-d");

            if($em == $em2){
                if(filter_var($em, FILTER_VALIDATE_EMAIL)){
                    $em = filter_var($em, FILTER_VALIDATE_EMAIL);

                    $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");

                    if(mysqli_num_rows($e_check) > 0){
                        array_push($error_array, 'Email already in use<br>');
                    }

                }else {
                    array_push($error_array,'Invalid Format<br>');
                }
            }else {
                array_push($error_array,"Emails Don't Match<br>");
            }

            if(strlen($fname) > 25 || strlen($fname) < 3){
                array_push($error_array,"Your first name must be between 3 and 25 characters<br>");
            }

            if(strlen($lname) > 25 || strlen($lname) < 3){
                array_push($error_array,"Your last name must be between 3 and 25 characters<br>");
            }

            if($password != $password2){
                array_push($error_array,"Passwords don't match<br>");
            }else if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($error_array,"Password can only contain English Characters Or Numbers<br>");
            }else if(strlen($password) > 30 || strlen($password) < 5){
                array_push($error_array,"Your Password must be between 5 and 30 characters<br>");
            }

            if(empty($error_array)){
                $password = md5($password);

                $username = strtolower($fname."_".$lname);
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username' ");

                $i = 0;
                $user = $username;

                while(mysqli_num_rows($check_username_query)  != 0){
                    $i++;
                    $user = $username.$i;
                    $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$user' ");
                }

                $rand = rand(1,10);
                $profile_pic = "assets/images/profile_pics/defaults/image_".$rand.".png";
                

                $insert_query = mysqli_query($con, "INSERT INTO users VALUES('', '$fname', '$lname', '$user', '$em', '$password', '$date', '$profile_pic', 0,0,'no', ',')");

                array_push($error_array, "<span style='color:#14C800'><br>You are all set. You can log in successfully! </span><br>");

                $_SESSION['reg_fname'] = "";
                $_SESSION['reg_lname'] = "";
                $_SESSION['reg_email'] = "";
                $_SESSION['reg_email2'] = "";

            }

        }
    }
?>