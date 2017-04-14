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
				<div id= "theme" class="profile_cover">
				<a href="#" style="float: right; margin-right: 5px;" data-toggle="modal" data-target="#themeModal">Feel boring? Look for more covers.</a>
					<div class="col-sm-6 myprofile_box">
						<div class="col-xs-12 col-sm-6 col-md-4 img-rounded left_area">
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
	      		<div id="pro_box" class="box" style="padding-left: 25px; padding-right: 25px;">
					<p class="text-left profile_title"><i class="icon-list-alt icon-large"></i> My Profile: </p>
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
                            <div class="col-sm-8" style="margin-bottom: 5px;">
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
                                <input type="number" class="form-control pro_input" name='proage' id="pro_age" value="<?php echo $user2['age']?>" disabled="true">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="my_gender" class="col-sm-4 control-label" style="text-align: left">Gender:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control pro_input" name='progender'id="pro_gender" value="<?php echo $user2['gender']?>" disabled="true">
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
					<p class="text-left location_title"><i class="icon-globe icon-large"></i> Location: </p>
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
				                        <div class="row">
				                            <div class="col-md-4 col-xs-6">
				                                <div class="thumbnail" id="th1" onclick="select_theme(1)" style="width: 100%; height: 220px;">
				                                    <img class="img-responsive" src="assets/images/themes/th1.jpg" alt="..." data-dismiss="modal">
				                                    <div class="caption">
				                                        <h4>Website theme 1</h4>
				                                        <p></p>
                                					</div>
				                                </div>

				                            </div>
				                            <div class="col-md-4 col-xs-6">
				                                <div class="thumbnail" id="th2" onclick="select_theme(2)" style="width: 100%; height: 220px;">
				                                    <img class="img-responsive" src="assets/images/themes/th2.jpg" alt="...">
				                                    <div class="caption">
				                                        <h4>Website theme 2</h4>
				                                        <p></p>
                                					</div>
				                                </div>
				                            </div>
				                            <div class="col-md-4 col-xs-6">
				                                <div class="thumbnail" id="th3" onclick="select_theme(3)" style="width: 100%; height: 220px;">
				                                    <img class="img-responsive" src="assets/images/themes/th3.jpg" alt="...">
				                                    <div class="caption">
				                                        <h4>Website theme 3</h4>
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
				                                        <h4>Website theme 4</h4>
				                                        <p></p>
                                					</div>
					                            </div>
					                        </div>
				                        </div>
				                    </div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-primary" id="pwdResetSumbit">Confirm</button>
								</div>
							</div>
						</div>
					</div>

			   	</div>
	    	</div>

	    	<!-- for posting something -->
	    	<div class="col-sm-7">
		    	<ul class="nav nav-pills">
				    <li class="active"><a data-toggle="pill" href="#home">Post</a></li>
				    <li><a data-toggle="pill" href="#mess_menu">Message</a></li>
				    <li><a data-toggle="pill" href="#set_menu">Setting</a></li>
				</ul>
  
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
		  				<div class="row" style="margin-top: 10px;">
							<div class="col-sm-12">
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
						</div>

			    		<div class="posts_area"></div>
				  		<p id="loadingIcon"><i class="icon-spinner icon-spin icon-large"></i> Loading content...</p>
					</div>

					<div id="mess_menu" class="tab-pane fade">
						<h3>Message Menu</h3>
						<p>Put the message box and history here.</p>
					</div>

					<div id="set_menu" class="tab-pane fade">
						<h3>Setting Menu</h3>
						<p>Put any setting options here.</p>	
					    	
          				<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pwdModal">
						<span class="glyphicon glyphicon-refresh"> Password Reset</span> 
						</button>
					</div>
				</div>

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
		function edit_pro () {
			var fname = document.getElementById("pro_fname");
			var lname = document.getElementById("pro_lname");
			var email = document.getElementById("pro_email");
			var age = document.getElementById("pro_age");
			var gender = document.getElementById("pro_gender");

			var edit = document.getElementById("op1");
			var save = document.getElementById("op2");

			fname.disabled = false;
			lname.disabled = false;
			email.disabled = false;
			age.disabled = false;
			gender.disabled = false;

			$('#pro_op1').slideUp('slow', function() {
				$('#pro_op2').slideDown('slow');
			});
		}
		function cancel_pro () {
			var fname = document.getElementById("pro_fname");
			var lname = document.getElementById("pro_lname");
			var email = document.getElementById("pro_email");
			var age = document.getElementById("pro_age");
			var gender = document.getElementById("pro_gender");

			var edit = document.getElementById("op1");
			var save = document.getElementById("op2");

			fname.disabled = true;
			lname.disabled = true;
			email.disabled = true;
			age.disabled = true;
			gender.disabled = true;

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
			for(var i = 1; i <= 4; i++) {
            	$("#th" + i).css({"background-color": "#fff"});
        	}
        	$("#th" + idclick).css({"background-color": "#bdc3c7"});
		}
	</script>
	
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