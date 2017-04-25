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
	    			<div class='row eachComment' value='".$comment['id']."' id='each_comment'>
	    				<div class='row  showcomments_header' style='height: 15px;'>
	    					<div class='col-sm-12' >
						";
						//----------------------------------
						if ($this->currentUserId == $comment['comment_by_id']) {
							$url = "profile.php?username=".$comment['comment_by_name']."&id=".$comment['comment_by_id'];
							$output .="
							<i class='icon-remove' aria-hidden='true' style='float: right; padding-right:5px; color: #c2c2c2 '></i>
							";
						}else{
							$url = "friend_profile.php?friend_id=".$comment['comment_by_id'];
						}
						//----------------------------------
						$output .="
							</div>
						</div>

						<div class='col-xs-2 col-sm-2 col-md-3' style='clear:both; padding-left: 5px'>
							<a href='".$url."' style='float: left; padding: 2px 0; font-size: 14px'><img src='".$comment['profile_pic']."' class='img-rounded' height='40' width='40'> ".$comment['comment_by_name']."
							</a>
						</div>

						<div class='col-xs-10 col-sm-10 col-md-9'>
							<div class='row'>
								<div class='col-sm-12' style='clear: both;'>
									<p class='post_area_p post_p' style='float: left; padding: 1px 0'>
										".$this->getTime($comment['dateTime'])."
									</p>
	    						</div>
							</div>

							<div class='row'>
								<div class='col-sm-12' style='margin-top: 5px; margin-bottom: 5px;'>
									".$comment['comment'];
	    				$output .="
								</div>
							</div>
						</div>
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