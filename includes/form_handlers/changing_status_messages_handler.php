<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';
	
	if ( isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];

		$change_message_status_query = mysqli_query($this->con, "UPDATE messages SET seen ='yes' WHERE user_to_id='$id' AND user_from_id='$user_to_id' AND seen = 'no'");

		
		echo "1234";
		//echo "1234";
		
	}
?>