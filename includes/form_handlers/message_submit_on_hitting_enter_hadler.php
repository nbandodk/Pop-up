<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id']) && isset($_POST["user_id"]) && isset($_POST["message"]) ) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];

		$body = $_POST['message'];
		$date = date("Y-m-d H:i:s");

		$message_obj = new Message($con, $id);
		$ret_data = $message_obj->sendAndShowSentMessage($user_to_id,$body,$date);
					
		echo $ret_data;
		
	}
?>