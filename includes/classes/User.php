<?php

class User {
    private $user;
    private $con;

    public function __construct($con, $user){
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$user'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    public function getProfilePic(){
        return $this->user['profile_pic'];
    }

    public function getFirstAndLastName(){
        return $this->user['first_name']." ".$this->user['last_name'];
    }

    public function getUsername(){
        return $this->user['username'];
    }

    public function getNumPosts(){
        return $this->user['num_posts'];
    }

    public function isClosed(){
        return ($this->user['user_closed'] == 'no' ? false : true);
    }

   public function isFriend($username_to_check) {
		$usernameComma = "," . $username_to_check . ",";

		if((strstr($this->user['friend_array'], $usernameComma) || $username_to_check == $this->user['username'])) {
			return true;
		}
		else {
			return false;
		}
	}

}

?>