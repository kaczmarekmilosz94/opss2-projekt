var socket = io();
var myId;
var partyId;

var inParty = false;
var isMoving = false;

//// SET GUI ////

$('#invitation').hide();



$(".scott").animateSprite({
    fps: 12,
    animations: {
        walkRight: [0, 1, 2, 3, 4, 5, 6, 7],
        walkLeft: [15, 14, 13, 12, 11, 10, 9, 8]
    },
    loop: true,
    complete: function(){
        // use complete only when you set animations with 'loop: false'
        alert("animation End");
    }
});

///////////////////////////////////////////

//// SET PLAYERS POSITION ////

$('#player1').animate({left: '20vw', top: '34vw'});
$('#player2').animate({left: '20vw',top: '34vw'});

///////////////////////////////////////////

//// KEY BINDINGS ////
function keyboardSupport(event)
{
  if((
  event.key == 'a'||
  event.key == 'A'||
  event.key == 'd'||
  event.key == 'D') && !isMoving)
  {
    socket.emit('keyPressed', event.key);
    isMoving = true;
  }
}

///////////////////////////////////////////

//// Invitation ////

function sendInvite()
{
  socket.emit('sentInvite', $('#partyId').val());
}

function Accept()
{
  inParty = true;

  socket.emit('acceptParty', {
    myId: myId,
    partyId: partyId
  });

  $('#invitation').hide();
}

function Refuse()
{
  $('#invitation').hide();
}

///////////////////////////////////////////

//// REACTION NODE FUNCTIONS ////

socket.on('showInvite', function(data)
{
  partyId = data.playerId;
  $('#inviteInfo').html('You got invited by: '+data.playerId);
  $('#invitation').show();
});

socket.on('setId', function(data)
{
  myId = data;
  $('#myId_text').html('Your ID is: '+myId);
});

socket.on('move', function(data)
{
  $('#gameObjects').animate(
    { left: data.position+'vw'},
     250 ,'linear',  function () {   isMoving = false;    } );

  if(data.direction<0)
    $('#player1').addClass('flipped');
  else
    $('#player1').removeClass('flipped');
});

socket.on('party_move', function(data)
{
  $('#player2').animate({left: data.position+'vw'}, 250 ,'linear');

  if(data.direction<0)
    $('#player2').addClass('flipped');
  else
    $('#player2').removeClass('flipped');
});

///////////////////////////////////////////
$('body').keypress(keyboardSupport);
$('body').keyup(keyboardSupport);
