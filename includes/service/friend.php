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
			$ifAdded = mysqli_num_rows(mysqli_query($this->con,"SELECT * FROM user_friend WHERE user_id='$user_id' AND friend_id='$friend_id'"));

			$flag = 0;
			if ($ifAdded >= 1) {
				$flag = 1;
				mysqli_query($this->con,"UPDATE user_friend SET block='no' WHERE user_id='$user_id' AND friend_id='$friend_id'");
				mysqli_query($this->con,"UPDATE user_friend SET block='no' WHERE user_id='$friend_id' AND friend_id='$user_id'");
			} else {
				$flag = 2;
				mysqli_query($this->con,"INSERT INTO user_friend VALUES('$user_id','$friend_id','pnd')");
				mysqli_query($this->con,"INSERT INTO user_friend VALUES('$friend_id','$user_id','yes')");
			}
			$output = "<button type='button' class='btn btn-danger btn-f Delete'>
	                	<span class='glyphicon glyphicon-remove-sign'></span> Delete
	              	</button>";	
			return json_encode(array($output, $flag));
		}

		function deleteFriend($user_id, $friend_id){
			mysqli_query($this->con,"DELETE FROM user_friend WHERE user_id='$user_id' AND friend_id='$friend_id' ");
			mysqli_query($this->con,"DELETE FROM user_friend WHERE user_id='$friend_id' AND friend_id='$user_id' ");
			return "<button type='button' class='btn btn-success btn-f Add'>
            			<span class='glyphicon glyphicon-ok-sign'></span> Add
          			</button>";
		}

		function confirmFriend($user_id, $friend_id){
			mysqli_query($this->con,"UPDATE user_friend SET block='no' WHERE user_id='$user_id' AND friend_id='$friend_id' ");
		}
	}
 ?>