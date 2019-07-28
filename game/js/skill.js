function ad_skill_1_effect(caster) {

  if(caster.casterId == myId) {

    isAtacking = true;

    var atackedMobs = new Array();

    for(var mob in arrMobs)	{

      var mobPos = $( arrMobs[mob].ID ).position().left*100/window.innerWidth;

      if(Math.abs(mobPos-p1_Position-30)<=50)	{

        atackedMobs.push(arrMobs[mob].ID);
      }
    }
    p1_Position+=50;
    var data = {position: p1_Position, direction: -1 , senderId: myId, speed: 200};
    Player.move(data);
  }

  if(caster.casterId == 1) rendererID = 'skillRenderer1';
  else rendererID = 'skillRenderer2';

  $('#gameObjects').append('<div id="'+rendererID+'"></div>');

  $('#'+rendererID).css('width','0');
  $('#'+rendererID).css('height','1.5vw');
  $('#'+rendererID).css('top','33vw');
  $('#'+rendererID).css('background-color','rgba(220,50,50,0.7)');

  var startPos = caster.casterPos+19
  var targetPos = startPos;

  $('#'+rendererID).css({left: startPos+'vw' ,top: $('.playerRenderer1').position().top-$('#gameObjects').position().top});

  $('#'+rendererID).animate({
    left: targetPos+'vw'
  },{
    duration: 200,
    complete: function () {
      if(caster.casterId == myId) {
        if(atackedMobs.length>0) {
          var data = {mobs: atackedMobs, damage: 50};
          Player.atack(data);
        }
        isAtacking = false;
      }
        $('#'+rendererID).remove();
    },
    progress: function(animation, progress, msRemaining) {
        $('#'+rendererID).css('width', progress*50+'vw');
      }
  });
}

function ap_skill_1_effect(caster) {

  if(caster.casterId == myId) isAtacking = true;

  var atackedMobs = new Array();
  var rendererID;

  if(caster.casterId == 1) rendererID = 'skillRenderer1';
  else rendererID = 'skillRenderer2';

  $('#gameObjects').append('<img src="images/skills/fireball.png" id="'+rendererID+'">');

  var startPos = caster.casterPos+30
  var targetPos = startPos + 80;

  $('#'+rendererID).css({left: startPos+'vw' ,top: $('.playerRenderer1').position().top-$('#gameObjects').position().top});

  if(caster.casterId==myId) {
    p1_Position-=0;
    var data = {position: p1_Position, direction: -1 , senderId: myId, speed: 40};
    Player.move(data);
  }


  $('#'+rendererID).animate({
    left: targetPos+'vw'
  },{
    duration: 500,
    complete: function () {
        $('#'+rendererID).remove();
        isAtacking = false;
      },
    progress: function(animation, progress, msRemaining) {

        var fireballPos = $('#'+rendererID).position().left*100/window.innerWidth;

        for(var mob in arrMobs)	{

          var mobPos = $( arrMobs[mob].ID ).position().left*100/window.innerWidth;

          if((mobPos-fireballPos)<=10)	{

            atackedMobs.push(arrMobs[mob].ID);

            $('#'+rendererID).stop();
            $('#'+rendererID).remove();

            if(caster.casterId==myId) {
              var data = {mobs: atackedMobs, damage: 200};
              Player.atack(data);
            }
          }
        }
      }
  });
}
