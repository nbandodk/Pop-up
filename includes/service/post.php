<script src="assets/js/flat.js"></script>
<?php 
	require 'user.php';
	require 'like.php';
	require 'comment.php';
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

		//submit my posts
		public function submitPost($body){
			$body = strip_tags($body);
			$body = mysqli_real_escape_string($this->con,$body);
			$check_body_empty = preg_replace('/\s+/', '', $body);

			if ($check_body_empty != "") {
				$body_array = preg_split("/\s+/", $body);
				foreach ($body_array as $key => $value) {
					if (strpos($value, "www.youtube.com/watch?v=") !== false) {
						$value = preg_replace("!watch\?v=!", "embed/", $value);
						$value = "<iframe src=\'".$value."\' width=\'420\' height=\'315\'></iframe>";
						$body_array[$key] = $value;
					}
				}
				$body = implode(" ", $body_array);

				//insert the post
				$date = date("Y-m-d H:i:s");
				$added_by_id = $this->id;
				$added_by_name = $this->user_obj->getUsername();
				//add a post record to table named posts 
				mysqli_query($this->con,"insert into posts values('','$body','$added_by_id','$added_by_name','$date','no','no','0')");
				mysqli_query($this->con,"update users SET num_posts = num_posts+1 where id = '$added_by_id'"); 

			}
		}

		//submit my imageposts
		public function submitImagePost($filepath){
			//insert the post
			$body = "<img src=\'".$filepath."\' width=\'70%\'>";
			$date = date("Y-m-d H:i:s");
			$added_by_id = $this->id;
			$added_by_name = $this->user_obj->getUsername();
			
			mysqli_query($this->con,"insert into posts values('','$body','$added_by_id','$added_by_name','$date','no','no','0')");
			mysqli_query($this->con,"update users SET num_posts = num_posts+1 where id = '$added_by_id'"); 

		}

		//submit my videoposts
		public function submitVideoPost($filepath){
			//insert the post
			$body = "<embed src=\'".$filepath."\' autoplay=\'false\' width=\'420\' height=\'315\'></embed>";
			$date = date("Y-m-d H:i:s");
			$added_by_id = $this->id;
			$added_by_name = $this->user_obj->getUsername();
			
			mysqli_query($this->con,"insert into posts values('','$body','$added_by_id','$added_by_name','$date','no','no','0')");
			mysqli_query($this->con,"update users SET num_posts = num_posts+1 where id = '$added_by_id'"); 

		}
		
		//shared friends' posts
		public function submitSharedPost($shareUsername,$shareContent) {
			$date = date("Y-m-d H:i:s");
			$added_by_id = $this->id;
			$added_by_name = $this->user_obj->getUsername();
			$body = "<strong>Shared from ".$shareUsername.": </strong><br>".$shareContent;
			mysqli_query($this->con,"insert into posts values('','$body','$added_by_id','$added_by_name','$date','no','no','0')"); 	
		}

		//delete my posts
		public function deleteMyPost($request){
			$postId = $request['postId'];
			mysqli_query($this->con,"update posts set deleted = 'yes' where id = '$postId'");
			//check how much post the user has left
			$check_database_query = mysqli_query($this->con, "SELECT id FROM posts WHERE added_by_id='$this->id' and deleted='no'");
			$postNum = mysqli_num_rows($check_database_query);
			return $postNum;
		}

		//load only my posts
		public function loadAllMyPosts($request, $pageSize){
			//get the current page number
			$pageNum = $request['page']; 
			$start = ($pageNum-1)*$pageSize;

			$data = mysqli_query($this->con,"select * from posts where added_by_id='$this->id' and deleted = 'no' order by date DESC limit $start, $pageSize");
			if (mysqli_num_rows($data) >= 1) {
				$outputStr = "";
					//output the data from result set (load post)
					while ($row = mysqli_fetch_array($data)){
						$outputStr .= "
					        <div class='col-sm-12 well post_box' value='".$row['id']."'>
					        	<div class='col-sm-12 post_box_header'>
					        ";
					        //add cross
					        if ($this->id == $row['added_by_id']) {
					        	$outputStr .= "
					        	<a href='#' class='close'
					        	 	data-dismiss='alert'
					        	 	aria-label='close'>
					        	 	<i>×</i>
					        	</a>";
					        }
					        $outputStr .= "</div>";
					        
					        $outputStr .= "
					        	<div class='col-sm-3'>
					        		<a href='profile.php?username=".$this->user_obj->getUsername()."&id=".$this->user_obj->getUserid()."' class='post_info'>
					            		<img src='".$this->user_obj->getProfile_pic()."' class='img-rounded' height='55' width='55' style='margin-bottom:10px;'>
					            		<br>
			        	        			<p>".$this->user_obj->getUsername()."</p>
				          			</a>
						        </div>

						        <div class='col-sm-9 text-left'>
						          	<p class='post_area_p post_p'>sent by ".$this->getTime($row['date'])."</p>
									<p>".$row['text']."</p>
									
					     			<div class='col-sm-12 post_option_box text-left' style='clear:both' value='".$row['id']."'>

					     			<div class='share' style='float:left;'>
										<a class='share_a' style='color: #16a085'>
											<i class='icon-share' aria-hidden='true'></i> share
										</a>
 									</div>

					     			<div class='commentdis' style='float:left; margin-left: 10px'>
									
									<a class='comment_a'>
										<i class='icon-comments-alt' aria-hidden='true'></i> comment
									</a>
								</div>
					            
					            <div class='like'  style='float:left; margin-left: 10px;'> 
						            <a class='like_a'>
					                	<i class='icon-heart-empty' aria-hidden='true'></i> (".$row['likes'].")
					            	</a>
				            ";
				    //--------------add likes-----------------
				    $like_obj = new like($this->con);
				    $likeResultSet= $like_obj->selectLikes($row['id']);
				    while ($like = mysqli_fetch_array($likeResultSet))
				    {
				    	$outputStr .="
				    		<a href='profile.php?username=".$like['username']."&id=".$like['user_id']."'>
				            	<img src='".$like['profile_pic']."' class='img-circle' height='20' width='20' data-toggle='tooltip' data-placement='top' title='".$like['username']."'>
				            </a>
				        ";
				    }
				    //---------------------------------------
				    	$outputStr .="
				    			  </div>
				    			 </div>
				    			</div>

				    			<div class='col-sm-12 comment' style='display:none;'>
					    			<form class='form-horizontal'>
					    				<div class='form-group'>
				    						<div class='col-xs-7 col-sm-8 col-md-10 text-left comment_input_panel'>
				    							<p class='lead emoji-picker-container emoji-container-p'>
	              									<input type='text' class='form-control comment_input' placeholder='comment here...' data-emojiable='true' data-emoji-input='unicode' required>
	            								</p>
	                                        </div>
				    					
				    						<button type='submit' class='btn btn-success'>Reply</button>
										</div>
	 								</form>
 							<div class='col-sm-12 text-left'>
 								";

 					//--------------add comments--------------
 					$comment_obj = new comment($this->con,$this->id);
 					$outputStr .= $comment_obj->selectComments($row['id']);

 					//----------------------------------------
				    	$outputStr .="
				    				</div>
				    			</div>
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
					<br>
					<input type='hidden' class='noMorePosts' value='true'>
					<hr>
					<p>No More to Show</p>
				";
				return $outputStr;
			}
			
		}

		//load one of my friends' posts
		public function loadOneFriendPosts($request, $pageSize, $friend_id){
			//get the current page number
			$pageNum = $request['page']; 
			$start = ($pageNum-1)*$pageSize;


			$data = mysqli_query($this->con,"select * from posts where added_by_id='$friend_id' and deleted = 'no' order by date DESC limit $start, $pageSize");
			if (mysqli_num_rows($data) >= 1) {

				$outputStr = "";
				$friend = new user($this->con, $friend_id);
					//output the data from result set (load post)
					while ($row = mysqli_fetch_array($data)){
						$outputStr .= "
					        <div class='col-sm-12 well post_box' value='".$row['id']."'>
					        	<div class='col-sm-12 post_box_header'>
					        ";

					        $outputStr .= "</div>";
					        
					        $outputStr .= "
					        	<div class='col-sm-3'>
					        		<a href='friend_profile.php?friend_id=".$this->user_obj->getUserid()."' class='post_info'>
					            		<img src='".$this->user_obj->getProfile_pic()."' class='img-rounded' height='55' width='55' style='margin-bottom:10px;'>
					            		<br>
			        	        			<p>".$this->user_obj->getUsername()."</p>
				          			</a>
						        </div>

						        <div class='col-sm-9 text-left'>
						          	<p class='post_area_p post_p'>sent by ".$this->getTime($row['date'])."</p>
									<p>".$row['text']."</p>
									
					     			<div class='col-sm-12 post_option_box text-left' style='clear:both' value='".$row['id']."'>

					     			<div class='share' style='float:left;'>
										<a class='share_a' style='color: #16a085'>
											<i class='icon-share' aria-hidden='true'></i> share
										</a>
 									</div>

					     			<div class='commentdis' style='float:left; margin-left: 10px'>
									
									<a class='comment_a'>
										<i class='icon-comments-alt' aria-hidden='true'></i> comment
									</a>
								</div>
					            
					            <div class='like'  style='float:left; margin-left: 10px;'> 
						            <a class='like_a'>
					                	<i class='icon-heart-empty' aria-hidden='true'></i> (".$row['likes'].")
					            	</a>
				            	
				            ";
				    //--------------add likes-----------------
				    $like_obj = new like($this->con);
				    $likeResultSet= $like_obj->selectLikes($row['id']);
				    while ($like = mysqli_fetch_array($likeResultSet))
				    {
				    	$outputStr .="
				    		<a href='profile.php?username=".$like['username']."&id=".$like['user_id']."'>
				            	<img src='".$like['profile_pic']."' class='img-circle' height='20' width='20' data-toggle='tooltip' data-placement='top' title='".$like['username']."'>
				            </a>
				        ";
				    }
				    //---------------------------------------
				    	$outputStr .="
				    			  </div>
				    			 </div>
				    			</div>

				    			<div class='col-sm-12 comment' style='display:none;'>
					    			<form class='form-horizontal'>
					    				<div class='form-group'>
				    						<div class='col-xs-7 col-sm-8 col-md-10 text-left comment_input_panel'>
				    							<p class='lead emoji-picker-container emoji-container-p'>
	              									<input type='text' class='form-control comment_input' placeholder='comment here...' data-emojiable='true' data-emoji-input='unicode' required>
	            								</p>
	                                        </div>
				    					
				    						<button type='submit' class='btn btn-success'>Reply</button>
										</div>
	 								</form>
 							<div class='col-sm-12 text-left'>
 								";

 					//--------------add comments--------------
 					$comment_obj = new comment($this->con,$_SESSION['id']);
 					$outputStr .= $comment_obj->selectComments($row['id']);

 					//----------------------------------------
				    	$outputStr .="
				    				</div>
				    			</div>
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
					<br>
					<input type='hidden' class='noMorePosts' value='true'>
					<hr>
					<p>No More to Show</p>
				";
				return $outputStr;
			}
		}

		//load all my friends' posts
		public function loadAllFriendsPosts($request, $pageSize){
			//get this current page number
			$pageNum = $request['page']; 
			$start = ($pageNum-1)*$pageSize;

			//get the friends' id of the user 
			$friendsData = mysqli_query($this->con,"SELECT friend_id FROM user_friend WHERE user_id='$this->id' AND block='no' ");
			//if exists any friend
			if (mysqli_num_rows($friendsData) >= 1) {
				//transfer ids to an array
				$friends = array();
				while ($row = mysqli_fetch_array($friendsData)){
					array_push($friends, $row['friend_id']);
				}
				unset($row);
				//add user himself to that array
				array_push($friends,$this->id);

				//dynamicly construct the query language
				$query = "SELECT * FROM posts WHERE (";
				$query.= "added_by_id='$friends[0]'";
				for($i=1; $i<count($friends); $i++){
					$query.=" or added_by_id='$friends[$i]'";
				}
				$query .= ") AND deleted = 'no' order by date DESC limit $start, $pageSize"; 
				
				$data = mysqli_query($this->con,$query);

				/*
				------------------------------------------------
				$data includes all posts from user and his friends
				*/
				if (mysqli_num_rows($data) >= 1) {
					$outputStr = "";
					//output the data from result set (load post)
					while ($row = mysqli_fetch_array($data)) {
						$person = new user($this->con, $row['added_by_id']);
						$outputStr .= "
					        <div class='col-sm-12 well post_box' value='".$row['id']."'>
					        	<div class='col-sm-12 post_box_header'>
					        ";
					        //add cross
					        if ($this->id == $row['added_by_id']) {
					        	$url = "profile.php?username=".$this->user_obj->getUsername()."&id=".$this->user_obj->getUserid();
					        	$outputStr .= "
					        	<a href='#' class='close'
					        	 	data-dismiss='alert'
					        	 	aria-label='close'>
					        	 	<i>×</i>
					        	</a>";
					        }else{
					        	$url = "friend_profile.php?friend_id=".$row['added_by_id'];
					        }
					        $outputStr .= "</div>";
					        
					        $outputStr .= "
					        	<div class='col-sm-3'>
					        		<a href='".$url."' class='post_info'>
					            		<img src='".$person->getProfile_pic()."' class='img-rounded' height='55' width='55' style='margin-bottom:10px;'>
					            		<br>
					            		<p>".$person->getUsername()."</p>
					            	</a>
						      	</div>

						        <div class='col-sm-9 text-left'>
						          	<p class='post_area_p post_p'>sent by ".$this->getTime($row['date'])."</p>
									<p>".$row['text']."</p>
									 			
					     			<div class='col-sm-12 post_option_box text-left' style='clear:both' value='".$row['id']."'>

						     			<div class='share' style='float:left;'>
											<a class='share_a' style='color: #16a085'>
												<i class='icon-share' aria-hidden='true'></i> share
											</a>
	 									</div>

						     			<div class='commentdis' style='float:left; margin-left: 10px'>
											<a class='comment_a'>
												<i class='icon-comments-alt' aria-hidden='true'></i> comment
											</a>
										</div>
					     
							         <div class='like'  style='float:left; margin-left: 10px;'> 
								         <a class='like_a'>
							               <i class='icon-heart-empty' aria-hidden='true'></i> (".$row['likes'].")
							            </a>
				            	
				            ";
				    //--------------add likes-----------------
				    $like_obj = new like($this->con);
				    $likeResultSet= $like_obj->selectLikes($row['id']);
				    while ($like = mysqli_fetch_array($likeResultSet))
				    {
				    	$outputStr .="
				    		<a href='profile.php?username=".$like['username']."&id=".$like['user_id']."'>
				            	<img src='".$like['profile_pic']."' class='img-circle' height='20' width='20' data-toggle='tooltip' data-placement='top' title='".$like['username']."'>
				            </a>
				        ";
				    }
				    //---------------------------------------
				    	$outputStr .="
				    			  </div>
				    			 </div>
				    			</div>

				    			<div class='col-sm-12 comment' style='display:none;'>
					    			<form class='form-horizontal'>
					    				<div class='form-group'>
				    						<div class='col-xs-7 col-sm-8 col-md-10 text-left comment_input_panel'>
					    						<p class='lead emoji-picker-container emoji-container-p'>
	              									<input type='text' class='form-control comment_input' placeholder='comment here...' data-emojiable='true' data-emoji-input='unicode' required>
	            							</p>
	                              </div>
				    						
				    						<button type='submit' class='btn btn-success'>Reply</button>
										</div>
	 								</form>
 								<div class='col-sm-12 text-left'>
 								";
 					//--------------add comments--------------
 					$comment_obj = new comment($this->con,$this->id);
 					$outputStr .= $comment_obj->selectComments($row['id']);

 					//----------------------------------------
				    	$outputStr .="
				    				</div>
				    			</div>
					        </div>
						";
						unset($person);  
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
						<br>
						<input type='hidden' class='noMorePosts' value='true'>
						<hr>
						<p>No More to Show</p>
					";
					return $outputStr;
				}

				//-----------------------------------------------
			
			}else{
				return $this->loadAllMyPosts($request, $pageSize);
			}

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

<script>
	$(function() {
	// Initializes and creates emoji set from sprite sheet
	window.emojiPicker = new EmojiPicker({
	  emojiable_selector: '[data-emojiable=true]',
	  assetsPath: 'assets/emoji_lib/img/',
	  popupButtonClasses: 'icon-smile'
	});
	// Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
	// You may want to delay this step if you have dynamically created input fields that appear later in the loading process
	// It can be called as many times as necessary; previously converted input fields will not be converted again
	window.emojiPicker.discover();
	});
</script>

<script>
	// Google Analytics
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-49610253-3', 'auto');
	ga('send', 'pageview');
</script>