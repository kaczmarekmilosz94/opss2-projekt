<?php
	session_start();
	if(isset($_SESSION['logged']))
	{
		if($_SESSION['logged'])
		{

		}
		else
		{
			header("Location:login.php");
			exit();
		}
	}
	else
	{
		header("Location:login.php");
		exit();
	}
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
						echo "<a class='nav-link' href='logout.php'>Logout</a>";
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
						echo "<a class='nav-link' href='game.php'><b>".$_SESSION['username']."</b></a>";
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


<style>
    #iframe { width: 78vw; height: 43vw; border: 1px solid black; }
</style>

<!--- Jumbotron -->
<div class="container-fluid">
<div class="jumbotron row text-center padding">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<p class="lead">

			<iframe id="iframe" src="game/index.php"></iframe>

		</p>
	</div>
</div>
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
