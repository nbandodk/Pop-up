<?php 
	require 'user.php';
	/**
	* 
	*/
	class post 
	{
		private $con;
		private $id;
		private $user_obj;
		
		function __construct($con,$id){
			$this->con = $con;
			$this->id = $id;
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

		public function deleteMyPost($request){
			$postId = $request['postId'];
			mysqli_query($this->con,"update posts set deleted = 'yes' where id = '$postId'");
		}

		public function loadAllMyPosts($request, $pageSize){
			//get the current page number
			$pageNum = $request['page']; 
			$start = ($pageNum-1)*$pageSize;

			$data = mysqli_query($this->con,"select * from posts where added_by_id='$this->id' and deleted = 'no' order by date DESC limit $start, $pageSize");
			if (mysqli_num_rows($data) >= 1) {
				$outputStr = "";
				//output the data from result set
				while ($row = mysqli_fetch_array($data)) {
					$outputStr .= "
				        <div class='well' value='".$row['id']."'>
				        	<a href='#' class='close'
				        	 	data-dismiss='alert'
				        	 	aria-label='close'><i class='fa fa-window-close'aria-hidden='true'></i></a>
				            <img src='".$this->user_obj->getProfile_pic()."' class='img-circle' height='55' width='55'>
				            <br>
		        	        ".$this->user_obj->getUsername()."
				          	<p>".$this->getTime($row['date'])."</p>
				          	<br>
				            <p>".$row['text']."</p>
				            <br>
				            <p>Likes (".$row['likes'].")</p>
				        </div>
					";
				}
				$outputStr .= "
					<input type='hidden' class='nextPage' value='".($pageNum + 1)."'>
					<input type='hidden' class='noMorePosts' value='false'>
					";
				return $outputStr;
			}else{
				//no more posts
				$outputStr = "";
				$outputStr .= "
					<input type='hidden' class='noMorePosts' value='true'>
					<hr>
					<p>No More to Show</p>
				";
				return $outputStr;
			}
			
		}

		public function loadFriendPosts(){
			//get the friends' id of the user 
			$friend_list_query = mysqli_query($this->con,"select friend_id from user_friend where user_id='$this->id'");
			
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