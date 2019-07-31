//// GAME SETTINGS ////

var isMoving = false;
var p1_Position = 0;
var p2_Position = 0;

var p1_HP;
var p1_MP;
var p1_HP_max;
var p1_MP_max;
var p1_MS;
var p1_AD;
var p1_AP;
var p1_CDR;

var p1_weapon;
var p1_outfit;

var isAtacking = false;
var skill1_isReady = true;
var skill2_isReady = true;
var elixir_isReady = true;

var renderer1 = '#playerRenderer1';
var renderer2 = '#playerRenderer2';

var p1_class;
var p2_class;

var mobQueue = 0;
var spawnPos = 100;
var arrMobs = [];

var finish_point = 200;

var stats;

function getStats() {

	$.ajax({
		type: "POST",
		url: "stats.php",
		data: { request: 'set' }
	}).done(function( result ) {

		stats = JSON.parse(result);

		var bonusAD=0;
		var bonusAP=0;
		var bonusHP=0;
		var bonusMP=0;
		var bonusCDR=0;
		var bonusMS=0;

	if(items[stats['outfit']]!=null)	{
		bonusAD += items[stats['outfit']].ad;
		bonusAP += items[stats['outfit']].ap;
		bonusHP += items[stats['outfit']].hp;
		bonusMP += items[stats['outfit']].mp;
		bonusCDR += items[stats['outfit']].cdr;
		bonusMS += items[stats['outfit']].ms;
	}
	if(items[stats['weapon']]!=null)	{
		bonusAD += items[stats['weapon']].ad;
		bonusAP += items[stats['weapon']].ap;
		bonusHP += items[stats['weapon']].hp;
		bonusMP += items[stats['weapon']].mp;
		bonusCDR += items[stats['weapon']].cdr;
		bonusMS += items[stats['weapon']].ms;
	}

		p1_HP = Number(stats['hp']) + bonusHP;
		p1_MP = Number(stats['mp']) + bonusMP;
		p1_MS = Number(stats['ms']) + bonusMS;
		p1_AD = Number(stats['ad']) + bonusAD;
		p1_CDR = Number(stats['cdr']) + bonusCDR;
		p1_AP = Number(stats['ap']) + bonusAP;

		p1_HP_max = p1_HP;
		p1_MP_max = p1_MP;

		if(items[stats['skill1']] != null) $('#skill1').css('background-image', 'url('+items[stats['skill1']].img+')');
		if(items[stats['skill2']] != null) $('#skill2').css('background-image', 'url('+items[stats['skill2']].img+')');
		if(items[stats['elixir']] != null) $('#elixir').css('background-image', 'url('+items[stats['elixir']].img+')');

		p1_class = stats['class'];
	});
	}

getStats();

$('#gameLog').hide();

///////////////////////////////////////////

//// SET PLAYERS POSITION ////

$('#playerRenderer1').animate({left: '30vw', top: '34vw'});
$('#playerRenderer2').animate({left: '30vw',top: '34vw'});


///////////////////////////////////////////

//// KEY BINDINGS ////

$(document).keydown(keyboardSupport);

function keyboardSupport(event)
{
	var direction;


	if((event.keyCode == '37') && !isMoving) {
		if(p1_Position > 0) p1_Position -= p1_MS;

		var data = {position: p1_Position, direction: 1 , senderId: myId, speed: 250};
		Player.move(data);
		isMoving = true;
	}

	else if((event.keyCode == '39') && !isMoving) {
		if(p1_Position < finish_point) p1_Position+=p1_MS;

		var data = {position: p1_Position, direction: -1 , senderId: myId, speed: 250};
		Player.move(data);
		isMoving = true;
	}

	else if(event.keyCode == 32 && isAtacking == false) {

		var atackedMobs = new Array();

		for(var mob in arrMobs)	{

			var mobPos = $( arrMobs[mob].ID ).position().left*100/window.innerWidth;

			if(Math.abs(mobPos-p1_Position-30)<=16)	{

				isAtacking = true;
				atackedMobs.push(arrMobs[mob].ID);
			}
		}
		var data = {mobs: atackedMobs, damage: p1_AD};
		Player.atack(data);
	}

	else if(event.keyCode == 90 && isAtacking == false && items[stats['skill1']] != null)
	{
		if(p1_MP>=items[stats['skill1']].mp_cost && skill1_isReady)
		{
			p1_MP-=items[stats['skill1']].mp_cost;
			var mp_fill=(p1_MP * 20)/p1_MP_max;
			$('#mp_bar').css('width',mp_fill+'vw');

				data = {casterId: myId, skillName: stats['skill1'], casterPos: p1_Position};
			Player.castSkill(data);
			skill1_isReady = false;

			$('#skill1_cd').animate({
				left: 0
		  },{
		    duration: items[stats['skill1']].cd,
		    complete: function () {
						skill1_isReady = true;
		      },
		    progress: function(animation, progress, msRemaining) {
		       	$('#skill1_cd').css('height', (4-progress*4)+'vw');
		      }
		  });
		}
	}

	else if(event.keyCode == 88 && isAtacking == false && items[stats['skill2']] != null)
	{
		if(p1_MP>=items[stats['skill2']].mp_cost && skill2_isReady)
		{
			p1_MP-=items[stats['skill2']].mp_cost;
			var mp_fill=(p1_MP * 20)/p1_MP_max;
			$('#mp_bar').css('width',mp_fill+'vw');


			data = {casterId: myId, skillName: stats['skill2'], casterPos: p1_Position};
			Player.castSkill(data);
			skill2_isReady = false;

			$('#skill2_cd').animate({
				left: 0
			},{
				duration: items[stats['skill1']].cd,
				complete: function () {
						skill2_isReady = true;
					},
				progress: function(animation, progress, msRemaining) {
						$('#skill2_cd').css('height', (4-progress*4)+'vw');
					}
			});
		}
	}

	else if(event.keyCode == 67 && isAtacking == false && elixir_isReady && items[stats['elixir']] != null)
	{
		elixir_isReady = false;

		switch (items[stats['elixir']].statType) {
			case 'hp':
				p1_HP+=items[stats['elixir']].amount;
				if(p1_HP>p1_HP_max) p1_HP = p1_HP_max;
				var hp_fill=(p1_HP * 20)/p1_HP_max;
				$('#hp_bar').css('width',hp_fill+'vw');
				break;
		  case 'mp':
				p1_MP+=items[stats['elixir']].amount;
				if(p1_MP>p1_MP_max) p1_MP = p1_MP_max;
				var mp_fill=(p1_MP * 20)/p1_MP_max;
				$('#mp_bar').css('width',mp_fill+'vw');
				break;
			case 'ad':
				p1_AD+=items[stats['elixir']].amount;
				break;
			case 'ap':
				p1_AP+=items[stats['elixir']].amount;
				break;
			default:
		}

		$('#elixir_cd').animate({
			left: 0
		},{
			duration: items[stats['elixir']].duration,
			complete: function () {
					elixir_isReady = true;
				},
			progress: function(animation, progress, msRemaining) {
					$('#elixir_cd').css('height', (4-progress*4)+'vw');
				}
		});
	}

	if(p1_Position >= finish_point)
	{
		Player.won();
	}
}

///////////////////////////////////////////


//// REACTION NODE FUNCTIONS ////

function setPlayerLook(data) {

			if(data.playerId != myId) p2_class =data.playerClass;

			if(data.playerClass == 'warrior') {
				if(data.playerId==1) {
					$('#player1').attr('src','images/player2.png');
					$('#player1').attr('class','Warrior');
					$('#playerRenderer1').attr('class','rendererWarrior');
				}
				else {
					$('#player2').attr('src','images/player2.png');
					$('#player2').attr('class','Warrior');
					$('#playerRenderer2').attr('class','rendererWarrior');
				}
			}
			else {
				if(data.playerId==1) {
					$('#player1').attr('src','images/player1.png');
					$('#player1').attr('class','Mage');
					$('#playerRenderer1').attr('class','rendererMage');
				}
				else {
					$('#player2').attr('src','images/player1.png');
					$('#player2').attr('class','Mage');
					$('#playerRenderer2').attr('class','rendererMage');
				}
			}
}

function setImages(){
	if(myId == 2){
		$("#playerRenderer1").before($("#playerRenderer2"));
		$("#game_background").after($("#playerRenderer1"));


		renderer1 = '#playerRenderer2';
		renderer2 = '#playerRenderer1';
	}


	console.log('asdasdasdsadasdasd11');


}

function castSkill(data)	{;
	items[data.skillName].skillEffect(data);
}

function Move(data){
	if(data.senderId == myId) {
		$('#gameObjects').animate(
				{ left: '-'+data.position+'vw'},
				{duration: data.speed,
				easing: 'linear'
				}
			);

		if(data.direction>0)
			$(renderer1).addClass('flipped');
		else
			$(renderer1).removeClass('flipped');
	}

	else {

	p2_Position = 30+data.position;

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
}

function moveMob(data){
	if(data.direction == 1){$(data.mob.ID).animate({left: '-='+data.mob.speed+'vw'});}
	else {$(data.mob.ID).animate({left: '+='+data.mob.speed+'vw'});}
}

function addMob(data){
	$('#gameObjects').prepend('<img id="'+data.mob.name+data.mobQueue+'" class="'+data.mob.name+' mob" src="'+data.mob.img+'" />');
	$( data.mob.ID ).css('left', data.spawnPos+'vw');

	arrMobs[data.mob.ID]=data.mob;
}


function mobAtack(data){
	if(data.target==myId) {
		p1_HP-=data.mob.damage;
		var hp_fill=(p1_HP * 20)/p1_HP_max;
		$('#hp_bar').css('width',hp_fill+'vw');
	}
	if(p1_HP<=0) {
		Player.lost('lost');
	}
}

function gameLost(data){
	console.log("Game lost...");
	location.replace("profile.php");
}

function gameWon(){
	$('#gameLog').show();
}

function dealDamage(data){
	console.log(data.mobs);
	for (var i=0; i<data.mobs.length; i++) {
		if(arrMobs[data.mobs[i]] != null) {
			console.log(arrMobs[data.mobs[i]].health);
			arrMobs[data.mobs[i]].health -= data.damage;
			$(arrMobs[data.mobs[i]].ID).animate({left: '+=4vw'},{duration: 100});
		}
		if(arrMobs[data.mobs[i]].health <= 0) {
			$( arrMobs[data.mobs[i]].ID ).detach();
			delete arrMobs[arrMobs[data.mobs[i]].ID];
		}
	}

	isAtacking = false;
}

///////////////////////////////////////////

//// MAP CONTROL ////

function setMap()
{
	$("#game_background").attr("src",maps[mapId].background);
	$('#playerRenderer2').hide();
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

function spawnAllMobs() {

	for (var i = 0; i < maps[mapId].spawn_mob.length; i++) {
		spawnMob(maps[mapId].spawn_mob[mobQueue]);
		mobQueue++;
	}
}


function backToRoom() {
	console.log("Game won!");

	$.ajax({
		type: "POST",
		url: "stats.php",
		data: { request: 'addGold' }
	}).done(function( result ) {
		location.replace("profile.php");
	});
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
	if(myId == 1) {
		if(p1_class=='mage') $('#player1').css({left: frame+'vw'});
		if(p2_class=='mage') $('#player2').css({left: frame+'vw'});
	}
	else {
		if(p1_class=='mage') $('#player2').css({left: frame+'vw'});
		if(p2_class=='mage') $('#player1').css({left: frame+'vw'});
	}
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
	if(myId == 1) {
		if(p1_class=='warrior') $('#player1').css({left: frame+'vw'});
		if(p2_class=='warrior') $('#player2').css({left: frame+'vw'});
	}
	else {
		if(p1_class=='warrior') $('#player2').css({left: frame+'vw'});
		if(p2_class=='warrior') $('#player1').css({left: frame+'vw'});
	}
}, 70);

var mobMovement = setInterval(function() {
	if(myId == 1) {
		for(var mob in arrMobs) {

			var _mob = arrMobs[mob];
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
