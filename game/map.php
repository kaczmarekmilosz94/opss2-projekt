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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.12.1.custom/jquery-ui.theme.css">

<link rel="stylesheet" href="css/style_map.css">
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

		<script>
  $( function() {
    $( "#speed" ).selectmenu();

    $( "#files" ).selectmenu();

    $( "#number" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

    $( "#salutation" ).selectmenu();
  } );

	$( function() {
	    $( "#info" ).dialog();
	} );
  </script>

		<style>
			#btn_submit
			{
				display: none;
			}
		</style>
</head>

<body>

	<div id="info" title="Lobby">
		Here you can find other players rooms and join them or create your own game. ("Show World Map")
	</div>


<div id='lobby'>

	<div id="roomStatsContainer">
		<span> Name </span>	<span> Map </span>	<span> Level </span>	<span> Owner </span>	<span> Slots</span>
	</div>
	<div id="roomSlotsContainer">
	</div>

	<input id="showWorldButton" type="button" value="Show world map" onclick="showWorldMap()"/>
</div>

<div id='startGame'>


	<form id='startForm' method='POST' action='bloody_ice.php'>
		<input id='roomName' name='roomName' type="hidden"  value=''>
		<input type="hidden" id='mapName' name='mapName' value='DesertScream'>
		<input type="hidden" id="playerId" name="playerId" value="0">
		<input type="hidden" id="playersInGame" name="playersInGame" value="0">
		<button id='btn_submit'type="submit" >Start Game</button>
		<button id='btn_start' onclick="start()" >Accept the challenge</button>
	</form>

	<div id="playerSlotsContainer">
	</div>

	<input id="leaveRoomButton" type="button" value="Leave room" onclick="_leaveRoom()"/>
</div>

<div id='worldMap'>
	<div id='creatorPanel'>

			<div id='mapDescription'>
				<span id='mapText'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span>
			<div>

			<div id='optionsPanel'>

				<fieldset>
					<select name="difficulty" id="difLevel">
						<option selected="selected">Easy</option>
						<option>Medium</option>
						<option>Hard</option>
					</select>
				</fieldset>

				<input id="nameRoomfield" placeholder="room name..." type="text"/></br>
				<input id="createRoomButton" type="button" value="Create Room" onclick="_createRoom()"/></br></br>
			</div>


			<div id="ds" class="box">
  			<a onclick="changeMap('DesertScream')" class="btn btn-yellow btn-animation-1">Desert Scream</a>
			</div>
			<div id="bi" class="box">
  			<a onclick="changeMap('BloodyIce')" class="btn btn-white btn-animation-1">Bloody Ice</a>
			</div>
			<div id="gd" class="box">
  			<a onclick="changeMap('GreenDespair')" class="btn btn-green btn-animation-1">Green Despair</a>
			</div>
			<div id="pc" class="box">
  			<a onclick="changeMap('ParadiseCity')" class="btn btn-pink btn-animation-1">Paradise City</a>
			</div>


	</div>
</div>


<script>

	function changeMap(name)
	{
		$('#mapName').val(name);
		var text;

		switch (name) {
			case 'DesertScream':
				text = '<b>Desert Scream</b></br></br> A ruthless continent, with a battle colony located in Pelis desert. A village built on a disused oil field. Ruins were discovered during the exploration of the area. Due to the area many monsters have been disfigured.'
				break;
			case 'GreenDespair':
				text = '<b>Green Despair</b></br></br> Located deep inside a great forest. Once populated by by natives and wild animals. However, as you travel deeper into the forest, mutated monsters and insects dwell.'
				break;
			case 'BloodyIce':
				text = '<b>Bloody Ice</b></br></br> Bloody Ice is located in north Midless. When the land was discovered, there were no survivors left. It is a battle colony, and due to the brutal cold, it is populated with mammals and the undead frequently appear.'
				break;
			case 'ParadiseCity':
				text = '<b>Paradise City</b></br></br> 	A small volcanic island which used to hold prisoners. The island grew in size every day due to the volcanic activity. The land was established as a battle colony by the armies of the Tower of Wise Men'
				break;
			default:
		}
		$('#mapText').html(text);
	}

	function start() {
		Player.startGame();
	}

	function showWorldMap() {
		$('#worldMap').show();
		$('#lobby').hide();
	}

<?php
echo 'var playerName = "'.$_SESSION["username"].'";';
?>
  function showPlayer(_playerName) {
		var player = '<p>'+_playerName+'</p>'
		$('#playerSlotsContainer').append(player);
	}

</script>

</body>
</html>
