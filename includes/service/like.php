<?php 
	/**
	* 
	*/
	class like
	{
		private $con;
		
		function __construct($con)
		{
			$this->con = $con;
		}

		function update_likes($request){
			$username = $request['username'];
			$profile_pic = $request['profile_pic'];
			$user_id = $request['userId'];
			$post_id = $request['postId'];
			//check if the user likes before
			$doesLikeBefore = mysqli_query($this->con,"SELECT * FROM likes WHERE post_id='$post_id' AND user_id='$user_id'"); 
			if (mysqli_num_rows($doesLikeBefore) < 1) {
				//add a like record to table named likes 
				mysqli_query($this->con,"insert into likes values('','$username','$profile_pic','$user_id','$post_id')"); 
				mysqli_query($this->con,"UPDATE posts SET likes=likes+1 WHERE id='$post_id'");
			}
		}

		function selectLikes($post_id){
			$data = mysqli_query($this->con,"SELECT * FROM likes WHERE post_id='$post_id'");
			return $data;
		}

		function selectPosts($post_id){
			$data = mysqli_query($this->con,"SELECT likes FROM posts WHERE id='$post_id' ");
			$row = mysqli_fetch_array($data);
			return $row['likes'];
		}


	}
?>