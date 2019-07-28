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

<link rel="stylesheet" href="css/style_index.css">
  <!-- Photon Libs -->
      <script type="text/javascript" src="Photon/3rdparty/swfobject.js"></script>
    <script type="text/javascript" src="Photon/3rdparty/web_socket.js"></script>
    <!--lib--><script type="text/javascript" src="Photon/Photon-Javascript_SDK.js"></script>
    <!--info (optional)--><script type="text/javascript" src="cloud-app-info.js"></script>
    <script type="text/javascript" src="app2.js"></script>
    <script type="text/javascript">
        WEB_SOCKET_SWF_LOCATION = "Photon/3rdparty/WebSocketMain.swf";
        WEB_SOCKET_DEBUG = false;
    </script>

</head>

<body>


<input id="createRoomButton" type="button" value="Create Room" onclick="_createRoom()"/></br></br>
<input id="leaveRoomButton" type="button" value="Leave room" onclick="_leaveRoom()"/></br></br>


<div id='startGame'>
	<form method='POST' action='bloody_ice.php'>
		<input id='roomName' name='roomName' type="text"  value='' readonly>
		<input type="text" name='mapName' value='DesertScream' readonly>
		<input type="hidden" id="playerId" name="playerId" value="0">
		<button id='btn_submit'type="submit" >Start Game</button>
	</form>
</div>

<button onclick="test123()" >Start Game</button>

<script>
	function test123() {
		Player.startGame();
	}
</script>

<div id="roomSlotsContainer">
</div>

<div id="playerSlotsContainer">
</div>

<script>
	<?php
	echo 'var playerName = "'.$_SESSION["username"].'";';
	?>
	console.log('name: '+playerName);

	function showPlayer(_playerName) {
		var player = '<p>'+_playerName+'</p>'
		$('#playerSlotsContainer').append(player);
	}
</script>

</body>
</html>
