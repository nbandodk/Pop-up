<?php 
require 'config/config.php'; //connect to database 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Pop-up!</title>
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- css including boostrap -->
	<link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>

</head>
<body class="wrapper">

		<nav class="navbar navbar-default navbar-fixed">
			<div class="nav-header">
				<a href="index.php" class="navbar-brand">Pop-up</a>
			</div>
			
			<div class="navbar-collapse collapse" id="list">
				<ul class="nav navbar-nav">
					<li>
						<a href="#"><span class="glyphicon glyphicon-leaf"/>Profile</a>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-list"/> Function
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="CategoryAction?category=Model" class="glyphicon glyphicon-plane"> MM</a></li> 
							<li><a href="CategoryAction?category=Electric" class="glyphicon glyphicon-phone"> SS</a></li>
							<li><a href="CategoryAction?category=Book" class="glyphicon glyphicon-book"> AA</a></li>
							<li><a href="CategoryAction?category=Food" class="glyphicon glyphicon-grain"> WW</a></li>
						</ul>
					</li>
					
					<li><a href="#"><span class="glyphicon glyphicon-phone-alt"/> More</a></li>
				</ul>
			</div>
			
		</nav>
</body>
</html>