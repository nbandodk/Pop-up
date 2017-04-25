<?php
	require 'header.php'; 
	require 'includes/form_handlers/home_handler.php';
	#require 'includes/service/user.php';
	require 'includes/service/Message.php';

	$message_obj = new Message($con, $id);

	if(isset($_GET['u']))
		$user_to_id = $_GET['u'];
	else {
		$user_to_id = $message_obj->getMostRecentUser();
		//if($user_to_id == false)
		//	$user_to_id = 'new';
	}
	if($user_to_id!=0){

	$user_to_obj = new user($con, $user_to_id);
	}
	if(isset($_POST['post_message']) && $user_to_id!= 0) {

		if(isset($_POST['message_body'])) {
			$body = mysqli_real_escape_string($con, $_POST['message_body']);
			$date = date("Y-m-d H:i:s");
			$message_obj->sendMessage($user_to_id,$body,$date);
			header("Location: #");
		}
	}
?>

	<div class="container text-center">    
	  	<div class="row">
	    	<div class="col-sm-3">
	      		<div class="box" style="padding-bottom: 10px;">
					<a href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">
			    		<img src="<?php echo $user['profile_pic'] ?>" class="img-rounded" height="100" width="100" style="margin: 15px">
			        	<p style="font-size:18px;"><?php echo $user['username'] ?></p>
		        	</a>
		        </div>
		    
		  		<div class="box">
		        	<div class="user_details_column" id="conversations" style="padding-top: 0; margin-top: -10px; margin-bottom: 0">
		        		<h4 style="margin-bottom: 15px">Chats</h4>
		      			<div class ="loaded_conversations" id="load_all_chats">
		      				<?php echo $message_obj->getChats();?>
		      			</div>
		      			<br>
	    		    </div>
		        </div>
		    </div>

		    <!-- message section-->
		    <div class="col-sm-7">
		      	<div class="box messages_area">
    		      	<?php
    		      		if($user_to_id != 0) {
    		      		$user_to_id_profile_pic = $user_to_obj->getProfile_pic();
    		      		echo "<div class='box chat_head'><img class='img-circle' src='$user_to_id_profile_pic' height='50'><h3 style='margin-top: 5px;'>" . $user_to_obj->getUsername() . "</h3><p id='online_status' style = 'float:left; color:#fff;'></p><br></div>" ;
    		      		echo "<div class='loaded_messages' id='scroll_messages'>";
    		      			echo $message_obj->getMessages($user_to_id);
    		      		echo "</div>"; 
    		      		echo '<div class="message_post">
								<form class="form-horizontal" action="" method="POST">
									<div class="form-group">
										<div class="col-xs-8 col-sm-8 col-md-10">
											<textarea class="form-control post_input" name="message_body" id="message_textarea" placeholder="Write your message ..." style="resize: none;"></textarea>
										</div>

										<div class="col-xs-3 col-sm-4 col-md-2" >
											<button type="submit" name="post_message" class="btn btn-success btn-f" id="message_submit" style="float: right;">Send</button>
										</div>
									</div>									
								</form>
							</div>';
    		      		}
    		      		else {
    		      			echo "<h2>Add Friends and start chatting</h2>";
    		      		}  		      	
    		      	?>

		      		

		      		<script>
		      			var div =document.getElementById("scroll_messages");
		      			div.scrollTop = div.scrollHeight;
		      		</script>
		      		
		      	</div>		  	
		  	</div>

		  	<div class="col-sm-2" style="padding-left: 0; padding-right: 0">
		  		<div class='box friends_list_area'>
	    			<h4 style="text-align: center; padding-bottom: 15px;">Start a Conversation</h4>
		    		<div class="panel-group friends_list_group">
		    			<div class="panel panel-default friends_list_panel text-left">

				    		<?php
				    		while ($user_friend=mysqli_fetch_array($user_friends)) {
				    			//get the name and img of the friends
								$friend = new user($con, $user_friend['friend_id']);
								$friend_id = $friend->getUserid();
								echo "
			    					<div class='panel-heading' style='padding-left: 15px; padding-top: 12px; padding-bottom: 12px;'>
			      						<h4 class='panel-title'>
			        						<a href='messages.php?u=$friend_id'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'> &nbsp".$friend->getUsername()."</a>
			      						</h4>
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

	<script type="text/javascript">

	    function load_chats_update(){
			$.ajax({
				url: "includes/form_handlers/chats_update_handler.php",
	            type: "GET",
	            
	            success : function(data) {
	               $('#load_all_chats').empty().append(data);
	            }
			});
		}

	    setInterval('load_chats_update()', 1000); // refresh div after 1 secs

	 	function load_specific_messages_update(){
			var user_id = '<?php echo $user_to_id; ?>';
			$.ajax({
				url: "includes/form_handlers/messages_with_person_handler.php",
	            type: "POST",
	            data: {user_id : user_id},
	            dataType: 'text',
	            success : function(data) {

	               if(data && data !=""){
	               $('#scroll_messages').append(data);
	               var div =document.getElementById("scroll_messages");
		    		      			div.scrollTop = div.scrollHeight;
		    		}
		    		
	            }
			});
	    }

	    setInterval('load_specific_messages_update()', 1500); // refresh div after 1.5 secs

	    last_seen_status_update();
	    function last_seen_status_update(){
			var user_id = '<?php echo $user_to_id; ?>';
			$.ajax({
				url: "includes/form_handlers/last_seen_status_handler.php",
	            type: "POST",
	            data: {user_id : user_id},
	            dataType: 'text',
	            success : function(data) {

	               if(data == 'yes'){
	               //	data = '<span class="glyphicon glyphicon-star"></span> ' + " " + data;
	               $('#online_status').empty().append(data);

		    		}
		    		else {
		    		$('#online_status').empty().append(data);	
		    		}
		    		
	            }
			});
	    }

	     setInterval('last_seen_status_update()', 5000); // refresh div after 1.5 secs


	    	// to send messages on hitting enter
	        $('#message_textarea').bind("enterKey",function(e){

		   		var user_id = '<?php echo $user_to_id; ?>';
		   		var message = $('#message_textarea').val();
				$.ajax({
					url: "includes/form_handlers/message_submit_on_hitting_enter_hadler.php",
		            type: "POST",
		            data: {user_id : user_id, message : message },
		            dataType: 'text',
		            success : function(data) {

		               $('#scroll_messages').append(data);
		               var div =document.getElementById("scroll_messages");
			    		      			div.scrollTop = div.scrollHeight;

			    		 document.getElementById('message_textarea').value = "";

			    		
		            }
				});
			});

			$('#message_textarea').keyup(function(e){
			    if(e.keyCode == 13)
			    {
			        $(this).trigger("enterKey");
			    }
			    return false;
			});

    </script>

</body>
</html>