<?php
	session_start();

	session_unset();

	header('Location: index.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OPSS2 Projekt MK</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>


<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
				<?php
				if(isset($_SESSION['logged']))
				{
					if($_SESSION['logged'])
						echo "<a class='nav-link' href='login.php'>Logout</a>";
					else
						echo "<a class='nav-link' href='register.php'>Register</a>";
				}
				else
					echo "<a class='nav-link' href='register.php'>Register</a>";
				?>
			</li>
			<li class="nav-item">
				<?php
				if(isset($_SESSION['logged']))
				{
					if($_SESSION['logged'])
						echo "<a class='nav-link' href='game.php'>".$_SESSION['username']."</a>";
					else
						echo "<a class='nav-link' href='login.php'>Login</a>";
				}
				else
					echo "<a class='nav-link' href='login.php'>Login</a>";
				?>
			</li>
		</ul>
	</div>
</div>
</nav>


<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
	<li data-target="#slides" data-slide-to="0" class="active"></li>
	<li data-target="#slides" data-slide-to="1" ></li>
	<li data-target="#slides" data-slide-to="2" ></li>
</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="images/background.png">
		<div class="carousel-caption">
			<h1 class="display-2">Magic Journey</h1>
			<hr>
			<h3>Multiplayer Online Action Game</h3>
			<br/>
			<br/>
			<button type="button" class="btn btn-outline-light btn-lg" href="register.php">Register</button>
			<button type="button" class="btn btn-primary btn-lg" href="login.php">Play Now!</button>
		</div>
	</div>
	<div class="carousel-item">
		<img src="images/background2.jpg">
	</div>
	<div class="carousel-item">
		<img src="images/background3.jpg">
	</div>

</div>
</div>

<!--- Jumbotron -->
<div class="container-fluid">
<div class="row jumbotron">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
		<p class="lead">
			The complete source code of my project can be found on my github.
			Please feel free to check it out. Just click the button next to.
		</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
		<a href ="#"><button type="button" class="btn btn-outline-secondary btn-lg">Github source code</button></a>
	</div>
</div>
</div>



<!--- Three Column Section -->
<div class="container-fluid padding">
<div class="row text-center padding">

	<div class="col-12">
		<h1 class="display-5">Powered by</h1>
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-4">
		<input type="image" src="images/bootstrap-logo.png" onclick="location.href='https://getbootstrap.com/';"  height="70"/>
		<h3>BOOTSTRAP</h3>
		<p>Open source toolkit for developing.</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4">
		<input type="image" src="images/photon-logo.png" onclick="location.href='https://www.photonengine.com/';" height="70"/>
		<h3>Photon Engine</h3>
		<p>The world's #1 independent networking engine and multiplayer platform </p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		<input type="image" src="images/jquery-logo.png" onclick="location.href='https://jquery.com/';"  height="70"/>
		<h3>jQuery</h3>
		<p>Fast, small, and feature-rich JavaScript library.</p>
	</div>
</div>
<hr class="my-4">
</div>



<!--- Connect -->
<div class="container-fluid padding">
<div class="row text-center">
	<div class="col-12">
		<h2>Social media</h2>
	</div>
	<div class="col-12 social padding">
		<a href="#"><i class="fab fa-facebook"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-instagram"></i></a>
		<a href="#"><i class="fab fa-youtube"></i></a>
	</div>
</div>
</div>

<!--- Footer -->
<footer>
<div class="container-fluid padding">
<div class="row text-center">
	<div class="col-md-4">
		<img src="images/logo_bw.png">
		<hr class="light">
		<p>Milosz Kaczmarek IS I Index: 296759</p>
		<p>kaczmarekmilosz94@gmail.com</p>
		<p>Nicolaus Copernicus University</p>
		<p>Toruń, Poland</p>
	</div>
	<div class="col-md-4">
		<h5>Other products</h5>
		<hr class="light">
		<p>Rocket calculator</p>
		<p>Photon chat</p>
		<p>Angle calculator</p>
		<p>Snake The Game</p>
	</div>
	<div class="col-md-4">
		<h5>Useful links</h5>
		<hr class="light">
		<p>Your Account</p>
		<p>Newsletter</p>
		<p>Help</p>
		<p>Home</p>
	</div>
	<div class="col-12">
		<hr class="light">
		<h5>© 2019 Copyright: MKProjects.com</h5>
	</div>
</div>
</div>
</footer>

</body>
</html>
