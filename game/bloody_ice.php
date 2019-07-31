<?php
  session_start();
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Test</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/jquery-ui-1.12.1.custom/jquery-ui.theme.css">

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

  <?php
    $roomName;

    if(isset($_POST['roomName'])){
      $roomName = $_POST['roomName'];
      $mapName = $_POST['mapName'];
      $playerId = $_POST['playerId'];
      $playersInGame = $_POST['playersInGame'];
    }

    echo
    '<script>
      var playerName = "'.$_SESSION["username"].'";
      var roomName = "'.$roomName.'";
      var playersInGame = "'.$playersInGame.'";

      function startGame() {
        _startGame("'.$roomName.'");
        mapId = "'.$mapName.'";
        myId = '.$playerId.';

      }
    </script>';
   ?>
<script>
  $( function() {
    $( "#info" ).dialog();
  } );
</script>

<div id="info" title="Lobby">
  Moving -> arrows</br>
  Atack -> space</br>
  Skill1 (if equiped) -> Z</br>
  Skill2 (if equiped) -> X</br>
  Elixir (if equiped) -> C</br>
</div>

<div id="gameObjects">
	<img src="" id="game_background" alt="game_background">

	<div id='playerRenderer2' class="rendererWarrior">
		<img src="images/player2.png" id="player2" class="Warrior" alt="player2">
	</div>
</div>

<div id="playerRenderer1" class="rendererMage">
	<img src="images/player1.png" id="player1" class="Mage" alt="player1">
</div>

<div class='GUI'>
  <div id='hp_bar'></div>
  <div id='mp_bar'></div>

  <div id="skills_bar">
    <div id='skill1'><div id='skill1_cd'></div></div>
    <div id='skill2'><div id='skill2_cd'></div></div>
    <div id='elixir'><div id='elixir_cd'></div></div>
  </div>
</div>

<div id='gameLog'>
  <h4>Congratulations!</h4></br>
  <p>You have finished the dungeon</p>
  <p>and got 200g as a reward.</p></br>
  <button id='backToRoom'onclick='backToRoom()'>OK</button>
</div>


<script src="js/skill.js"></script>
<script src="js/items.js"></script>
<script src="js/main.js"></script>
<script src="js/mobs.js"></script>
<script src="js/scenario.js"></script>
</body>
</html>
