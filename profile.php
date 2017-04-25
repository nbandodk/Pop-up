<?php 
require 'header.php';
require 'includes/form_handlers/profile_handler.php';   
require 'includes/service/user.php';
?>
  
<!--body-->

	<!--very important! -->
  	<input type="hidden" value="<?php echo $user['username'] ?>">
	<input type="hidden" value="<?php echo $user['id'] ?>">
	<input type="hidden" value="<?php echo $user['profile_pic'] ?>">

	<div class="container text-center">
		<div class="row">
			<div class="col-sm-12">
				<div id= "theme" class="profile_cover" style="background-image: url(<?php if(empty($user2['background_pic'])) echo "assets/images/themes/default_th.jpg"; else echo $user2['background_pic'] ?>);">
				<a href="#" style="float: right; margin-right: 5px;" data-toggle="modal" data-target="#themeModal">Feel boring? See what we have.</a>
					<div class="col-sm-6 myprofile_box">
						<div class="col-xs-12 col-sm-6 col-md-4 left_area">
							<img class="img-rounded user_photo" src="<?php echo $user['profile_pic'] ?>" height="150" width="150">
							<div class="middle">
								<a href="upload.php" class="icon-camera-retro upload_pic"></a>
							</div>
				        </div>

				        <div class="col-xs-12 col-sm-6 col-md-4 right_area">
							<a class="user_name" href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">	
					    		<p class="user_name_p"><?php echo $user['username'] ?></p>
					        </a>
					        <p class="user_state_p">Posts: <?php echo $postNum ?> &#8226  Friends: <?php echo $friendNum ?></p>
				        </div>
			        </div>
			    </div>
			</div>
		</div> 
		   
	  	<div class="row" style="margin-top: 5px;">
	    	<div class="col-sm-5">
	    		<ul class="nav nav-pills">
				    <li class="active"><a data-toggle="pill" href="#about_menu">About</a></li>
				    <li><a data-toggle="pill" href="#setting_menu">Settings</a></li>
				</ul>

				<div class="tab-content">
					<div id="about_menu" class="tab-pane fade in active">
			      		<div id="pro_box" class="box" style="padding-left: 25px; padding-right: 25px; margin-top: 10px;">
							<p class="text-left profile_title"><i class="icon-list-alt icon-large"></i> &nbspMy Profile</p>
							<hr style="height: 1px; border: none; background-color: #7f8c8d; margin-top: 5px;">
							
							<form action="includes/form_handlers/profile_savepro_handler.php" class="form-horizontal text-left pro_form" method="post">
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_fname" class="col-sm-4 control-label" style="text-align: left">First name:</label>
		                            <div class="col-sm-8">
		                            	<input type="text" class="form-control pro_input" name='profname' id="pro_fname" value="<?php echo $user['first_name'] ?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_lname" class="col-sm-4 control-label" style="text-align: left">Last name:</label>
		                            <div class="col-sm-8">
		                                <input type="text" class="form-control pro_input" 
		                                name='prolname'id="pro_lname" value="<?php echo $user['last_name'] ?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_email" class="col-sm-4 control-label" style="text-align: left">Email:</label>
		                            <div class="col-sm-8">
		                                <input type="email" class="form-control pro_input" name='proemail'id="pro_email" value="<?php echo $user['email'] ?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_age" class="col-sm-4 control-label" style="text-align: left">Age:</label>
		                            <div class="col-sm-8">
		                                <input type="number" class="form-control pro_input" name='proage' id="pro_age" value="<?php echo $user2['age']?>" min=0 max=200 disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_gender" class="col-sm-4 control-label" style="text-align: left">Gender:</label>
		                            <div class="col-sm-8" style="padding-left: 0; margin-top: 5px;">
		                            	<label class="checkbox-inline">
											<input type="radio" name="progender" id="pro_gender1" value="male" <?php if($user2['gender']=='male'){ echo 'checked'; }  ?> disabled="true"> Male
										</label>
										<label class="checkbox-inline">
											<input type="radio" name="progender" id="pro_gender2"  value="female" <?php if($user2['gender']=='female'){ echo 'checked'; }  ?> disabled="true"> Female
										</label>
		                            </div>
		                        </div>

		                        <div id="pro_op1" class="form-group options1" style="display: block;">
		                            <div class="col-sm-offset-9 col-sm-3 text-right">
		                            	<a id="edit_pro" class="edit_profile" onclick="edit_pro();">
							                <i class='icon-edit icon-large' aria-hidden='true'></i> Edit
							            </a>
		                            </div>
		                        </div>

		                        <div id="pro_op2" class="form-group options2" style="display: none;">
		                        	<div class="col-xs-3 col-sm-3 text-left">
		                            	<a id="cancel_pro" class="edit_profile" onclick="cancel_pro();">
							                <i class='icon-undo icon-large' aria-hidden='true'></i> Cancel
							            </a>
		                            </div>
		                            <div class="col-xs-3 col-xs-offset-6 col-sm-offset-6 col-sm-3 text-right">
		                            	<a id="save_pro" class="edit_profile">
							                <i class='icon-save icon-large' aria-hidden='true'></i><input class="pro_save" type="submit" value="Save">
							            </a>
		                            </div>
		                        </div>
		                    </form>
		                </div>

		                <div id="show_loc">
		                	<a onclick="show_all();" style="font-size: 16px"><i class="icon-angle-down icon-large"></i> See More</a>
						</div>

		                <div id="loc_box" class="box" style="margin-top: 10px; padding-left: 25px; padding-right: 25px; display: none;">
							<p class="text-left location_title"><i class="icon-globe icon-large"></i> &nbspLocation</p>
							<hr style="height: 1px; border: none; background-color: #7f8c8d; margin-top: 5px;">
							
							<form action="includes/form_handlers/profile_saveloc_handler.php" class="form-horizontal text-left loc_form" method="post">
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_street" class="col-sm-3 control-label" style="text-align: left">Street:</label>
		                            <div class="col-sm-9">
		                                <input type="text" class="form-control pro_input" name='locstreet' id="loc_street" value="<?php echo $user2['street']?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_city" class="col-sm-3 control-label" style="text-align: left">City:</label>
		                            <div class="col-sm-9">
		                                <input type="text" class="form-control pro_input" name='loccity' id="loc_city" value="<?php echo $user2['city']?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_state" class="col-sm-3 control-label" style="text-align: left">State:</label>
		                            <div class="col-sm-9">
		                                <input type="text" class="form-control pro_input" 
		                                name='locstate'id="loc_state" value="<?php echo $user2['province']?>" disabled="true">
		                            </div>
		                        </div>
		                        <div class="form-group" style="margin-bottom: 5px;">
		                            <label for="my_country" class="col-sm-3 control-label" style="text-align: left">Country:</label>
		                            <div class="col-sm-9">
		                                <input type="text" class="form-control pro_input" name='loccountry' id="loc_country" value="<?php echo $user2['country']?>" disabled="true">
		                            </div>
		                        </div>
		                        <div id="loc_op1" class="form-group options1" style="display: block;">
		                            <div class="col-sm-offset-9 col-sm-3 text-right">
		                            	<a id="edit_loc" class="edit_profile" onclick="edit_loc();">
							                <i class='icon-edit icon-large' aria-hidden='true'></i> Edit
							            </a>
		                            </div>
		                        </div>

		                        <div id="loc_op2" class="form-group options2" style="display: none;">
		                        	<div class="col-xs-3 col-sm-3 text-left">
		                            	<a id="cancel_loc" class="edit_profile" onclick="cancel_loc();">
							                <i class='icon-undo icon-large' aria-hidden='true'></i> Cancel
							            </a>
		                            </div>
		                            <div class="col-xs-3 col-xs-offset-6 col-sm-offset-6 col-sm-3 text-right">
		                            	<a id="save_loc" class="edit_profile">
							                <i class='icon-save icon-large' aria-hidden='true'></i><input class="pro_save" type="submit" value="Save">
							            </a>
		                            </div>
		                        </div>
		                    </form>
		                </div>

		                <div id="hide_loc" style="display: none;">
		                	<a onclick="hide_all();" style="font-size: 16px"><i class="icon-angle-up icon-large"></i> Hide</a>
						</div>
					</div>

					<div id="setting_menu" class="tab-pane fade">
						<div class="col-sm-12 text-left" style="margin-top: 10px;">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pwdModal">
								<i class="icon-refresh"></i> Password Reset
							</button>
						</div>
					</div>
				</div>
                    
		   		<div class="row">
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

										<input type="password" name="reset_password" class="form-control" placeholder="New password...">

									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-primary" id="pwdResetSumbit">Confirm</button>
								</div>
							</div>
						</div>
					</div>

					<!-- themeModal -->
		   			<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" style="width: 60%;" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Change your theme</h4>
								</div>
								<div class="modal-body">
									<div class="box">
										<form class="themeChange" method="POST">
					                        <div class="row">
					                            <div class="col-md-4 col-xs-6">
					                                <div class="thumbnail" id="th1" onclick="select_theme(1)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th1.jpg" alt="..." data-dismiss="modal">
					                                    <div class="caption">
					                                        <h4>Technology Cube</h4>
					                                        <p></p>
	                                					</div>
					                                </div>

					                            </div>
					                            <div class="col-md-4 col-xs-6">
					                                <div class="thumbnail" id="th2" onclick="select_theme(2)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th2.jpg" alt="...">
					                                    <div class="caption">
					                                        <h4>Mountains</h4>
					                                        <p></p>
	                                					</div>
					                                </div>
					                            </div>
					                            <div class="col-md-4 col-xs-6">
					                                <div class="thumbnail" id="th3" onclick="select_theme(3)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th3.jpg" alt="...">
					                                    <div class="caption">
					                                        <h4>Lavender Garden</h4>
					                                        <p></p>
	                                					</div>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="row">
					                        	<div class="col-md-4 col-xs-6">
						                            <div class="thumbnail" id="th4" onclick="select_theme(4)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th4.jpg" alt="...">
					                                    <div class="caption">
					                                        <h4>The corner of the world</h4>
					                                        <p></p>
	                                					</div>
						                            </div>
						                        </div>
						                        <div class="col-md-4 col-xs-6">
						                            <div class="thumbnail" id="th5" onclick="select_theme(5)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th5.jpg" alt="...">
					                                    <div class="caption">
					                                        <h4>Forest Spring</h4>
					                                        <p></p>
	                                					</div>
						                            </div>
						                        </div>
						                        <div class="col-md-4 col-xs-6">
						                            <div class="thumbnail" id="th6" onclick="select_theme(6)" style="width: 100%; height: 220px;">
					                                    <img class="img-responsive" src="assets/images/themes/th6.jpg" alt="...">
					                                    <div class="caption">
					                                        <h4>Distant Neighborhood</h4>
					                                        <p></p>
	                                					</div>
						                            </div>
						                        </div>
					                        </div>

				                        </form>

				                    </div>
								</div>
								
							</div>
						</div>
					</div>

			   	</div>
	    	</div>

	    	<!-- for posting something -->
	    	<div class="col-sm-7">
		  		<div class="row">
					<div class="col-sm-12">
						<ul class="nav nav-pills">
						    <li class="active"><a data-toggle="pill" href="#pro_post_menu">Posts</a></li>
						    <li><a data-toggle="pill" href="#pro_photo_menu">Photos</a></li>
						    <li><a data-toggle="pill" href="#pro_video_menu">Videos</a></li>
						</ul>

						<div class="tab-content">
							<div id="pro_post_menu" class="tab-pane fade in active" style="margin-top: 10px;">
								<div class="panel panel-default text-left">
								    <div class="panel-body">
								    	<form action="includes/form_handlers/post_handler.php" method="POST">
								    		<p class="lead emoji-picker-container">
								    			<textarea class="form-control post_input" rows="3" name="profile_post" placeholder="Share your life here..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" data-emojiable="true" data-emoji-input="unicode" style="resize: none" required></textarea>
								    		</p>
								  			<button type="submit" class="btn btn-success btn-f" style="float:right;">
								    			<i class="icon-ok icon-large"></i> Send
								  			</button>
								    	</form>
								    </div>
								</div>
							</div>

							<div id="pro_photo_menu" class="tab-pane fade">
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

											<input type="submit" name="pro_post_img" class="btn btn-success" value="Submit" style="font-size: 14px; width: 85px">
						            	</form>
				            		</div>
				          		</div>
							</div>

							<div id="pro_video_menu" class="tab-pane fade">
								<div class="panel panel-default text-left" style="margin-top: 10px;">
				            		<div class="panel-body">
						            	<form id="form1" action="includes/form_handlers/post_handler.php" method="POST" enctype="multipart/form-data">
						            		<input class="form-control" name="profile_post" placeholder="Video url..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" style="resize: none" required></textarea>
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

											<input type="submit" name="pro_post_video" class="btn btn-success" value="Submit" style="font-size: 14px; width: 85px">

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
		function edit_pro () {
			var fname = document.getElementById("pro_fname");
			var lname = document.getElementById("pro_lname");
			var email = document.getElementById("pro_email");
			var age = document.getElementById("pro_age");
			var gender1 = document.getElementById("pro_gender1");
			var gender2 = document.getElementById("pro_gender2");

			var edit = document.getElementById("op1");
			var save = document.getElementById("op2");

			fname.disabled = false;
			lname.disabled = false;
			email.disabled = false;
			age.disabled = false;
			gender1.disabled = false;
			gender2.disabled = false;

			$('#pro_op1').slideUp('slow', function() {
				$('#pro_op2').slideDown('slow');
			});
		}
		function cancel_pro () {
			var fname = document.getElementById("pro_fname");
			var lname = document.getElementById("pro_lname");
			var email = document.getElementById("pro_email");
			var age = document.getElementById("pro_age");
			var gender1 = document.getElementById("pro_gender1");
			var gender2 = document.getElementById("pro_gender2");

			var edit = document.getElementById("op1");
			var save = document.getElementById("op2");

			fname.disabled = true;
			lname.disabled = true;
			email.disabled = true;
			age.disabled = true;
			gender1.disabled = true;
			gender2.disabled = true;

			$('#pro_op2').slideUp('slow', function() {
				$('#pro_op1').slideDown('slow');
			});
		}

		function show_all () {
			$('#show_loc').slideUp('slow', function() {
				$('#loc_box, #hide_loc').slideDown('slow');
			});
		}

		function edit_loc () {
			var street = document.getElementById("loc_street");
			var city = document.getElementById("loc_city");
			var state = document.getElementById("loc_state");
			var country = document.getElementById("loc_country");

			var edit = document.getElementById("loc_op1");
			var save = document.getElementById("loc_op2");

			street.disabled = false;
			city.disabled = false;
			state.disabled = false;
			country.disabled = false;

			$('#loc_op1').slideUp('slow', function() {
				$('#loc_op2').slideDown('slow');
			});
		}

		function cancel_loc () {
			var street = document.getElementById("loc_street");
			var city = document.getElementById("loc_city");
			var state = document.getElementById("loc_state");
			var country = document.getElementById("loc_country");

			var edit = document.getElementById("loc_op1");
			var save = document.getElementById("loc_op2");

			street.disabled = true;
			city.disabled = true;
			state.disabled = true;
			country.disabled = true;

			$('#loc_op2').slideUp('slow', function() {
				$('#loc_op1').slideDown('slow');
			});
		}

		function hide_all () {
			$('#loc_box, #hide_loc').slideUp('slow', function() {
				$('#show_loc').slideDown('slow');
			});
		}
	</script>

	<script>
		function select_theme (idclick) {
			for(var i = 1; i <= 6; i++) {
            	$("#th" + i).css({"background-color": "#fff"});
        	}
        	$("#th" + idclick).css({"background-color": "#bdc3c7"});
		}
	</script>
	
	<script>
		$(document).ready(function() {
			$('#loadingIcon').show();
			<?php 
				if (isset($_SESSION['Loading']) || isset($_SESSION['Loading_onefriendposts'])) {
					unset($_SESSION['Loading']);
					unset($_SESSION['Loading_onefriendposts']);
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

			//for change theme
			$(".thumbnail").click(function(){
				var theme_src = $(this).find('img').attr('src');
				//alert(theme_src);
				$.ajax({
					url: "includes/form_handlers/theme_handler.php",
					type: "POST",
					data: "theme_src="+theme_src,
					cache: false,
					success: function(returnedData) {
						$('#themeModal').modal('hide');
						//reload the profile page
						alert("Theme changed successfully");
						location.reload();
						return false;
					}
				});
			});

		});
	</script>
</body>
</html>