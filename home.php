<?php 
require 'header.php';
require 'includes/form_handlers/home_handler.php';
require 'includes/service/user.php';

?>
  
<!--body-->
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">

	<button id="scrolltop_btn" class="btn btn-danger btn-f" onclick="topFunction()" title="Go to top">Top</button>
	
	<div class="container text-center">    
	  	<div class="row">
	    	<div class="col-sm-3 scrolldiv">
	      		<div class="box">
					<a href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">
			    		<img src="<?php echo $user['profile_pic'] ?>" class="img-rounded" height="100" width="100" style="margin: 15px">
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

		      	<div class="box" style="padding: 15px;">
		      		<p style="color: #EE9611; font-size: 16px; margin-top: 0"><strong>Features</strong></p>
		        	<p>
		          		<span class="label label-default">Post</span>
		          		<span class="label label-primary">Like</span>
		          		<span class="label label-success">Comment</span>
		          		<span class="label label-info">Search</span>
		          		<span class="label label-warning">Chat</span>
		          		<span class="label label-danger">Video</span>
		          		<span class="label label-primary">Photo</span>
		        	</p>
		      	</div>

		      	<div class="box">

				    <a href="https://www.apple.com" class="thumbnail">
				      	<img src="assets/images/Advertisement/Apple-logo.png">
				    </a>
				    <a href="https://www.youtube.com" class="thumbnail">
				      	<img src="assets/images/Advertisement/YouTube-logo-full_color.png" height="60px" width="110px">
				    </a>
				    <a href="https://www.linkedin.com" class="thumbnail">
				      	<img src="assets/images/Advertisement/linkedin-logo.png" height="80px" width="110px">
				    </a>
				    <a href="https://www.google.com" class="thumbnail">
				      	<img src="assets/images/Advertisement/google-logo-vector.png" height="60px" width="110px">
				    </a>
				    <a href="https://www.amazon.com" class="thumbnail">
				      	<img src="assets/images/Advertisement/Amazon-Logo_Feature.jpg" height="60px" width="110px">
				    </a>
		      	</div>
	    	</div>

		    <div class="col-sm-6 col-md-7">
		      	<div class="row">
		        	<div class="col-sm-12">
		        		<ul class="nav nav-pills">
						    <li class="active"><a data-toggle="pill" href="#post_menu">Posts</a></li>
						    <li><a data-toggle="pill" href="#photo_menu">Photos</a></li>
						    <li><a data-toggle="pill" href="#video_menu">Videos</a></li>
						</ul>

						<div class="tab-content">
							<div id="post_menu" class="tab-pane fade in active">
				          		<div class="panel panel-default text-left" style="margin-top: 10px;">
				            		<div class="panel-body">
						            	<form action="includes/form_handlers/post_handler.php" method="POST" enctype="multipart/form-data">
						            		<p class="lead emoji-picker-container">
						            			<textarea class="form-control post_input" rows="3" name="home_post" placeholder="Share your life here..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" data-emojiable="true" data-emoji-input="unicode" style="resize: none" required></textarea>
						            		</p>

					              			<button type="submit" class="btn btn-success btn-f" style="float: right;">
					                 			<i class="icon-ok icon-large"></i> Send
					                		</button>
						            	</form>
				            		</div>
				          		</div>
		        			</div>

		        			<div id="photo_menu" class="tab-pane fade">
				          		<div class="panel panel-default text-left" style="margin-top: 10px;">
				            		<div class="panel-body">
						            	<form action="includes/form_handlers/post_handler.php" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-xs-3 col-sm-3 col-md-2">
									   	 			<input class="btn btn-primary" type="button" id="image" name="find_image" onclick="myImage.click();" value="Browse" style="font-size: 14px; width: 85px">
									   	 		</div>
									   	 		<div class="col-sm-5 col-md-5">
									   	 			<input type="text" class='form-control imgname' id="imgname" style="" disabled="true">
													<input type="file" id="myImage" name="img" onchange="imgname.value=this.value" style="display: none" required>
													<br>
												</div>
											</div>

											<input type="submit" name="post_img" class="btn btn-success" value="Submit" style="font-size: 14px; width: 85px">
						            	</form>
				            		</div>
				          		</div>
		        			</div>

		        			<div id="video_menu" class="tab-pane fade">
				          		<div class="panel panel-default text-left" style="margin-top: 10px;">
				            		<div class="panel-body">
						            	<form id="form1" action="includes/form_handlers/post_handler.php" method="POST" enctype="multipart/form-data">
						            		<input class="form-control" name="home_post" placeholder="Video url..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" style="resize: none" required></textarea>
						            		<br>

					                		<a id="loc_vid" class="local_video" onclick="switch_localVideo();" style="float: left; padding-left: 5px; padding-top: 13px;">
					                			<i class='icon-folder-close-alt icon-large' aria-hidden='true'></i> Local
					            			</a>

					              			<button type="submit" class="btn btn-success btn-f" style="float: right;">
					                 			<i class="icon-ok icon-large"></i> Send
					                		</button>
						            	</form>
						            	<form id="form2" action="includes/form_handlers/post_handler.php" method="POST" enctype="multipart/form-data"; style="display: none;">
											<div class="row">
												<div class="col-xs-3 col-sm-3 col-md-2">
									   	 			<input class="btn btn-primary" type="button" id="file" name="find_file" onclick="myVideo.click();" value="Browse" style="font-size: 14px; width: 85px">
									   	 		</div>
									   	 		<div class="col-sm-5 col-md-5">
									   	 			<input type="text" class='form-control filename' id="filename" style="" disabled="true">
													<input type="file" id="myVideo" name="file" onchange="filename.value=this.value" style="display: none" required>
													<br>
												</div>
											</div>

											<input type="submit" name="post_video" class="btn btn-success" value="Submit" style="font-size: 14px; width: 85px">

											<a id="web_vid" class="web_video" onclick="switch_webVideo();" style="float: right; padding-top: 10px; padding-right: 5px;">
					                			<i class='icon-external-link icon-large' aria-hidden='true'></i> URL
					            			</a>
						            	</form>
				            		</div>
				          		</div>
		        			</div>

	      				</div>
	      			</div>
	      		</div>
	    
		      	<div class="posts_area"></div>
		      	<p id="loadingIcon"><i class="icon-spinner icon-spin icon-large"></i> Loading content...</p>
		    </div>

		    <div class="col-sm-3 col-md-2" style="padding-left: 0; padding-right: 0">
		    	<div class='box friends_list_area'>
		    		<p class="friendlist_title"><i class="icon-group icon-large"></i> &nbspMy friend list</p>
		    		<div class="panel-group friends_list_group">
		    			<div class="panel panel-default friends_list_panel text-left">
				    		<?php
					    		while ($user_friend=mysqli_fetch_array($user_friends)) {
					    			//get the name and img of the friends
									$friend = new user($con, $user_friend['friend_id']);
									echo "
				    					<div class='panel-heading' style='padding-left: 15px; padding-top: 12px; padding-bottom: 12px;'>
				      						<h4 class='panel-title'>
				        						<a data-toggle='collapse' href='#collapse".$friend->getUserid()."'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'> &nbsp".$friend->getUsername()."</a>
				      						</h4>
				    					</div>
					    				<div id='collapse".$friend->getUserid()."' class='panel-collapse collapse'>
					      					<ul class='list-group'>
					        					<li class='list-group-item text-left'><a href='friend_profile.php?friend_id=".$friend->getUserid()."'><i class='icon-eye-open icon-large'></i> &nbspVisit</a></li>
				                            	<li class='list-group-item text-left'><a href='messages.php?u=".$friend->getUserid()."'><i class='icon-comment-alt icon-large'></i> &nbspChat</a></li>
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

		    <div class="col-sm-3 col-md-2" style="padding-left: 0; padding-right: 0">
		    	<div class='box friends_list_area suggest_friends_area'>
		    		<p class="friendlist_title"><i class="icon-group icon-large"></i> &nbspSuggestions</p>
		    		<div class="panel-group friends_list_group">
		    			<div class="panel panel-default friends_list_panel text-left" id="friend_suggestions" >
				    		
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
		function switch_localVideo () {
			$('#form1').slideUp('slow', function() {
				$('#form2').slideDown('slow');
			});
		}
		function switch_webVideo () {
			$('#form2').slideUp('slow', function() {
				$('#form1').slideDown('slow');
			});
		}
	</script>

	<script>
		$(document).ready(function() {
			$('#loadingIcon').show();
			<?php 
				if (isset($_SESSION['Loading_myposts'])) {
					unset($_SESSION['Loading_myposts']);
					unset($_SESSION['Loading_onefriendposts']);
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
				var height = $('.posts_area').height();
 				var scroll_top = $(this).scrollTop();
				var pageNum = $('.posts_area').find('.nextPage').val();
				var noMorePosts = $('.posts_area').find('.noMorePosts').val();
				//if the height of the browser window + scrolled height == total height that can be scorlled
				if((document.body.scrollHeight == (document.documentElement.scrollTop || document.body.scrollTop) + window.innerHeight) && noMorePosts == 'false') {
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
    
    <script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("scrolltop_btn").style.display = "block";
		    } else {
		        document.getElementById("scrolltop_btn").style.display = "none";
		    }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		    document.body.scrollTop = 0;
		    document.documentElement.scrollTop = 0;
		}
	</script>

	<script type="text/javascript">
		// to get friend suggestions

	    suggest_friends();

	    /*function suggest_friends(){
			$.ajax({
				url: "includes/form_handlers/suggesting_friends_handler.php",
	            type: "GET",
	            
	            success : function(data) {
	               $('#friend_suggestions').empty().append(data);
	            }
			});
		}*/

		function suggest_friends(){
			var num_friends = '<?php echo $friendNum; ?>';
			$.ajax({
				url: "includes/form_handlers/suggesting_friends_handler.php",
	            type: "POST",
	            data: {num_friends : num_friends},
	            dataType: 'text',

	             success : function(data) {
	               $('#friend_suggestions').empty().append(data);
	            }

			});
	    }

		
	</script>

</body>
</html>