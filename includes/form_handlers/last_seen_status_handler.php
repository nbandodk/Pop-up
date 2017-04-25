<?php 
	//coding here
	require '../../config/config.php';
	
	if ( isset($_SESSION['id']) && isset($_POST["user_id"]) ) {
		$id = $_SESSION['id'];
		$user_to_id = $_POST['user_id'];

		
		$last_seen_query = mysqli_query($con,"SELECT logged_in, last_online_time FROM user_last_seen_status WHERE id = '$user_to_id'");
		
		$ret_data = mysqli_fetch_array($last_seen_query);

		if($ret_data['logged_in'] == "yes"){
		echo "Online";
		}
		else {
		echo "last seen : " . $ret_data['last_online_time'];
		}
	}
?>