<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$message_obj = new Message($con, $id);
		//echo $message_obj->getMostRecentUser();
		$ret_data = $message_obj->getChats();
		echo $ret_data;
		//echo "1234";
		
	}
?>