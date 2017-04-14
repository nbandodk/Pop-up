<?php 
	//coding here
	require '../../config/config.php';
	
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];

		$unseen_messages_query = mysqli_query($con, "SELECT id FROM messages WHERE user_to_id='$id' AND seen='no'");
		$unseen_messages_count = mysqli_num_rows($unseen_messages_query);
		
		echo $unseen_messages_count ;
	}

?>
		
