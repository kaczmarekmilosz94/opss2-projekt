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

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];

	if($username == '') {
		header("Location:register.php");
		exit();
	}
	if($password == '') {
		header("Location:register.php");
		exit();
	}
	if($password2 == '') {
		header("Location:register.php");
		exit();
	}
	if($email == '') {
		header("Location:register.php");
		exit();
	}

	try
	{
		$db = new PDO('sqlite:game_PDO.sqlite');

		$sql1 = "SELECT * FROM users WHERE username='$username'";
		$sql2 = "SELECT * FROM users WHERE email='$email'";

		$err1=0;
		$err2=0;

		if($result1 = $db->query($sql1))
		{
			foreach($result1 as $row)
			{
				$err1=1;
			}
		}
		if($result2 = $db->query($sql2))
		{
			foreach($result2 as $row)
			{
				$err2=1;
			}
		}

		if($err1==1)
		{
			$comment = 'Username already taken';
			header("Location:register.php?err=".$comment);
		}
		else if($err2==1)
		{
			$comment = 'Email already taken';
			header("Location:register.php?err=".$comment);
		}
		else if($password == $password2)
		{
			$sql = "INSERT INTO users (username, password, email, nickname, class)
			VALUES('$username','$password','$email',null, null)";

			if($db->query($sql))
			{
				$comment = 'Successfully registered!';
				header("Location:login.php?comment=".$comment);
			}
			else
			{
				$comment = 'Could not register the account';
				header("Location:register.php?err=".$comment);
			}
		}
		else
		{
			$comment = 'Password does not match';
			header("Location:register.php?err=".$comment);
		}

		$db=null;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
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
			<form action="logged.php" method="post">
				Username: <br/><input type="text" name"username"/><br/>
				Password: <br/><input type="password" name"username"/><br/><br/>
				<input type="submit" value="Login"/>
			</form>
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
