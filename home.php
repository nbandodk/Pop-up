<?php 
require 'config/config.php'; //connect to database 
require 'includes/form_handlers/home_handler.php';
require 'includes/service/user.php';
include("includes/header.php");
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
		        	<p>My Posts (<?php echo $postNum ?>)</p>
		        	<p>My friends (<?php echo $friendNum ?>)</p>
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
	    		<div class='well friends_list_area'>
		    		<?php 
		    		while ($user_friend=mysqli_fetch_array($user_friends)) {
		    			//get the name and img of the friends
						$friend = new user($con, $user_friend['friend_id']);
						echo "
						<a href='#'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'>
							<i>".$friend->getUsername()."</i>
						</a>
						<br>
						<br>
						";
		    		}
		    		?>
	    		</div>
	    	</div>
	  	</div>
	</div>

	<footer class="container-fluid text-center">
	  	<p>Footer Text</p>
	</footer>

 	<script type="text/javascript">
	    var timer;
	    $(function(){
	        $(window).scroll(function(){
	            clearInterval(timer);
	            var topScroll=getScroll();
	            var topDiv="0px";
	            var top=topScroll+parseInt(topDiv);
	            timer=setInterval(function(){
	            	//$(".test").css("top", top+"px");
	            	$(".scrolldiv").animate({"top":top}, 0);
	            }, 0)
	        })
	    })

	    function getScroll(){
	            var bodyTop = 0;  
	            if (typeof window.pageYOffset != 'undefined') {
	             	bodyTop = window.pageYOffset;
	            } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {  
	                bodyTop = document.documentElement.scrollTop;  
	            }  
	            else if (typeof document.body != 'undefined') {  
	                bodyTop = document.body.scrollTop;  
	            }

	            return bodyTop
	    }
    </script>

	<script>
		$(document).ready(function() {

			$('#loadingIcon').show();
			<?php $_SESSION['Loading'] = 'true' ?>
			// ajax request for loading posts 
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

			// do it if scroll up or down
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