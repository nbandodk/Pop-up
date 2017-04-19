<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id']) && isset($_POST["user_id"]) ) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];

		
		$message_obj = new Message($con, $id);
		
		// getting the messages between logged in user and user_to_id
		$ret_data = $message_obj->getUnseenMessages($user_to_id);

		// To change the status of the messages on being seen
		$change_message_status_query = mysqli_query($con, "UPDATE messages SET seen ='yes' WHERE user_to_id='$id' AND user_from_id='$user_to_id' ");

		echo $ret_data;
		
	}
?>