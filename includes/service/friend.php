<?php 

	/**
	* 
	*/
	class friend
	{
		private $con;
		function __construct($con){
			$this->con=$con;
		}

		function addFriend($user_id, $friend_id){
			mysqli_query($this->con,"INSERT INTO user_friend VALUES('$user_id','$friend_id','yes')");
		}

		function deleteFriend($user_id, $friend_id){
			mysqli_query($this->con,"DELETE FROM user_friend WHERE user_id='$user_id' AND friend_id='$friend_id' ");
		}

		function confirmFriend($user_id, $friend_id){
			mysqli_query($this->con,"UPDATE user_friend SET block='no' WHERE user_id='$user_id' AND friend_id='$friend_id' ");
		}
	}
 ?>