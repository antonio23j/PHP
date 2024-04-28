<?php

ini_set('display_errors', 0); // hide php notices and errors

// connect to database

$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");

if ($mysqli -> connect_errno) {
	
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();

}

if(isset($_POST['admin_login'])) {

	if($_POST['admin_login']=='yes') {
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) OR empty($password)) {
			
			$error_message = '<h3 class="error">Username dhe password jane te detyrueshme</h3>';
		
		}
		
		else {

			$sql = "SELECT id_admin, level FROM admins WHERE username='$username' AND password='$password'";
			$result = $mysqli->query($sql);
			$record = $result->fetch_array();
			
			if(!is_numeric($record['id_admin'])) {
				
				$error_message = '<h3 class="error">Kredencialet nuk perputhen</h3>';

			}
			
			else {

				setcookie('logedin', $record['level']);
				header('location: '.$record['level'].'.php');
				
				exit;

			}
		
		}

	}

}

?>

<html>
<head>
<title>Admin Log In</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<body>

<header id="top">

	<div class="main">
		
		<nav class="main-menu">
		
			<ul>

			    <li>Ngotot</li>
				<li><a href="http://localhost/palestra_ime/">Home</a></li>
				<li><a href="http://localhost/palestra_ime/#about">About</a></li>
				<li><a href="http://localhost/palestra_ime/#service">Service</a></li>
				<li><a href="http://localhost/palestra_ime/#pricing">Pricing</a></li>
				<li><a href="http://localhost/palestra_ime/#footer">Help</a></li>
			
			</ul>
		
		</nav>
	
		<div class="clear"></div>
	</div>
	
	<h1> Administrator Login </h1>
	
	<div class="clear"></div>

</header>

<section id="form">

	<form class="control" method="post">
		
		<input type="hidden" name="admin_login" value="yes" />
		
		<?php
			
			if($error_message) { echo $error_message; }
			else {
				
				?>
	
	    <p>Admin Login</p>
		
        <span class="sub-label">The sky was cloudless and of a deep dark blue. The</span>
				
				<?php
		
			}
		
		?>

			<div class="element">
			
				<input type="text" placeholder="Username" name="username" >

				<input type="password" placeholder="Password" name="password">
				
			</div>

		<button type="submit">LOGIN</button>
	
	</form>
	
</section>

<section id="footer">


<div class="grid grid20-20-20-20-20">
		
			<div class="column column20">
			
			<h4>Ngoto</h4>
			
			<ul class="social">

				<li><a href="#"><img src="images/img8.png"/></a></li>
				<li><a href="#"><img src="images/img8.png"/></a></li>
				<li><a href="#"><img src="images/img8.png"/></a></li>
				
			</ul>
			
			</div>
			
			<div class="column column20">
			
				<h4>Company</h4>
				
				<ul class="footer-menu">

					<li><a href="#">About</a></li>
					<li><a href="#">Career</a></li>
					<li><a href="#">Partner</a></li>
					<li><a href="#">Press</a></li>
					<li><a href="#">Features</a></li>

				</ul>
			
			</div>
			
			
			<div class="column column20">
			
				<h4>Features</h4>
				
				<ul class="footer-menu">

					<li><a href="#">Private</a></li>
					<li><a href="#">Trainers</a></li>
					<li><a href="#">Workout</a></li>
					<li><a href="#">Join</a></li>

				</ul>
				
			</div>
			
			<div class="column column20">
			
				<h4>About us</h4>
				
				<ul class="footer-menu">
				
					<li><a href="#">Who are we</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">FA</a></li>
					
				</ul>
				
			</div>
			
			<div class="column column20 last">
			
				<h4>Contact</h4>
				
				<ul class="footer-menu">
				
					<li><a href="#">(684) 555-0102</a></li>
					<li><a href="#">Ngotot@email.com</a></li>
					<li><a href="#">4517 Washington </br> Manchester</a></li>
					
				</ul>
				</div>
			</div>
		
		<p>Copyright 2021 - All right.</p>
				 
		<div class="clear"></div>
</section>

</body>

</html>