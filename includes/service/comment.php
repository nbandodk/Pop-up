<?php 

	/**
	* 
	*/
	class comment 
	{
		private $con;
		private $currentUserId;
		function __construct($con, $currentUserId)
		{
			$this->con = $con;
			$this->currentUserId = $currentUserId;
		}

		public function insertComments($request){
			$comment_by_name = $request['username'];
			$profile_pic = $request['profile_pic'];
			$comment_by_id = $request['userId'];
			$post_id = $request['postId'];
			$comment = $request['comment'];
			$dateTime = date("Y-m-d H:i:s");
			mysqli_query($this->con,"INSERT INTO comments VALUES('', '$comment', '$comment_by_id', '$comment_by_name', '$profile_pic', '$dateTime', 'no', '$post_id')");
			return $this->selectComments($post_id);
		}

		public function selectComments($post_id){
			$commentData = mysqli_query($this->con,"SELECT * FROM comments WHERE post_id='$post_id' AND removed = 'no' order by dateTime ASC");
			$output = "";
			while ($comment = mysqli_fetch_array($commentData)){
		    	$output .="
	    			<div class='eachComment' value='".$comment['id']."'>
	    				<a href='#'><img src='".$comment['profile_pic']."' class='img-circle' height='25' width='25'>".$comment['comment_by_name']." :
						</a>
						".$comment['comment'];
						//----------------------------------
						if ($this->currentUserId == $comment['comment_by_id']) {
							$output .="
							<span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>
							";
						}
						//----------------------------------
						$output .="
						<p>
						".$this->getTime($comment['dateTime'])."
						</p>
	    			</div>
	    		";
		    }
			return $output;
		}

		public function deleteComments($id){
			mysqli_query($this->con,"DELETE FROM comments WHERE id='$id'");
		}

		//get the relative time
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
					return $interval->h." hours ago";
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