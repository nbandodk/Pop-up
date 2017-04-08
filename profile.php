<?php 
//require 'config/config.php'; //connect to database 
require 'header.php';
require 'includes/form_handlers/profile_handler.php';   
require 'includes/service/user.php';



	/*	
	if(isset($_POST['update_profile'])){
	header("Location: upload.php");
	exit;
	}*/

?>
  
<!--body-->
<!--
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">

	-->

	<div class="container text-center">    
	  	<div class="row">
	    	<div class="col-sm-3 scrolldiv">
	      		<div class="box" >
					<a href="<?php echo $user['username'].'/'.$user['id']; ?>">
		    		<img src="<?php echo $user['profile_pic'] ?>" class="img-circle" height="65" width="65" style="margin: 10px">
		        	<p><?php echo $user['username'] ?></p>
		        	
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


						<!-- this part can be used when add friend feature is implemeted


					    <div class="col-sm-12 profile_box posting_on_profile">
					    <input type="submit" class="deep_blue" data-toggle ="modal" data-target="#post_form" value="What's on your mind?">
					    </div>
					    
					    -->

					    <div class="col-sm-12 profile_box upload_profile_pic">
						    <form class="profile_post" action="" method="POST">						    
						    <input type="submit" name="update_profile_picture" value="Update Profile Photo" /> 
						    </form>
					    </div>
					    <div class="col-sm-12 profile_box posting_on_profile">
						    <form class="profile_post" action="" method="POST">						    
						    <input type="submit" name="pass_reset" value="Reset Password"/> 
						    </form>
					    </div>
			   		</div>

	  	  		</div>
	      
	    	</div>



	    	<!-- Modal : for posting something-->
	    	<div class="col-sm-7">
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


	      

	   
	    
	 	 </div>
	</div>

	
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