<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css" >
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="assets/js/emojionearea.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <script src="assets/js/main.js"></script>
</head>
<body>

	<style type="text/css">
	* {
		font-size: 12px;
		font-family: Arial, Helvetica, Sans-serif;
	}

	body {
		padding:5px;
		background:transparent;
	}

	</style>

	<?php  
	require 'config/config.php';
	include("includes/classes/User.php");
	include("includes/classes/Post.php");

	if (isset($_SESSION['username'])) {
		$userLoggedIn = $_SESSION['username'];
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
		$user = mysqli_fetch_array($user_details_query);
	}
	else {
		header("Location: register.php");
	}

	?>
	<script>
		function toggle() {
			var element = document.getElementById("comment_section");

			if(element.style.display == "block") 
				element.style.display = "none";
			else 
				element.style.display = "block";
		}
	</script>

	<?php  
	//Get id of post
	if(isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];
	}

	$user_query = mysqli_query($con, "SELECT added_by, user_to FROM posts WHERE id='$post_id'");
	$row = mysqli_fetch_array($user_query);

	$posted_to = $row['added_by'];

	if(isset($_POST['postComment' . $post_id])) {
		$post_body = $_POST['post_body'];
		$post_body = mysqli_escape_string($con, $post_body);
		$date_time_now = date("Y-m-d H:i:s");
		$insert_post = mysqli_query($con, "INSERT INTO comments VALUES ('', '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");
		echo "<p>Comment Posted! </p>";
	}
	?>
	<form action="comment_frame.php?post_id=<?php echo $post_id; ?>" id="comment_form" name="postComment<?php echo $post_id; ?>" method="POST">
		<textarea name="post_body" placeholder="Write your comment here..." id="comment_area"></textarea>
		<button type="submit" name="postComment<?php echo $post_id; ?>" id="post_comment_btn">
			Comment <i class="fas fa-comments mx-3"></i>
		</button>
		<div class="clr"></div>
	</form>

	<!-- Load comments -->
	<?php  
	$get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id ASC");
	$count = mysqli_num_rows($get_comments);

	if($count != 0) {
       
		while($comment = mysqli_fetch_array($get_comments)) {
            
            $comment_body = $comment['post_body'];
			$posted_to = $comment['posted_to'];
			$posted_by = $comment['posted_by'];
			$date_added = $comment['date_added'];
			$removed = $comment['removed'];

			//Timeframe
			$date_time_now = date("Y-m-d H:i:s");
			$start_date = new DateTime($date_added); //Time of post
			$end_date = new DateTime($date_time_now); //Current time
			$interval = $start_date->diff($end_date); //Difference between dates 
			if($interval->y >= 1) {
				if($interval == 1)
					$time_message = $interval->y . " year ago"; //1 year ago
				else 
					$time_message = $interval->y . " years ago"; //1+ year ago
			}
			else if ($interval->m >= 1) {
				if($interval->d == 0) {
					$days = " ago";
				}
				else if($interval->d == 1) {
					$days = $interval->d . " day ago";
				}
				else {
					$days = $interval->d . " days ago";
				}


				if($interval->m == 1) {
					$time_message = $interval->m . " month". $days;
				}
				else {
					$time_message = $interval->m . " months". $days;
				}

			}
			else if($interval->d >= 1) {
				if($interval->d == 1) {
					$time_message = "Yesterday";
				}
				else {
					$time_message = $interval->d . " days ago";
				}
			}
			else if($interval->h >= 1) {
				if($interval->h == 1) {
					$time_message = $interval->h . " hour ago";
				}
				else {
					$time_message = $interval->h . " hours ago";
				}
			}
			else if($interval->i >= 1) {
				if($interval->i == 1) {
					$time_message = $interval->i . " minute ago";
				}
				else {
					$time_message = $interval->i . " minutes ago";
				}
			}
			else {
				if($interval->s < 30) {
					$time_message = "Just now";
				}
				else {
					$time_message = $interval->s . " seconds ago";
				}
			}

			$user_obj = new User($con, $posted_by);


			?>
			<div class="comment_section">
				  <div id="comment_user_section">
						<img src="<?php echo $user_obj->getProfilePic();?>" title="<?php echo $posted_by; ?>" >
						<div>
							<a href="<?php echo $posted_by?>" target="_parent" id="posted_user"><?php echo $user_obj->getFirstAndLastName(); ?></a><br>
							<span class="time"><?php echo $time_message; ?></span>
						</div>
				  </div>
				  <div class="comment_message">
				  	 <div class="message_options">
					   	<button class="like_button"><i class="far fa-heart"></i></button>
					 </div>
					 <div class="message_contents">
					     <span> <?php echo $comment_body; ?></span>
					 </div>
				  </div>
				
			</div>
			<?php

		}
	}
	else {
		echo "<center><br><br>No Comments to Show!</center>";
	}

	?>


	<script>
		 $("#comment_area").emojioneArea({
		    pickerPosition: "bottom"
		});
	</script>



</body>
</html>