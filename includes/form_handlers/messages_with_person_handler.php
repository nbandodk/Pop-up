<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id']) && isset($_POST["user_id"]) ) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];

		
		$message_obj = new Message($con, $id);
		
		$ret_data = $message_obj->getUnseenMessages($user_to_id);

		
		echo $ret_data;
		
	}
?>