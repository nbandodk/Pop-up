<?php 
require 'header.php';
require 'includes/form_handlers/home_handler.php';
require 'includes/service/user.php';
?>
  
<!--body-->
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">
	
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 scrolldiv">
	      <div class="box">
				<a href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">
		    		<img src="<?php echo $user['profile_pic'] ?>" class="img-rounded" height="70" width="70" style="margin: 15px">
		        	<p style="font-size:18px;"><?php echo $user['username'] ?></p>
		        </a>

			   	<div class="row" >
					<div class="col-xs-6 col-sm-6 col-md-6 profile_box" id="postNum">
						<p class="post_area_p profile_p_title">My Posts</p>
						<p class="post_area_p profile_p_count"><?php echo $postNum ?></p>
				    </div>

				    <div class="col-xs-6 col-sm-6 col-md-6 profile_box">
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

	    <div class="col-sm-6 col-md-7">

	      <div class="row">
	        <div class="col-sm-12">
	          <div class="panel panel-default text-left">
	            <div class="panel-body">
	            	<form action="includes/form_handlers/post_handler.php" method="POST">
	            		<p class="lead emoji-picker-container">
	            			<textarea class="form-control post_input" rows="3" name="home_post" placeholder="Share your life here..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" data-emojiable="true" data-emoji-input="unicode" style="resize: none" required></textarea>
	            		</p>
              			<button type="submit" class="btn btn-success btn-f" style="float:right;">
                			<span class="glyphicon glyphicon-ok"></span> Send
              			</button>
	            	</form>
	            </div>
	          </div>
	        </div>
	      </div>
	    
	      <div class="posts_area"></div>
	      <p id="loadingIcon"><i class="icon-spinner icon-spin icon-large"></i> Loading content...</p>
		  <!-- <img id="loadingIcon" src="assets/images/icons/loading.gif"> -->
	    </div>

	    <div class="col-sm-3 col-md-2" style="padding-left: 0; padding-right: 0">
	    	<div class='box friends_list_area'>
	    		<p class="friendlist_title"><i class="icon-group icon-large"></i> My friend list</p>
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
			        					<li class='list-group-item text-left'><a href='#'><i class='icon-eye-open'></i> View profile</a></li>
		                            	<li class='list-group-item text-left'><a href='#'><i class='icon-comment-alt'></i> Chat</a></li>
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
			<?php 
				if (isset($_SESSION['Loading_myposts'])) {
					unset($_SESSION['Loading_myposts']);
				}
				$_SESSION['Loading'] = 'true';
			?>
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

	<script>
		$(function() {
		// Initializes and creates emoji set from sprite sheet
		window.emojiPicker = new EmojiPicker({
		  emojiable_selector: '[data-emojiable=true]',
		  assetsPath: 'assets/emoji_lib/img/',
		  popupButtonClasses: 'icon-smile'
		});
		// Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
		// You may want to delay this step if you have dynamically created input fields that appear later in the loading process
		// It can be called as many times as necessary; previously converted input fields will not be converted again
		window.emojiPicker.discover();
		});
    </script>

    <script>
		// Google Analytics
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-49610253-3', 'auto');
		ga('send', 'pageview');
    </script>

</body>
</html>