<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id']) && isset($_POST["user_id"]) ) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];
		$change_message_status_query = mysqli_query($con, "UPDATE messages SET seen ='yes' WHERE user_to_id='$id' AND user_from_id='$user_to_id' AND seen = 'no'");

		$message_obj = new Message($con, $id);
		//echo $message_obj->getMostRecentUser();

		$ret_data = $message_obj->getMessages($user_to_id);
		echo $ret_data;
		//echo "1234";
		
	}
?>