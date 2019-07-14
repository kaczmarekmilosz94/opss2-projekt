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

<style>
  #map
  {
	overflow: hidden;
	position: absolute;
    width: 100%;
    height: 100vh;
  }
  #bi
  {
    position: absolute;
    left: 50vw;
    top: 80vh;
  }
  #dc
  {
    position: absolute;
    left: 20vw;
    top: 70vh;
  }
  #gd
  {
    position: absolute;
    left: 70vw;
    top: 45vh;
  }
  #pc
  {
    position: absolute;
    left: 35vw;
    top: 50vh;
  }
</style>

<div id="mapUI">
<img id="map"src="images/map.jpg" alt="map">
<button id="bi" type="button" onclick="showRooms('BloodyIce')">Bloody Ice</button>
<button id="dc" type="button" onclick="showRooms('DesertScream')">Desert Scream</button>


<?php
	$map_name='GreenDespair';
 	echo	'<button id="gd" type="button" onclick="showRooms('.$map_name.')">'.$_SESSION['username'].'</button>';
 ?>

<button id="pc" type="button" onclick="showRooms('ParadiseCity')">Paradise City</button>
</div>

<input id="createRoomButton"type="button" value="Create Room" onclick="startRoom('DesertScream')"/></br></br>

<div id="roomSlotsContainer">
</div>



<script>

localStorage.setItem("roomName",null);

function startRoom(name) {
	localStorage.setItem("roomName",name);
	document.location.href = "bloody_ice.html";
}

</script>

<script src="js/main.js"></script>
<script src="js/mobs.js"></script>
<script src="js/scenario.js"></script>
</body>
</html>