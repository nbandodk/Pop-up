<?php 
	/**
	* user object
	*/
	class user 
	{	
		private $con;
		private $user;
		
		function __construct($con,$id){
			$this->con = $con;
			$user_details_query = mysqli_query($con,"select * from users where id='$id'");
			$this->user=mysqli_fetch_array($user_details_query);
		}

		function getUsername(){
			return $this->user['username'];
		}

		function getUserid(){
			return $this->user['id'];
		}

		function getNum_posts(){
			return $this->user['num_posts'];
		}

		function getProfile_pic(){
			return $this->user['profile_pic'];
		}
	}
 ?>