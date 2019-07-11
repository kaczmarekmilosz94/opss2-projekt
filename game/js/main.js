//// GAME SETTINGS ////

var isMoving = false;
var p1_Position = 0;
var p2_Position = 0;
var p1_HP = 100;
var p2_HP = 500;

var isAtacking = false;

var renderer1 = '.playerRenderer1';
var renderer2 = '.playerRenderer2';

var mapId = 0;

var mobQueue = 0;
var spawnPos = 100;
var arrMobs = [];

var finish_point = 200;



///////////////////////////////////////////

//// SET PLAYERS POSITION ////

$('.playerRenderer1').animate({left: '30vw', top: '34vw'});
$('.playerRenderer2').animate({left: '30vw',top: '34vw'});


///////////////////////////////////////////

//// KEY BINDINGS ////

$(document).keydown(keyboardSupport);

function keyboardSupport(event)
{
	var direction;
  
	if((event.key == 'a'|| event.key == 'A')&&!isMoving) {
		if(p1_Position > 0) p1_Position -= 10;
		
		var data = {position: p1_Position, direction: 1 , senderId: myId};
		Player.move(data);
		isMoving = true;
	}
  
	else if((event.key == 'd'|| event.key == 'D')&&!isMoving) {
		if(p1_Position < finish_point) p1_Position+=10;
		
		var data = {position: p1_Position, direction: -1 , senderId: myId};
		Player.move(data);
		mobSpawner();
		isMoving = true;
	}
	
	else if(event.keyCode == 32 && isAtacking == false) {		
				
		for(let i=0;i<arrMobs.length; i++){
			
			var mobPos = $( arrMobs[i].ID ).position().left*100/window.innerWidth;
			
			if(Math.abs(mobPos-p1_Position-30)<=16){
				
				isAtacking = true;
				
				var data = {mobId: i, damage: 50};
				Player.atack(data);
				
				console.log(Math.abs(mobPos-p1_Position-30));
			}
		}			
	}
	
	if(p1_Position >= finish_point) console.log("Level completed!"); // finish game
}

///////////////////////////////////////////


//// REACTION NODE FUNCTIONS ////

function setImages(){	
	if(myId == 2){
		$(".playerRenderer1").before($(".playerRenderer2"));
		$("#game_background").after($(".playerRenderer1"));
		
		
		renderer1 = '.playerRenderer2';
		renderer2 = '.playerRenderer1';
	}
}

function Move(data){	
	if(data.senderId == myId) {

		$('#gameObjects').animate(
				{ left: '-'+data.position+'vw'},
				{duration: 250,
				easing: 'linear'
				}
			);
		
		if(data.direction>0)
			$(renderer1).addClass('flipped');
		else
			$(renderer1).removeClass('flipped');
	} 
	
	else {
		
	p2_Position = 30+data.position
console.log(p2_Position);	
		
	$(renderer2).animate(
			{ left: '+'+p2_Position+'vw'},
			{duration: 250,
			easing: 'linear'
			}
		);	
	
		if(data.direction>0)
			$(renderer2).addClass('flipped');
		else
			$(renderer2).removeClass('flipped');
	}
	
	console.log(data.position);
}

function moveMob(data){
	if(data.direction == 1){$(data.mob.ID).animate({left: '-='+data.mob.speed+'vw'});}
	else {$(data.mob.ID).animate({left: '+='+data.mob.speed+'vw'});}
}

function addMob(data){
	$('#gameObjects').prepend('<img id="'+data.mob.name+data.mobQueue+'" class="'+data.mob.name+' mob" src="'+data.mob.img+'" />');	
	$( data.mob.ID ).css('left', data.spawnPos+'vw');	
	
	arrMobs.push(data.mob);
}

function removeMob(id){
	$( arrMobs[id].ID ).detach();
		
	arrMobs.splice(id, 1);
	console.log(arrMobs);
}

function mobAtack(data){
	if(data.target==1) {p1_HP-=data.mob.damage;}
	else {p2_HP-=data.mob.damage;}
	
	if(p2_HP<=0||p1_HP<=0) console.log("Game lost...");
}

function dealDamage(data){
	console.log(data.mobId);
	if(arrMobs[data.mobId] != null) {
		arrMobs[data.mobId].health -= data.damage;
		$(arrMobs[data.mobId].ID).animate({left: '+=4vw'},{duration: 100});
		if(arrMobs[data.mobId].health <= 0) {
			removeMob(data.mobId);
		}
	}
	isAtacking = false;
}

///////////////////////////////////////////

//// MAP CONTROL ////

function setMap()
{		
	if(current_mapName == "BloodyIce") mapId = 0;
	else if(current_mapName == "DesertScream") mapId = 1;
	else if(current_mapName == "GreenDespair") mapId = 1;
	else if(current_mapName == "ParadiseCity") mapId = 1;
	
	if(myId==2)
	{
		if(localStorage.getItem("mapName") == "BloodyIce") mapId = 0;
		else if(localStorage.getItem("mapName") == "DesertScream") mapId = 1;
		else if(localStorage.getItem("mapName") == "GreenDespair") mapId = 1;
		else if(localStorage.getItem("mapName") == "ParadiseCity") mapId = 1;
	}
	
	$("#game_background").attr("src",maps[mapId].background);

}

function clone(obj) {
    if (null == obj || "object" != typeof obj) return obj;
    var copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
    }
    return copy;
}

function spawnMob(mobType) {
	var mob = clone(mobType);
	spawnPos = 100 + maps[mapId].spawn_pos[mobQueue];
	mob.ID = '#'+ mob.name + mobQueue;
	
	data = {mob: mob, mobQueue: mobQueue, spawnPos: spawnPos};
	Mob.spawn(data);
}

function mobSpawner() {
	if(myId == 1 && p1_Position == maps[mapId].spawn_pos[mobQueue]) {
		spawnMob(maps[mapId].spawn_mob[mobQueue]);
		mobQueue++;		
	}
}

///////////////////////////////////////////

//// ANIMATIONS CONTROL ////

var curframe = 0;
var distance = -9.72;
var maxFrame = 7;

var anim = setInterval(function() {
  var frame = curframe * distance;
  curframe++;
  if(curframe > maxFrame)
  {
    curframe = 0;
  }
  $('#player1').css({left: frame+'vw'});
}, 70);


var curframe2 = 0;
var distance2 = -13;
var maxFrame2 = 4;

var anim2 = setInterval(function()	{
  var frame = curframe2 * distance2;
  curframe2++;
  if(curframe2 > maxFrame2)
  {
    curframe2 = 0;
  }
  $('#player2').css({left: frame+'vw'});
}, 70);

var mobMovement = setInterval(function() {
	if(myId == 1 && arrMobs.length>0) {
		for(let i=0; i<arrMobs.length; i++) {
			var _mob = arrMobs[i];
			var position = $( _mob.ID ).position().left*100/window.innerWidth;
		
			var target;
			
			if(Math.abs(p1_Position - position + 30) <= Math.abs(p2_Position - position + 30)) {
				target = {
					position: p1_Position,
					player: 1
				};
			}
			else {
				target = {
					position: p2_Position-30,
					player: 2
				};
			}
		
			if(Math.abs(target.position - position + 30)>8) {
				if(target.position - position+30<0) {
						var data = {mob: _mob, direction: 1};
						Mob.move(data);
					}
				else {
						var data = {mob: _mob, direction: 0};
						Mob.move(data);
					}			
			}
			else {
				var data = {mob: _mob, target: target.player};
				Mob.atack(data);
			}
		}	
	}
}, 700);


var queueCleaner = setInterval(function() {
	isMoving = false;
}, 245);
