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
<link rel="stylesheet" type="text/css" href="css/style_profile.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="css/jquery-ui-1.12.1.custom/jquery-ui.theme.css">

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>

 $( function() {
	$( "#tabs" ).tabs();
 } );

 $( function() {
	$( "#dialogText" ).tabs();
} );

$( function() {
    $( "#selectable" ).selectable({
    stop:function(event, ui){
        $(event.target).children('.ui-selected').not(':first').removeClass('ui-selected');
				if($('#selectable .ui-selected').attr('id')!='empty'){
					showItem($('#selectable .ui-selected').attr('id'));
				}
    }
});
} );

$( function() {
	  $( "#selectable2" ).selectable({
	   stop:function(event, ui){
	      $(event.target).children('.ui-selected').not(':first').removeClass('ui-selected');
				if($('#selectable2 .ui-selected').attr('id')!='empty'){
					showItem($('#selectable2 .ui-selected').attr('id'));
				}
	   }
});
} );

$( function() {
    $( "#info" ).dialog();
} );

 </script>

</head>

<body>
profile

<div class='portret'>

</div>

<div id="info" title="Welcome!">
	This is your character profile.</br>
		Here you can buy equipment (Blacksmith) or skills and potions (Magic shop).</br>
		Drag and drop items on shop area to sell them.</br>
		Raise your power by buying skill points (10g each).</br>
		When you are ready, click on &quotFind Game&quot button to start your journey.</br></br>
	 Good luck!
</div>

<div id="dialog">

	<div id="tabs">
	  <ul>
			<li><a href="#tabs-3"onclick="tabChange('quest')">Quest</a></li>
	    <li><a href="#tabs-1" onclick="tabChange('armor')">Blacksmith</a></li>
	    <li><a href="#tabs-2" onclick="tabChange('magic')">Magic shop</a></li>
	  </ul>
	  <div class='tab droppable' id="tabs-1">
			<ol id="selectable">
  			<li id='sword1' class="ui-state-default"><image class="shop_item" src="images/items/sword1.png"></li>
				<li id='wand1' class="ui-state-default"><image class="shop_item" src="images/items/wand1.png"></li>
				<li id='armor1' class="ui-state-default"><image class="shop_item" src="images/items/armor1.png"></li>
				<li id='cloak1' class="ui-state-default"><image class="shop_item" src="images/items/cloak1.png"></li>
				<li id='sword2' class="ui-state-default"><image class="shop_item" src="images/items/sword2.png"></li>
				<li id='wand2' class="ui-state-default"><image class="shop_item" src="images/items/wand2.png"></li>
				<li id='armor2' class="ui-state-default"><image class="shop_item" src="images/items/armor2.png"></li>
				<li id='cloak2' class="ui-state-default"><image class="shop_item" src="images/items/cloak2.png"></li>
				<li id='sword3' class="ui-state-default"><image class="shop_item" src="images/items/sword3.png"></li>
				<li id='wand3' class="ui-state-default"><image class="shop_item" src="images/items/wand3.png"></li>
				<li id='armor3' class="ui-state-default"><image class="shop_item" src="images/items/armor3.png"></li>
				<li id='cloak3' class="ui-state-default"><image class="shop_item" src="images/items/cloak3.png"></li>
			</ol>
	  </div>
	  <div class='tab droppable' id="tabs-2">
			<ol id="selectable2">
				<li id='hp_potion1' class="ui-state-default"><image class="shop_item" src="images/items/hp_pot1.png"></li>
				<li id='mp_potion1' class="ui-state-default"><image class="shop_item" src="images/items/mp_pot1.png"></li>
				<li id='ad_potion1' class="ui-state-default"><image class="shop_item" src="images/items/ad_pot1.png"></li>
				<li id='ap_potion1' class="ui-state-default"><image class="shop_item" src="images/items/ap_pot1.png"></li>
				<li id='ad_skill_1' class="ui-state-default"><image class="shop_item" src="images/items/ad_skill_1.png"></li>
				<li id='ap_skill_1' class="ui-state-default"><image class="shop_item" src="images/items/ap_skill_1.png"></li>
  			<li id='empty' class="ui-state-default"></li>
  			<li id='empty' class="ui-state-default"></li>
  			<li id='empty' class="ui-state-default"></li>
  			<li id='empty' class="ui-state-default"></li>
  			<li id='empty' class="ui-state-default"></li>
  			<li id='empty' class="ui-state-default"></li>
			</ol>
	  </div>
	  <div class='tab' id="tabs-3">
	    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
	    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	  </div>
	</div>

	<image id='shop_pic' src='images/mayor.png'>

	<div id="dialogText">
				<p id="item_decription">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

				<div id='itemStats1'>
					<a id='item_ad'><b>Atack:</b> 10</a></br>
					<a id='item_hp'><b>Health:</b> 10</a></br>
					<a id='item_ms'><b>Movement speed:</b> 10</a></br>
				</div>

				<div id='itemStats2'>
					<a id='item_ad'><b>Magic:</b> 10</a></br>
					<a id='item_hp'><b>Mana:</b> 10</a></br>
					<a id='item_ms'><b>Cooldown reduction:</b> 10</a></br>
				</div>

				<button id='btn_buy' onclick='buyItem(item)'>Buy</button>
	</div>
</div>

<div id='characterStats'>
	<div class='statistics'>
		<p id='hp'></p>
		<p id='mp'></p>
		<p id='ad'></p>
		<p id='ap'></p>
		<p id='cdr'></p>
		<p id='ms'></p>
	</div>

	<div class='attributes'>
		<div class='keys'>
			<p>Strength</p>
			<p>Intelligence</p>
			<p>Dexterity</p></br>
			<p>Gold: </p>
		</div>
		<div class='values'>
			<p  id='str'>str</p>
			<p  id='int'>int</p>
			<p  id='dex'>dex</p></br>
			<p  id='gold'>gold</p>
		</div>
		<div class='buttons'>
			<button class='btn_box' onclick="addPoint('str')">+</button></br>
			<button class='btn_box' onclick="addPoint('int')">+</button></br>
			<button class='btn_box' onclick="addPoint('dex')">+</button>
		</div>
	</div>
</div>

<div class='equipment'>
	<div class='eq' id='outfit_slot'></div>
	<div class='eq' id='weapon_slot'></div>
	<div class='eq' id='skill1_slot'></div>
	<div class='eq' id='skill2_slot'></div>
	<div class='eq' id='elixir_slot'></div>
</div>


<form action="map.php">
    <input id='btn_start' type="submit" value="Find Game" />
</form>


<script src="js/skill.js"></script>
<script src="js/items.js"></script>
<script>

var stats;

$('#itemStats1').hide();
$('#itemStats2').hide();
$('#btn_buy').hide();

function showItem(item) {
	if(items[item].itemType=='outfit' || items[item].itemType=='weapon')	{
		$('#item_decription').html(items[item].itemDescription);
		$('#itemStats1').show();
		$('#itemStats2').show();
		$('#btn_buy').show();
		$('#item_ad').html('<b>Atack:</b> '+items[item].ad);
		$('#item_ap').html('<b>Magic:</b> '+items[item].ap);
		$('#item_hp').html('<b>Health:</b> '+items[item].hp);
		$('#item_ms').html('<b>Movement speed:</b> '+items[item].ms);
		$('#item_mp').html('<b>Mana:</b> '+items[item].mp);
		$('#item_cdr').html('<b>Cooldown reduction:</b> '+items[item].cdr+'%');
		$('#btn_buy').attr("onclick",'buyItem("'+item+'")');
		$('#btn_buy').html('Buy '+items[item].cost+'g');
	}
	else {
		$('#item_decription').html(items[item].itemDescription);
		$('#itemStats1').hide();
		$('#itemStats2').hide();
		$('#btn_buy').show();
		$('#btn_buy').html('Buy '+items[item].cost+'g');
	}
}

function buyItem(item_name) {

	var slot = items[item_name].itemType+'_slot';

	if( $('#'+slot).is(':empty') )	{
		$.ajax({
			type: "POST",
			url: "stats.php",
			data: {
				 request: 'buy',
				 cost: items[item_name].cost,
				 type: items[item_name].itemType,
				 item: item_name}
		}).done(function( result )
		{
			if(result>0)
			{
				getStats();

				if(items[item_name].itemType=='outfit') {
					$('#outfit_slot').append("<image id='outfit' class='item draggable ui-widget-content' src='#'>");
					$('#outfit').attr("src",items[item_name].img);
				}
				if(items[item_name].itemType=='weapon') {
					$('#weapon_slot').append("<image id='weapon' class='item draggable ui-widget-content' src='#'>");
					$('#weapon').attr("src",items[item_name].img);
				}
				if(items[item_name].itemType=='skill1') {
					$('#skill1_slot').append("<image id='skill1' class='item draggable ui-widget-content' src='#'>");
					$('#skill1').attr("src",items[item_name].img);
				}
				if(items[item_name].itemType=='elixir') {
					$('#elixir_slot').append("<image id='elixir' class='item draggable ui-widget-content' src='#'>");
					$('#elixir').attr("src",items[item_name].img);
				}

				$( function() {
				 $( ".draggable" ).draggable({
						 revert: true,
						 revertDuration: 200,
						 scroll: false
					 }
				 );
				 $( ".droppable" ).droppable({
					 drop: function( event, ui ) {
						 sellItem(ui.draggable.prop('id'), ui.helper);
					}
				 });
				});
			}
		});
	}
	else if(items[item_name].itemType=="skill1" && $('#skill2_slot').is(':empty'))	{

		$.ajax({
			type: "POST",
			url: "stats.php",
			data: {
				 request: 'buy',
				 cost: items[item_name].cost,
				 type: 'skill2',
				 item: item_name}
		}).done(function( result )
		{
			$('#skill2_slot').append("<image id='skill2' class='item draggable ui-widget-content' src='#'>");
			$('#skill2').attr("src",items[item_name].img);

			$( function() {
			 $( ".draggable" ).draggable({
					 revert: true,
					 revertDuration: 200,
					 scroll: false
				 }
			 );
			 $( ".droppable" ).droppable({
				 drop: function( event, ui ) {
					 sellItem(ui.draggable.prop('id'), ui.helper);
				}
			 });
			});
		});
	}
	else	{
		console.log('Slot not empty');
	}
}

function getStats() {
	$.ajax({
		type: "POST",
		url: "stats.php",
		data: { request: 'set' }
	}).done(function( result )
	{
		console.log(result);

		try {
			stats = JSON.parse(result);

			$('#str').html(stats['str']);
			$('#int').html(stats['int']);
			$('#dex').html(stats['dex']);
			$('#gold').html(stats['gold']);

			var bonusAD =0;
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

			$('#ad').html('Atack: '+(stats['ad']+bonusAD));
			$('#ap').html('Magic: '+(stats['ap']+bonusAP));
			$('#hp').html('Health: '+(stats['hp']+bonusHP));
			$('#mp').html('Mana: '+(stats['mp']+bonusMP));
			$('#cdr').html('Cooldown reduction: '+(stats['cdr']+bonusCDR+'%'));
			$('#ms').html('Movement speed: '+(stats['ms']+bonusMS));

			if(items[stats['outfit']]!=null && $('#outfit_slot').is(':empty')) {
				$('#outfit_slot').append("<image id='outfit' class='item draggable ui-widget-content' src='#'>");
				$('#outfit').attr("src",items[stats['outfit']].img);
			}
			if(items[stats['weapon']]!=null && $('#weapon_slot').is(':empty')) {
				$('#weapon_slot').append("<image id='weapon' class='item draggable ui-widget-content' src='#'>");
				$('#weapon').attr("src",items[stats['weapon']].img);
			}
			if(items[stats['skill1']]!=null && $('#skill1_slot').is(':empty')) {
				$('#skill1_slot').append("<image id='skill1' class='item draggable ui-widget-content' src='#'>");
				$('#skill1').attr("src",items[stats['skill1']].img);
			}
			if(items[stats['skill2']]!=null && $('#skill2_slot').is(':empty')) {
				$('#skill2_slot').append("<image id='skill2' class='item draggable ui-widget-content' src='#'>");
				$('#skill2').attr("src",items[stats['skill2']].img);
			}
			if(items[stats['elixir']]!=null && $('#elixir_slot').is(':empty')) {
				$('#elixir_slot').append("<image id='elixir' class='item draggable ui-widget-content' src='#'>");
				$('#elixir').attr("src",items[stats['elixir']].img);
			}

			$( function() {
			 $( ".draggable" ).draggable({
					 revert: true,
					 revertDuration: 200,
					 scroll: false
				 }
			 );
			 $( ".droppable" ).droppable({
				 drop: function( event, ui ) {
					 sellItem(ui.draggable.prop('id'), ui.helper);
				}
			 });
			});
		} catch (e) {
			console.log(e);
		} finally {
		}
	});
}


getStats();

function sellItem(type, item) {
	$.ajax({
		type: "POST",
		url: "stats.php",
		data: { request: 'sell', cost: items[stats[type]].cost, type: type}
	}).done(function( result )
	{
		if(result>0)
		{
			item.remove();
			getStats();
		}
	});
}

function addPoint(stat) {
	$.ajax({
		type: "POST",
		url: "stats.php",
		data: { request: stat }
	}).done(function( result ) {
		if(result>0)
		{
			getStats();
		}
	});
}

function tabChange(tab) {
	switch (tab) {
		case 'armor':
			$('#shop_pic').attr("src","images/blacksmith.png");
			$('#item_decription').html('blacksmith');
			$('#itemStats1').hide();
			$('#itemStats2').hide();
			$('#btn_buy').hide();
			break;
		case 'magic':
			$('#shop_pic').attr("src","images/magicshop.png");
			$('#item_decription').html('magicshop');
			$('#itemStats1').hide();
			$('#itemStats2').hide();
			$('#btn_buy').hide();
			break;
		case 'quest':
			$('#shop_pic').attr("src","images/mayor.png");
			$('#item_decription').html('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
			$('#itemStats1').hide();
			$('#itemStats2').hide();
			$('#btn_buy').hide();
			break;
		default:
	}

}
</script>

</body>


</html>
