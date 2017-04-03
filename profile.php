<?php 
require 'header.php';
require 'includes/form_handlers/profile_handler.php';   
require 'includes/service/user.php';
?>
  
<!--body-->
<!--
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">
	-->

	<div class="container text-center">
		<div class="row">
			<div class="col-sm-12">
				<div class="profile_cover">
					<div class="col-sm-6 myprofile_box">
						<div class="col-xs-12 col-sm-6 col-md-4 img-rounded left_area">
							<img class="img-rounded user_photo" src="<?php echo $user['profile_pic'] ?>" height="150" width="150">
				        </div>
				        <div class="col-xs-12 col-sm-6 col-md-4 right_area">
						<a class="user_name" href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">	
				    		<p><?php echo $user['username'] ?></p>
				        </a>
				        </div>
			        </div>
			    </div>
			</div>
		</div>    
	  	<div class="row">
	    	<div class="col-sm-5">
	      		<div class="box">
					<p class="text-left profile_title"><i class="icon-globe icon-large"></i> Intro: </p>
					<hr style="height: 1px; border: none; background-color: #7f8c8d">
					<form action="" class="form-horizontal text-left pro_form">
                        <div class="form-group">
                            <label for="my_fname" class="col-sm-3 control-label" style="text-align:left">First name:</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control pro_input" id="pro_fname" value="<?php echo $user['first_name'] ?>" disabled="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="my_lname" class="col-sm-3 control-label" style="text-align:left">Last name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control pro_input" id="pro_lname" value="<?php echo $user['last_name'] ?>" disabled="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="my_email" class="col-sm-3 control-label" style="text-align:left">My email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control pro_input" id="pro_email" value="<?php echo $user['email'] ?>" disabled="true">
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-offset-1 col-sm-3">
                                <button class="btn btn-default pro_btn" type="submit">Cancel</button>
                            </div>
                            <div class="col-sm-offset-4 col-sm-3">
                                <button class="btn btn-default pro_btn" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                    
			   		<div class="row">
						<div class="col-sm-6 profile_box">
							<p class="post_area_p profile_p_title">My Posts</p>
							<p class="post_area_p profile_p_count"><?php echo $postNum ?></p>
				    	</div>

					    <div class="col-sm-6 profile_box">
					    	<p class="post_area_p profile_p_title">My Friends</p>
							<p class="post_area_p profile_p_count"><?php echo $friendNum ?></p>
					    </div>

					    <div class="col-sm-12 profile_box upload_profile_pic">
						    <a href="upload.php">						    
						    <button type="button" class="btn btn-primary btn-lg">
							<span class="glyphicon glyphicon-picture"> Photo Upload</span> 
							</button>

						    </a>
					    </div>

					    <div class="col-sm-12 profile_box posting_on_profile">	
					    	
              				<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pwdModal">
							<span class="glyphicon glyphicon-refresh"> Password Reset</span> 
							</button>

					    </div>
			   			
			   			<!-- pwdModal -->
			   			<div class="modal fade" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Change your password</h4>
						      </div>
						      <div class="modal-body">
						        <form class="pwdReset"method="POST">

						        <input type="password" name="reset_password" placeholder="New password...">

						        </form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary" id="pwdResetSumbit">Confirm</button>
						      </div>
						    </div>
						  </div>
						</div>

			   		</div>

	  	  		</div>
	    	</div>

	    	<!-- Modal : for posting something-->
	    	<div class="col-sm-7">
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
		  		<img id="loadingIcon" src="assets/images/icons/loading.gif">
	    	</div>

	    	<!-- <div class="col-sm-2">
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
	    	</div> -->
	    </div>
	</div>

	
	<script>
		$(document).ready(function() {
			$('#loadingIcon').show();
			<?php 
				if (isset($_SESSION['Loading'])) {
					unset($_SESSION['Loading']);
				}
				$_SESSION['Loading_myposts'] = 'true'; 
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
			

			//for password reset
			$('#pwdResetSumbit').click(function(){
				$.ajax({
					url: "includes/form_handlers/pass_handler.php",
					type: "POST",
					data: $("form.pwdReset").serialize(),
					cache: false,
					success: function(returnedData) {
						$('#pwdModal').modal('hide');
						//reload the profile page
						alert("Password reset successfully");
						location.reload();
						return false;
					}
				});
				
			});
			
		});
	</script>
</body>
</html>