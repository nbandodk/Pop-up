<html>
	<head>
		<title>Welcome to Pop-up!</title>
		<link rel="stylesheet" type="text/css" href="assets/css/newregister_style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="assets/js/register.js"></script>
		<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="login_box">
				<div class="login_header">
					<h1>Welcome to Pop-up</h1>
					<h2>Login or sign up below.</h2>
				</div>
				
				<div class="first">
					<form action="register.php">
						<input type="email" name="log_email" placeholder="Email address">
						<br>
						<input type="password" name="log_password" placeholder="Password">
						<br>
						<input type="submit" name="login_button" value="Login">
						<br>
						<a href="#" id="signup" class="signup">Need an account? Sign up here!</a>
					</form>
				</div>
				
				<div class="second">
					<form action="register.php" method="POST">
						<input type="text" name="reg_fname" placeholder="First Name" required>
						<br>
						<input type="text" name="reg_lname" placeholder="Last Name" required>
						<br>
						<input type="password" name="reg_pwd1" placeholder="Password" required>
						<br>
						<input type="password" name="reg_pwd2" placeholder="Confirm Password" required>
						<br>
						<input type="email" name="reg_email1" placeholder="Email" required>
						<br>
						<input type="email" name="reg_email2" placeholder="Confirm Email" required>
						<br>
						<input type="submit" name="register_button" value="Register">
						<br>

						<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
					</form>
				</div>
			</div>

			<div class="animation">
<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>   
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="assets/images/desktop1.jpg" alt="First slide">
			<div class="carousel-caption">标题 1</div>
		</div>
		<div class="item">
			<img src="assets/images/desktop1.jpg" alt="Second slide">
			<div class="carousel-caption">标题 2</div>
		</div>
		<div class="item">
			<img src="assets/images/desktop1.jpg" alt="Third slide">
			<div class="carousel-caption">标题 3</div>
		</div>
	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel" 
	   data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#myCarousel" 
	   data-slide="next">&rsaquo;</a>
</div>
			</div>
		</div>
	</body>
</html>