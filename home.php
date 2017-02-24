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

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Pop-up</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="home.php"><span class=" glyphicon glyphicon-home"></span> Home</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
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
  
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 well">
	      <div class="well">
	        <img src="<?php echo $profile_pic ?>" class="img-circle" height="65" width="65">
	      </div>
	      <div class="well">
	        <p><a href="#">Interests</a></p>
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
	              <p contenteditable="true">Status: Feeling Blue</p>
	              <button type="button" class="btn btn-default btn-sm">
	                <span class="glyphicon glyphicon-thumbs-up"></span> Like
	              </button>     
	            </div>
	          </div>
	        </div>
	      </div>
	      
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>John</p>
	           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Bo</p>
	           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Jane</p>
	           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Anja</p>
	           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>     
	    </div>
	    <div class="col-sm-2 well">
	      <div class="thumbnail">
	        <p>Upcoming Events:</p>
	        <img src="paris.jpg" alt="Paris" width="400" height="300">
	        <p><strong>Paris</strong></p>
	        <p>Fri. 27 November 2015</p>
	        <button class="btn btn-primary">Info</button>
	      </div>      
	      <div class="well">
	        <p>ADS</p>
	      </div>
	      <div class="well">
	        <p>ADS</p>
	      </div>
	    </div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>
</body>
</html>