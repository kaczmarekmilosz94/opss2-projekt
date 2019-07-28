/// <reference path="Photon/Photon-Javascript_SDK.d.ts"/>
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

var Player = {
  won: null,
	move: null,
	jump: null,
	atack: null,
  lost: null,
  castSkill: null,
  startGame: null
};
var Mob = {
	move: null,
	spawn: null,
	atack: null
};

var myId = null;
var renderer1 = null;
var renderer2 = null;

var _rooms;
var current_mapName;

var DemoWss = this["AppInfo"] && this["AppInfo"]["Wss"];
var DemoAppId = this["AppInfo"] && this["AppInfo"]["AppId"] ? this["AppInfo"]["AppId"] : "<no-app-id>";
var DemoAppVersion = this["AppInfo"] && this["AppInfo"]["AppVersion"] ? this["AppInfo"]["AppVersion"] : "1.0";
var DemoMasterServer = this["AppInfo"] && this["AppInfo"]["MasterServer"];
var ConnectOnStart = true;
var DemoLoadBalancing = /** @class */ (function (_super) {
  __extends(DemoLoadBalancing, _super);

  function DemoLoadBalancing() {
        var _this = _super.call(this, DemoWss ? Photon.ConnectionProtocol.Wss : Photon.ConnectionProtocol.Ws, DemoAppId, DemoAppVersion) || this;

        _this.logger = new Exitgames.Common.Logger("Demo:");
        _this.logger.info("Init", _this.getNameServerAddress(), DemoAppId, DemoAppVersion);
        _this.setLogLevel(Exitgames.Common.Logger.Level.INFO);

        return _this;
    }

  DemoLoadBalancing.prototype.start = function () {

		    this.setupUI();
		    this.setupControl();
        this.myActor().setName(playerName);

        if (ConnectOnStart) {
            if (DemoMasterServer) {
                this.setMasterServerAddress(DemoMasterServer);
                this.connect();
            }
            else {
                this.connectToRegionMaster("EU");
            }
        }
    };
  DemoLoadBalancing.prototype.onError = function (errorCode, errorMsg) {
        this.output("Error " + errorCode + ": " + errorMsg);
    };
  DemoLoadBalancing.prototype.onEvent = function (code, data, options) {

    switch (code) {
      case 1:
        gameWon();
        break;
			case 2:
				Move(data);
        console.log(data);
				break;
			case 3:
				moveMob(data);
				break;
			case 4:
				addMob(data);
				break;
			case 5:
				mobAtack(data);
				break;
			case 6:
				dealDamage(data);
				break;
      case 7:
        gameLost(data);
        break;
      case 8:
        castSkill(data);
        break;
      case 9:
        $('#btn_submit').click();
        break;
      default:
        }
    };
  DemoLoadBalancing.prototype.onStateChange = function (state) {
        var LBC = Photon.LoadBalancing.LoadBalancingClient;

        switch (LBC.StateToName(this.state)) {
          case 'JoinedLobby':
            $('#roomSlotsContainer').show();
            $('#playerSlotsContainer').empty();
            $('#playerSlotsContainer').hide();
            $('#createRoomButton').show();
            $('#leaveRoomButton').hide();
            $('#playerSlotsContainer').empty();
            $('#startGame').hide();
            $('#playerId').val(0);
            break;
          case 'Joined':
            $('#roomSlotsContainer').hide();
            $('#playerSlotsContainer').show();
            $('#createRoomButton').hide();
            $('#leaveRoomButton').show();
            $('#startGame').show();

            break;
          default:

        }
    };
  DemoLoadBalancing.prototype.objToStr = function (x) {
        var res = "";
        for (var i in x) {
            res += (res == "" ? "" : " ,") + i + "=" + x[i];
        }
        return res;
    };
  DemoLoadBalancing.prototype.updateRoomInfo = function () {

    };
  DemoLoadBalancing.prototype.onActorJoin = function (actor) {

    try {
      $('#playerSlotsContainer').empty();
      var _myId = 0;
      for(var _actor in this.myRoomActors()) {
        showPlayer(this.myRoomActors()[_actor].name);
        _myId++;
      }

      if($('#playerId').val()==0) {
        $('#playerId').val(_myId);
      }
      console.log($('#playerId').val());

    } catch (e) {

    } finally {

    }
  }
  DemoLoadBalancing.prototype.onActorLeave = function (actor, cleanup) {

    try {
      if(!actor.isLocal) {
        $('#playerSlotsContainer').empty();

        for(var _actor in this.myRoomActors()) {
          showPlayer(this.myRoomActors()[_actor].name);
        }

        var _myId = $('#playerId').val(1);
        console.log($('#playerId').val());

      }
    } catch (e) {

    } finally {

    }
  }

  DemoLoadBalancing.prototype.onRoomListUpdate = function (rooms, roomsUpdated, roomsAdded, roomsRemoved) {
      _showRooms(rooms);
    };
  DemoLoadBalancing.prototype.onRoomList = function (rooms) {
      _showRooms(rooms);
      try {
        startGame();
        setMap();
        setImages();
      } catch (e) {

      } finally {

      }
    };
  DemoLoadBalancing.prototype.onJoinRoom = function () {
      $("#roomName").val(this.myRoom().name);
    };

	DemoLoadBalancing.prototype.setupControl = function () {
		  var _this = this;

      Player.won = function(data)		{
			_this.raiseEvent(1, data, { receivers: 1 });
		};
		  Player.move = function(data)		{
			_this.raiseEvent(2, data, { receivers: 1 });
		};
		  Mob.move = function(data)		{
			_this.raiseEvent(3, data, { receivers: 1 });
		};
		  Mob.spawn = function(data)		{
			_this.raiseEvent(4, data, { receivers: 1 });
		};
		  Mob.atack = function(data)		{
			_this.raiseEvent(5, data, { receivers: 1 });
		};
		  Player.atack = function(data)		{
			_this.raiseEvent(6, data, { receivers: 1 });
		};
      Player.lost = function(data)    {
      _this.raiseEvent(7, data, { receivers: 1 });
    };
      Player.castSkill = function(data)    {
      _this.raiseEvent(8, data, { receivers: 1 });
    };
      Player.startGame = function()    {
      _this.raiseEvent(9, null, { receivers: 1 });
    };

	};
	DemoLoadBalancing.prototype.setupUI = function () {

    $('#startGame').hide();
    $('#roomSlotsContainer').show();
    $('#playerSlotsContainer').hide();

    $('#createRoomButton').show();
    $('#leaveRoomButton').hide();
	};

  return DemoLoadBalancing;

}(Photon.LoadBalancing.LoadBalancingClient));

var demo;

window.onload = function () {
    demo = new DemoLoadBalancing();
    demo.start();
};

function _showRooms(rooms)  {
		console.log("Got room list update!");
    $("#roomSlotsContainer").empty();

	  if(rooms.length>0) {
      for(var i=0;i<rooms.length;i++)	{
        //var slot = $('<form action="bloody_ice.php" method="POST"><input type="text" name="room_name" value="'+rooms[i].name+'"><input type="submit" value="Join room"></form>');
        var slot = $('<input type="button" value="'+rooms[i].name+'" onclick="_joinRoom(\''+rooms[i].name+'\')"/>');

        $("#roomSlotsContainer").append(slot);
  		}
    }
}
function _createRoom() {
    console.log('creating room');
    demo.createRoom();
}
function _joinRoom(roomName) {
    console.log('joining');
    demo.joinRoom(roomName);
}
function _startGame(roomName) {
    demo.joinRoom(roomName, {createIfNotExists: true});
}
function _leaveRoom(){
  demo.leaveRoom();
}
