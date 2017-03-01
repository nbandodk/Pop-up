<?php 
require 'config/config.php'; //connect to database 
require 'includes/form_handlers/profile_handler.php';
?>

<html>
<head>
	<title><?php if(isset($_SESSION['username'])) echo $_SESSION['username']  ?>'s Profile </title>

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
	<?php echo $_GET['username'] ?>
	<?php echo $_GET['id'] ?>
	<br>
	<?php echo $_SESSION['username'] ?>
	<?php echo $_SESSION['id'] ?>
</body>
</html>