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
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>

</head>
<body>
	Hello <?php  echo $_SESSION['username']?>
</body>
</html>