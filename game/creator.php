<?php
	session_start();
 ?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Test</title>
  <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
creator

<form action='created.php' method="post">
	<input type='radio' name='class' value='mage' checked/>Mage</br>
	<input type='radio' name='class' value='warrior' checked/>Warrior</br>
	</br>
	Name</br>
	<input type="text" name='nickname' placeholder='your name' minlength='4' maxlength='16'/></br>
	</br>
	<input type="submit" value="Create"/>
</form>

</body>
</html>