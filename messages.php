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
			if($user_to_id == false)
				$user_to_id = 'new';
		}

	$user_to_obj = new user($con, $user_to_id);

	if(isset($_POST['post_message'])) {

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
	    	<div class="col-sm-3 scrolldiv">
	    		<div class="row">
		      		<div class="col-sm-12 box" >
						<a href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">
				    		<img src="<?php echo $user['profile_pic'] ?>" class="img-circle" height="65" width="65" style="margin: 10px">
				        	<p>User ID: <?php echo $user['username'] ?></p>
			        	</a>
			        </div>

			    
		  		<div class=" col-sm-12 box">
		        	<div class="user_details_column" id="conversations"><h4>Chats</h4>
	    		      			<div class ="loaded_conversations" id="load_all_chats">
	    		      			<?php echo $message_obj->getChats();?>
	    		      			</div>
	    		      			<br>
	    		    </div>
		        </div>




			    </div>		       
		    </div>

		    <!-- message section-->
		    <div class="col-sm-6">
	    		      	<div class="box posts_area">

	    		      	<?php
	    		      		$user_to_id_profile_pic = $user_to_obj->getProfile_pic();
	    		      		echo "<div class='box chat_head'><img src = '$user_to_id_profile_pic'><h3>" . $user_to_obj->getUsername() . "</h3><br></div>" ;
	    		      		echo "<div class='loaded_messages' id='scroll_messages'>";
	    		      			echo $message_obj->getMessages($user_to_id);
	    		      		echo "</div>";
	    		      		    		      	
	    		      	?>

	    		      		<div class="message_post">
								<form action="" method="POST">
									<textarea name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>
									<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>
									
								</form>

							</div>



	    		      		<script>
	    		      			var div =document.getElementById("scroll_messages");
	    		      			div.scrollTop = div.scrollHeight;
	    		      		</script>


	    		      		
	    		      	</div>		  	
		  	</div>

		  	<div class="col-sm-3">
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
								 
		    					<div class='panel-heading' style='padding: 15px;'>
		      						<h4 class='panel-title'>
		        						<a  href='messages.php?u=$friend_id'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'><i> ".$friend->getUsername()."</i></a>
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

               $('#scroll_messages').empty().append(data);
               
            }
		});
    }

    setInterval('load_specific_messages_update()', 1000); // refresh div after 1 secs

    </script>





</body>
</html>
