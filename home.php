<?php 
require 'config/config.php'; //connect to database 
require 'includes/form_handlers/home_handler.php';
require 'includes/service/user.php';
require 'header.php';
?>
  
<!--body-->
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 scrolldiv">
	      <div class="box" >
				<a href="<?php echo $user['username'].'/'.$user['id']; ?>">
		    		<img src="<?php echo $user['profile_pic'] ?>" class="img-circle" height="65" width="65" style="margin: 10px">
		        	<p>User ID: <?php echo $user['username'] ?></p>
		        </a>

			   	<div class="row">
					<div class="col-sm-6 profile_box">
						<p class="post_area_p profile_p_title">My Posts</p>
						<p class="post_area_p profile_p_count"><?php echo $postNum ?></p>
				    </div>

				    <div class="col-sm-6 profile_box">
				    	<p class="post_area_p profile_p_title">My Friends</p>
						<p class="post_area_p profile_p_count"><?php echo $friendNum ?></p>
				    </div>
			   	</div>
	  	  </div>

	      <div class="box">
	        <p>
	          <span class="label label-default">News</span>
	          <span class="label label-primary">W3Schools</span>
	          <span class="label label-success">Labels</span>
	          <span class="label label-info">Football</span>
	          <span class="label label-warning">Gaming</span>
	          <span class="label label-danger">Friends</span>
	        </p>
	      </div>

	      <div class="box">
	      		<div class="alert alert-success fade in">
		        	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		        	<p><strong>Hi there!</strong></p>
		        	These people share the similar interesting with you, let make friend with them.
	      		</div>
	      		<p><a href="#">Link</a></p>
	      		<p><a href="#">Link</a></p>
	      		<p><a href="#">Link</a></p>
	      </div>
	    </div>

	    <div class="col-sm-7">
	    
	      <div class="row">
	        <div class="col-sm-12">
	          <div class="panel panel-default text-left">
	            <div class="panel-body">
	            	<form action="includes/form_handlers/post_handler.php" method="POST">
	            	   <textarea class="form-control" rows="3" name="home_post" placeholder="Share your life here..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" style="resize: none" required></textarea>
        	  			<br>
              			<button type="submit" class="btn btn-success btn-f">
                			<span class="glyphicon glyphicon-ok"></span> Send
              			</button>
	            	</form>
	            </div>
	          </div>
	        </div>
	      </div>
	    
	      <div class="posts_area"></div>
		  <img id="loadingIcon" src="assets/images/icons/loading.gif">
	    </div>

	    <div class="col-sm-2">
	    	<div class='box friends_list_area'>
	    		<p>My friend list</p>
	    		<div class="panel-group friends_list_group">
	    			<div class="panel panel-default friends_list_panel text-left">

			    		<?php
			    		while ($user_friend=mysqli_fetch_array($user_friends)) {
			    			//get the name and img of the friends
							$friend = new user($con, $user_friend['friend_id']);
							echo "
		    					<div class='panel-heading' style='padding: 15px;'>
		      						<h4 class='panel-title'>
		        						<a data-toggle='collapse' href='#collapse".$friend->getUserid()."'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'><i> ".$friend->getUsername()."</i></a>
		      						</h4>
		    					</div>
			    				<div id='collapse".$friend->getUserid()."' class='panel-collapse collapse'>
			      					<ul class='list-group'>
			        					<li class='list-group-item text-left'><a href='#'><span class='glyphicon glyphicon-cog'></span> View profile</a></li>
		                            	<li class='list-group-item text-left'><a href='#'><span class='glyphicon glyphicon-cog'></span> Message</a></li>
			      					</ul>
			    				</div>
			    				
			    				<hr style='margin:0; border-top:1px solid #ddd'>
							";
			    		}
			    		?>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>

	<script>
		$(document).ready(function() {

			$('#loadingIcon').show();
			<?php $_SESSION['Loading'] = 'true' ?>
			//ajax request for loading posts 
			$.ajax({
				url: "includes/form_handlers/post_handler.php",
				type: "POST",
				data: "page=1",
				cache: false,

				success: function(returnedData) {
					$('#loadingIcon').hide();
					//add returned date to the post area
					$('.posts_area').html(returnedData);
					return false;
				}
			});

			//do it if scroll up or down
			$(window).scroll(function() {
				var pageNum = $('.posts_area').find('.nextPage').val();
				var noMorePosts = $('.posts_area').find('.noMorePosts').val();
				//if the height of the browser window + scrolled height == total height that can be scorlled
				if((document.documentElement.scrollHeight == document.documentElement.scrollTop + window.innerHeight) && noMorePosts == 'false') {
					//start ajax request again
					$('#loadingIcon').show();
					$('.posts_area').find('.nextPage').remove(); //Removes current input
					$('.posts_area').find('.noMorePosts').remove(); //Removes hidden input
					//do ajax request
					var ajaxReq = $.ajax({
						url: "includes/form_handlers/post_handler.php",
						type: "POST",
						data: "page="+pageNum,
						cache: false,

						success: function(returnedData) {
							$('#loadingIcon').hide();
							$('.posts_area').append(returnedData);
						}
					});
				}

				return false;

			}); //End (window).scroll(function())

			
		});
	</script>
</body>
</html>