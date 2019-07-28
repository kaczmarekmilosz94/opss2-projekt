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
//// functions

var PhotonSide = {

	createNewRoom: null,
	joinThisRoom: null
};

var Player = {
  won: null,
	move: null,
	jump: null,
	atack: null,
  lost: null,
  castSkill: null
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
        // connect if no fb auth required
        if (ConnectOnStart) {
            if (DemoMasterServer) {
                this.setMasterServerAddress(DemoMasterServer);
                this.connect();
            }
            else {
                this.connectToRegionMaster("EU");
				        //$("#createRoomButton").hide();
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
      default:
        }
    };
    DemoLoadBalancing.prototype.onStateChange = function (state) {
        var LBC = Photon.LoadBalancing.LoadBalancingClient;

    };
    DemoLoadBalancing.prototype.objToStr = function (x) {
        var res = "";
        for (var i in x) {
            res += (res == "" ? "" : " ,") + i + "=" + x[i];
        }
        return res;
    };
    DemoLoadBalancing.prototype.updateRoomInfo = function () {
		console.log("room info update");
    };
  /*  DemoLoadBalancing.prototype.onActorPropertiesChange = function (actor) {
    };
    DemoLoadBalancing.prototype.onMyRoomPropertiesChange = function () {
    };*/
    DemoLoadBalancing.prototype.onRoomListUpdate = function (rooms, roomsUpdated, roomsAdded, roomsRemoved) {
        _rooms = rooms;
    };
    DemoLoadBalancing.prototype.onRoomList = function (rooms) {

		var _this = this;

		console.log("got room list");

		_rooms = rooms;


		if(localStorage.getItem("roomName")=="DesertScream" ||
       localStorage.getItem("roomName")=="GreenDespair" ||
       localStorage.getItem("roomName")=="BloodyIce" ||
       localStorage.getItem("roomName")=="ParadiseCity") {

       var rand = Math.floor((Math.random() * 99999) + 10000);
	   current_mapName = localStorage.getItem("roomName");

			_this.createRoom(localStorage.getItem("roomName") + " " + rand);
			myId = 1;
		}else {
			_this.joinRoom(localStorage.getItem("roomName"));
			myId = 2;
		}
		  try {
        setImages();
    		setMap();
      } catch (e) {

      } finally {

      }
    };

    DemoLoadBalancing.prototype.onJoinRoom = function () {

    };

	DemoLoadBalancing.prototype.setupControl = function () {
		var _this = this;

// Setup player and mob functions

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
	};

	DemoLoadBalancing.prototype.setupUI = function () {
		var _this = this;


	};

    return DemoLoadBalancing;
}(Photon.LoadBalancing.LoadBalancingClient));
var demo;
window.onload = function () {
    demo = new DemoLoadBalancing();
    demo.start();
};

function showRooms(name){
		console.log("got room list update");

		$("#mapUI").hide();
		$("#createRoomButton").show();
    $("#roomSlotsContainer").empty();
		$("#createRoomButton").attr('onclick', 'startRoom("'+name+'")');

		    for(var i=0;i<_rooms.length;i++)	{

					var words;

					for (var j=0;j<_rooms[i].name.length;j++)
					{
						words = _rooms[i].name.split(" ");
					}
			        if(words[0] == name)
					{
						var slot= $('<input type="button" value="'+_rooms[i].name+'" onclick="startRoom(\''+_rooms[i].name+'\')"/>');

						localStorage.setItem("mapName",name);

						$("#roomSlotsContainer").append(slot);
					}
		    }
}

//PhotonSide.joinThisRoom(localStorage.getItem("roomName"));
