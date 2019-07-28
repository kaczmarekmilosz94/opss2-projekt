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
    }

    echo
    '<script>
      var playerName = "'.$_SESSION["username"].'";
        console.log(playerName  );

      function startGame() {
        _startGame("'.$roomName.'");
        mapId = "'.$mapName.'";
        myId = '.$playerId.';

      }
    </script>';
   ?>

<div id="gameObjects">

	<img src="" id="game_background" alt="game_background">

	<div class="playerRenderer2">
		<img src="images/player2.png" id="player2" class="player" alt="player2">
	</div>

</div>

<div class="playerRenderer1">
	<img src="images/player1.png" id="player1" class="player" alt="player1">
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

</div>

<script src="js/skill.js"></script>
<script src="js/items.js"></script>
<script src="js/main.js"></script>
<script src="js/mobs.js"></script>
<script src="js/scenario.js"></script>
</body>
</html>
