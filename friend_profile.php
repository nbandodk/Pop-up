<?php 
require 'header.php';
require 'includes/form_handlers/friend_profile_handler.php';
require 'includes/service/user.php';
?>
  
<!--body-->

	<!--very important! -->
  	<input type="hidden" value="<?php echo $current_user['username'] ?>">
	<input type="hidden" value="<?php echo $current_user['id'] ?>">
	<input type="hidden" value="<?php echo $current_user['profile_pic'] ?>">
	<input type="hidden" value="<?php echo $user_id ?>">

	<div class="container text-center">
		<div class="row">
			<div class="col-sm-12">
				<div id= "theme" class="profile_cover" style="background-image: url(<?php if(empty($user2['background_pic'])) echo "assets/images/themes/default_th.jpg"; else echo $user2['background_pic'] ?>);">
					<div class="col-sm-6 myprofile_box">
						<div class="col-xs-12 col-sm-6 col-md-4 left_area">
							<img class="img-rounded friend_photo" src="<?php echo $user['profile_pic'] ?>" height="150" width="150">
				        </div>

				        <div class="col-xs-7 col-sm-6 col-md-8 right_area text-left">
							<a class="user_name" href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">	
					    		<p class="user_name_p"><?php echo $user['username'] ?></p>
					        </a>
				        </div>
			        </div>
			    </div>
			</div>
		</div> 
		   
	  	<div class="row" style="margin-top: 5px;">
	    	<div class="col-sm-5">
	      		<div id="pro_box" class="box" style="padding-left: 25px; padding-right: 25px;">
					<p class="text-left profile_title"><i class="icon-list-alt icon-large"></i> &nbspProfile: </p>
					<hr style="height: 1px; border: none; background-color: #7f8c8d; margin-top: 5px;">
					
					<form action="" class="form-horizontal text-left friend_pro_form" method="post">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="fname" class="col-sm-4 control-label" style="text-align: left">First name:</label>
                            <label for="fname_value" class="col-sm-8 control-label" style="text-align: left"><?php echo $user['first_name'] ?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="lname" class="col-sm-4 control-label" style="text-align: left">Last name:</label>
                            <label for="lname_value" class="col-sm-8 control-label" style="text-align: left"><?php echo $user['last_name'] ?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="email" class="col-sm-4 control-label" style="text-align: left">Email:</label>
                            <label for="email_value" class="col-sm-8 control-label" style="text-align: left"><?php echo $user['email'] ?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="age" class="col-sm-4 control-label" style="text-align: left">Age:</label>
                            <label for="age_value" class="col-sm-8 control-label" style="text-align: left"><?php echo $user2['age']?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="gender" class="col-sm-4 control-label" style="text-align: left">Gender:</label>
                            <label for="gender_value" class="col-sm-8 control-label" style="text-align: left"><?php echo $user2['gender']?></label>
                        </div>
                    </form>
                </div>

                <div id="show_loc">
                	<a onclick="show_all();" style="font-size: 16px"><i class="icon-angle-down icon-large"></i> See More</a>
				</div>

                <div id="loc_box" class="box" style="margin-top: 10px; padding-left: 25px; padding-right: 25px; display: none;">
					<p class="text-left location_title"><i class="icon-globe icon-large"></i> Location: </p>
					<hr style="height: 1px; border: none; background-color: #7f8c8d; margin-top: 5px;">
					
					<form action="" class="form-horizontal text-left friend_loc_form" method="post">
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="street" class="col-sm-3 control-label" style="text-align: left">Street:</label>
                            <label for="street_value" class="col-sm-9 control-label" style="text-align: left"><?php echo $user2['street']?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="city" class="col-sm-3 control-label" style="text-align: left">City:</label>
                            <label for="city_value" class="col-sm-9 control-label" style="text-align: left"><?php echo $user2['city']?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="state" class="col-sm-3 control-label" style="text-align: left">State:</label>
                            <label for="state_value" class="col-sm-9 control-label" style="text-align: left"><?php echo $user2['province']?></label>
                        </div>
                        <div class="form-group" style="margin-bottom: 5px;">
                            <label for="country" class="col-sm-3 control-label" style="text-align: left">Country:</label>
                           	<label for="country" class="col-sm-9 control-label" style="text-align: left"><?php echo $user2['country']?></label>
                        </div>
                    </form>
                </div>

                <div id="hide_loc" style="display: none;">
                	<a onclick="hide_all();" style="font-size: 16px"><i class="icon-angle-up icon-large"></i> Hide</a>
				</div>
	    	</div>

	    	<!-- for posting something -->
	    	<div class="col-sm-7">
			    <div class="posts_area"></div>
				<p id="loadingIcon"><i class="icon-spinner icon-spin icon-large"></i> Loading content...</p>
			</div>
		</div>
	</div>

	<script>
		function show_all () {
			$('#show_loc').slideUp('slow', function() {
				$('#loc_box, #hide_loc').slideDown('slow');
			});
		}

		function hide_all () {
			$('#loc_box, #hide_loc').slideUp('slow', function() {
				$('#show_loc').slideDown('slow');
			});
		}
	</script>
	
	<script>
		$(document).ready(function() {
			$('#loadingIcon').show();
			<?php 
				if (isset($_SESSION['Loading'])) {
					unset($_SESSION['Loading']);
					unset($_SESSION['Loading_myposts']);			
				}
				$_SESSION['Loading_onefriendposts'] = 'true';
			?>

			//ajax request for loading posts
			var friend_id = $('input:hidden:eq(3)').val();
			$.ajax({
				url: "includes/form_handlers/post_handler.php",
				type: "POST",
				data: { page: 1, onefriend_id: friend_id},
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
				var friend_id = $('input:hidden:eq(3)').val();
				
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
						data: { page: pageNum, onefriend_id: friend_id},
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