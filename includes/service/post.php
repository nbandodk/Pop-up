<?php 
	require 'user.php';
	/**
	* 
	*/
	class post 
	{
		private $con;
		private $user_obj;
		
		function __construct($con,$id){
			$this->con = $con;
			$this->user_obj = new user($con, $id);
		}

		public function submitPost($body){
			$body = strip_tags($body);
			$body = mysqli_real_escape_string($this->con,$body);
			$check_body_empty = preg_replace('/\s+/', '', $body);

			if ($check_body_empty != "") {
				//insert the post
				$date = date("Y-m-d H:i:s");
				$added_by_id = $this->user_obj->getUserid();
				$added_by_name = $this->user_obj->getUsername();
				mysqli_query($this->con,"insert into posts values('','$body','$added_by_id','$added_by_name','$date','no','no','0')"); 
			}
		}

		public function loadAllMyPosts($id){
			$data = mysqli_query($this->con,"select * from posts where added_by_id='$id'");
			$outputStr = "";
			while ($row = mysqli_fetch_array($data)) {
				$outputStr = $outputStr."
					<div class='row'>
				        <div class='col-sm-3'>
				          <div class='well'>
				           <p>".$this->user_obj->getUsername()."</p>
				           <img src='bird.jpg' class='img-circle' height='55' width='55'>
				          </div>
				        </div>
				        <div class='col-sm-9'>
				          <div class='well'>
				          	<p>".$this->getTime($row['date'])."</p>
				          	<br>
				            <p>".$row['text']."</p>
				            <br>
				            <p>Likes (".$row['likes'].")</p>
				          </div>
				        </div>
				      </div>
				";
			}
			return $outputStr;
		}

		public function loadFriendPosts($id){
			//get the friends' id of the user 
			$friend_list_query = mysqli_query($this->con,"select friend_id from user_friend where user_id='$id'");
			
			while ($friend_array = mysqli_fetch_array($friend_list_query)) {
				$data = array();
				$data[$friend_array['friend_id']] = $this->loadPosts($friend_array['friend_id']);
			}
			return $data;
		}

		public function getTime($postDateTime){
			$currentDateTime = date("Y-m-d H:i:s");
			$startTime = new DateTime($postDateTime);
			$endTime = new DateTime($currentDateTime);
			$interval = $startTime->diff($endTime);
			if ($interval->y >= 1) {
				if ($interval->y > 1) {
					return $interval->y." years ago";
				}else{
					return "1 year ago";
				}
			}else if ($interval->m >= 1) {
				if ($interval->m > 1) {
					return $interval->m." months ago";
				}else{
					return "1 month ago";
				}
			}else if ($interval->d >= 1) {
				if ($interval->d > 1) {
					return $interval->d." days ago";
				}else{
					return "1 day ago";
				}
			}else if ($interval->h >= 1) {
				if ($interval->h > 1) {
					return $interval->d." hours ago";
				}else{
					return "1 hour ago";
				}
			}else if ($interval->i >= 1) {
				if ($interval->i > 1) {
					return $interval->i." minutes ago";
				}else{
					return "1 minute ago";
				}
			}else{
				if ($interval->s > 1) {
					return $interval->s." seconds ago";
				}else{
					return "1 second ago";
				}
			}
		}
	}

?>