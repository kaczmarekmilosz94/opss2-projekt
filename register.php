<?php
	session_start();

	if(isset($_SESSION['logged']))
	{
		if($_SESSION['logged'])
		{
			header("Location:index.php");
			exit();
		}
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
				<a class="nav-link" href="register.php">Register</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.php">Login</a>
			</li>
		</ul>
	</div>
</div>
</nav>



<!--- Jumbotron -->
<div class="container-fluid">
<div class="jumbotron row text-center padding">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<p class="lead">
			<form action="registered.php" method="post">
				Username: <br/><input type="text" name="username" minlength="8" maxlength="20"/><br/>
				Password: <br/><input type="password" name="password" minlength="8" maxlength="20"/><br/>
				Repeat password: <br/><input type="password" name="password2" minlength="8" maxlength="20"/><br/>
				Email: <br/><input type="email" name="email"/><br/><br/>
				<input type="submit" value="Register"/>
			</form>

			<?php
				if(isset($_GET['err']))
				{
						echo "</br>".$_GET['err'];
				}
			?>
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
		<a href="https://www.facebook.com/Fizyka.UMK"><i class="fab fa-facebook"></i></a>
		<a href="https://twitter.com/UMK_Torun"><i class="fab fa-twitter"></i></a>
		<a href="https://www.instagram.com/umktorun/?hl=pl"><i class="fab fa-instagram"></i></a>
		<a href="https://www.youtube.com/channel/UC-ZD4xewND1TJD8cEQE9Eaw"><i class="fab fa-youtube"></i></a>
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
		<a href="http://wwwold.fizyka.umk.pl/~296759/rakieta/">Rocket calculator</a></br></br>
		<a href="https://www.youtube.com/channel/UCURnKLB6e6D3lMFoL_U1MNA">Chronicles of Shinobi</a></br></br>
		<a href="http://wwwold.fizyka.umk.pl/~296759/kolo/kolo.html">Angle calculator</a></br></br>
		<a href="http://wwwold.fizyka.umk.pl/~296759/snake/snake.html">Snake The Game</a></br></br>
	</div>
	<div class="col-md-4">
		<h5>Useful links</h5>
		<hr class="light">
		<a href='game.php'>Your account</a></br></br>
		<a href='index.php'>Home</a></br></br>
	</div>
	<div class="col-12">
		<hr class="light">

	</div>
</div>
</div>
</footer>

</body>
</html>
