<?php 
require 'config/config.php'; //connect to database 
require 'includes/form_handlers/home_handler.php';
?>

<html>
<head>
	<title>Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']  ?> !</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/home.js"></script>

	<!-- css including boostrap -->
	<link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/Bootstrap/js/bootstrap.min.js"></script>
	<style>    
	    /* Set black background color, white text and some padding */
	    footer {
	      background-color: #555;
	      color: white;
	      padding: 15px;
	    }
	</style>
</head>
<body>
	<!--navigation bar-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Pop-up</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="home.php"><span class=" glyphicon glyphicon-home"></span> Home</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
	        <li><a href="<?php echo $user['username'].'/'.$user['id']; ?>"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
	      </ul>

	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="includes/form_handlers/logout_handler.php"><span class=" glyphicon glyphicon-off"></span> Logout</a></li>
	      </ul>

	      <form class="navbar-form navbar-right" role="search">
	        <div class="form-group input-group">
	          <input type="text" class="form-control" placeholder="Search..">
	          <span class="input-group-btn">
	            <button class="btn btn-default" type="button">
	              <span class="glyphicon glyphicon-search"></span>
	            </button>
	          </span>        
	        </div>
	      </form>
	    </div>
	  </div>
	</nav>
  
  	<!--body-->
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 well">
	      <div class="well">
	        <a href="<?php echo $user['username'].'/'.$user['id']; ?>">
	        	<img src="<?php echo $user['profile_pic'] ?>" class="img-circle" height="65" width="65">
	        	<br>
	        	<?php echo $user['username'] ?>
	        </a>
	      </div>

	      <div class="well">
	        <p>My Posts (<?php echo $user['num_posts'] ?>)</p>
	        <p>My friends (<?php echo $user['num_posts'] ?>)</p>
	        <p>
	          <span class="label label-default">News</span>
	          <span class="label label-primary">W3Schools</span>
	          <span class="label label-success">Labels</span>
	          <span class="label label-info">Football</span>
	          <span class="label label-warning">Gaming</span>
	          <span class="label label-danger">Friends</span>
	        </p>
	      </div>

	      <div class="alert alert-success fade in">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	        <p><strong>Ey!</strong></p>
	        People are looking at your profile. Find out who.
	      </div>
	      <p><a href="#">Link</a></p>
	      <p><a href="#">Link</a></p>
	      <p><a href="#">Link</a></p>
	    </div>

	    <div class="col-sm-7">
	    
	      <div class="row">
	        <div class="col-sm-12">
	          <div class="panel panel-default text-left">
	            <div class="panel-body">
	            	<form action="includes/form_handlers/post_handler.php" method="POST">
	            	   <textarea class="form-control" name="home_post" placeholder="Share your life here..." value="<?php if(isset($_SESSION['home_post']))echo $_SESSION['home_post']; ?>" required></textarea>
	            	  <br>
		              <button type="submit" class="btn btn-default btn-sm">
		                <span class="glyphicon glyphicon-thumbs-up"></span> Add Photo
		              </button> 
		              <button type="submit" class="btn btn-default btn-sm">
		                <span class="glyphicon glyphicon-thumbs-up"></span> Post
		              </button>
	            	</form>
	            </div>
	          </div>
	        </div>
	      </div>
	    
	      <div class="posts_area"></div>
		  <img id="loadingIcon" src="assets/images/icons/loading.gif">
	    </div>

	    <div class="col-sm-2">
	    </div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>

	<script>
		$(document).ready(function() {

			$('#loadingIcon').show();
			<?php $_SESSION['Loading'] = 'true' ?>
			//ajax request for loading posts 
			$.ajax({
				url: "includes/form_handlers/post_handler.php",
				type: "POST",
				data: "page=1",
				cache: false,

				success: function(returnedData) {
					$('#loadingIcon').hide();
					//add returned date to the post area
					$('.posts_area').html(returnedData);
					return false;
				}
			});

			//do it if scroll up or down
			$(window).scroll(function() {
				var pageNum = $('.posts_area').find('.nextPage').val();
				var noMorePosts = $('.posts_area').find('.noMorePosts').val();

				//if the height of the browser window + scrolled height == total height that can be scorlled
				if((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
					//start ajax request again
					$('#loadingIcon').show();
					$('.posts_area').find('.nextPage').remove(); //Removes current input
					$('.posts_area').find('.noMorePosts').remove(); //Removes hidden input
					//do ajax request
					var ajaxReq = $.ajax({
						url: "includes/form_handlers/post_handler.php",
						type: "POST",
						data: "page="+pageNum,
						cache: false,

						success: function(returnedData) {
							$('#loadingIcon').hide();
							$('.posts_area').append(returnedData);
						}
					});
				}

				return false;

			}); //End (window).scroll(function())
		});
	</script>
</body>
</html>