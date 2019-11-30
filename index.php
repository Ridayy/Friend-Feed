<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}


 ?>
	<div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
			</a>
			<br>
			<?php echo "Posts: " . $user['num_posts']. "<br>"; 
			echo "Likes: " . $user['num_likes'];

			?>
		</div>

	</div>

	<div class='posts_container'>
      <div class='main_column column mx-2'>
        <form action="index.php" class='post_form' method='POST'>
                <div>
                    Hidden Mode: <input type="checkbox" name="mode" value='hidden'>
                    <textarea name="post_text" id="post_text" placeholder='Got Something To Say?' class='form-control mt-2' rows='3'></textarea>
                </div>
                <div class='icons_area'>
                    <div class="upload_icons">
                        <div class="image-upload">
                            <label for="imageInput"> 
                                <i class="fas fa-camera icon"></i>
                            </label>
                            <input id="imageInput" type="file">
                        </div>
                        <div class="video-upload">
                        <label for="videoInput"> 
                            <i class="fas fa-video icon"></i>
                            </label>
                            <input id="videoInput" type="file">
                        </div>
                        
                    </div>
                    <button type="submit" class='btn btn-main my-2' name="post">
                        Post
                        <i class="fas fa-share-square"></i>
                    </button>
                </div>
            </form>
            <hr>
        </div>
        <div class='posts_area'></div>
        <img src="assets/images/loading.gif" alt="loading..." id="loading">

    </div>

	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if (($(window).scrollTop() + $(window).height() > $(document).height() - 100) && noMorePosts == 'false') {
                $(window).unbind('scroll');
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())


	});

	</script>




	</div>
</body>
</html>