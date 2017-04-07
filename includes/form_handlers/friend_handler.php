<?php 
	require '../../config/config.php';
	require '../service/friend.php';
	if (isset($_REQUEST['addFriendById'])) {
		$friend = new friend($con);
		// $friend->addFriend($_SESSION['id'], $_REQUEST['addFriendById']);
	}
 ?>