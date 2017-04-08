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

	if($user_to_id != "new")
		$user_to_obj = new user($con, $user_to_id);

	if(isset($_POST['post_message'])) {

		if(isset($_POST['message_body'])) {
			$body = mysqli_real_escape_string($con, $_POST['message_body']);
			$date = date("Y-m-d H:i:s");
			$message_obj->sendMessage($user_to_id,$body,$date);
		}	
	}
	?>

	<div class="container text-center">    
	  	<div class="row">
	    	<div class="col-sm-3 scrolldiv">
	      		<div class="box" >

					<a href="profile.php?<?php echo "username=".$user['username']."&id=".$user['id']?>">
			    		<img src="<?php echo $user['profile_pic'] ?>" class="img-circle" height="65" width="65" style="margin: 10px">
			        	<p>User ID: <?php echo $user['username'] ?></p>
		        	</a>

		        </div>

		       
		    </div>

		    <!-- message section-->
		    <div class="col-sm-6">
	    		      	<div class="box posts_area">

	    		      	<?php
	    		      	if($user_to_id != "new") {
	    		      		$user_to_id_profile_pic = $user_to_obj->getProfile_pic();
	    		      		echo "<div class='box chat_head'><img src = '$user_to_id_profile_pic'><h3>" . $user_to_obj->getUsername() . "</h3><br></div>" ;
	    		      		echo "<div class='loaded_messages' id='scroll_messages'>";
	    		      			echo $message_obj->getMessages($user_to_id);
	    		      		echo "</div>";
	    		      	}
	    		      	else {
	    		      		echo "<h4>New Message</h4>";
	    		      	}

	    		      	?>

	    		      		<div class="message_post">
	    		      			<form action="" method="POST">
	    		      				<?php
	    		      				if($user_to_id == "new") {
	    		      					echo "Start a new conversation <br><br>";
	    		      					echo "To:<input type='text' >";
	    		      					echo "<div class='results'></div>";
	    		      				}
	    		      				else {
	    		      					echo "<br><textarea name='message_body' id='message_textarea' placeholder='Type a message ...'></textarea>" ;
	    		      					echo "<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>";
	    		      				}
	    		      				?>
	    		      			</form>

	    		      		</div>
	    		      		<script>
	    		      			var div =document.getElementById("scroll_messages");
	    		      			div.scrollTop = div.scrollHeight;
	    		      		</script>


	    		      		
	    		      	</div>		  	
		  	</div>

		  	<div class="col-sm-3">
		  		<div class="box">
		        	<div class="user_details_column" id="conversations"><h4>Chats</h4>
	    		      			<div class ="loaded_conversations">
	    		      			<?php echo $message_obj->getChats();?>
	    		      			</div>
	    		      			<br>
	    		      			<a href="messages.php?u=new">Start Conversation</a>
	    		    </div>
		        </div>

		  	</div>



		</div>
    </div>





</body>
</html>
