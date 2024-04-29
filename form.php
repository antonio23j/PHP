<html>
<head>
<title>Rregjistrimi</title>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet"> -->
</head>
<body>

<body>

        <?php


// connect to database

$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");


if ($mysqli -> connect_errno) {
	
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();

}


if(isset($_POST['add_client'])) {

	if($_POST['add_client']=='yes') {

		$plan = $_POST['plan'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO clients (name,email,phone,message,training_plan,start_date) VALUES ('$name', 
	'$email','$phone','$message','$plan','$date')"; 
        //Nese ka lidhje dhe te dhenat e vendosura jane te gabuara, shfaqet faqja e regjistrimit pa sukses
        if(empty($plan) OR empty($name) OR empty($email) OR empty($phone) OR empty($message)) {?>
			
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
		
	    <a href="login.php" class="login">Register</a>
	
		<div class="clear"></div>
	</div>
	
	<div class="clear"></div>

</header>

<div class="container d-flex justify-content-center">
    <p id="important-header">Regjistrimi i Klientit</p>
</div>

<div>
    <p id="unsuccessful">Regjistrimi ishte i pasuksesshem.</p>
    <span id="unsuccessful-text">Kujdes! Provoni perseri.</span>
</div>
		
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

		
		
<?php  
// Nese ka te dhena te pershtatshme te vendosura, shfaqet faqja me regjistrim te suksesshem.
	} else{  ?> 

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
		
	    <a href="login.php" class="login">Register</a>
	
		<div class="clear"></div>
	</div>
	
	<div class="clear"></div>

</header>

<div class="container d-flex justify-content-center">
                <p id="important-header">Regjistrimi i Klientit</p>
            </div>

        <div>
            <p id="successful">Regjistrimi i suksesshem!</p>
            <span id="successful-text">Ju do te kontaktoheni nga stafi yne per detaje te metejshme!</span>
        </div>
		
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
 
 <?php   
	}

}  
	}
	
?>


</body>
	
</html> 