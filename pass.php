<?php 
require 'config/config.php'; //connect to database 
require 'includes/form_handlers/pass_handler.php';
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
	<div id="first">
						<form action="pass.php" method="POST">
							
							<?php if(in_array("<span style='color:#14C800;'>Password changed successfully!</span><br>", $error_array)) echo "<span style='color:#14C800;'>Password changed successfully!</span><br>"; ?>
							<?php if(in_array("<span style='color:#14C800;'>Password could not be changed :(</span><br>", $error_array)) echo "<span style='color:#14C800;'>Password could not be changed :(</span><br>"; ?>
							<input type="password" name="password2" placeholder=" New Password" required><br>
							<!-- <input type="submit" name="login_button" value="Login"><br> -->
							<button type="submit" class="btn" name="change_pass_button">Change Password</button><br>
							

							<br>
						</form>
					</div>

	
</body>
</html>