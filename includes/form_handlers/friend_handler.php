<?php 
	require '../../config/config.php';
	require '../service/friend.php';
	if (isset($_REQUEST['addFriendById'])) {
		$friend = new friend($con);
		echo $friend->addFriend($_SESSION['id'], $_REQUEST['addFriendById']);
	}elseif (isset($_REQUEST['deleteFriendById'])) {
		$friend = new friend($con);
		echo $friend->deleteFriend($_SESSION['id'], $_REQUEST['deleteFriendById']);
	}
 ?>