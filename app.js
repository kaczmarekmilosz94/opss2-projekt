var express = require('express');
var app = express();
var serv = require('http').Server(app);

app.get('/', function(req, res)
{
    res.sendFile(__dirname + '/public/index.html');
});

var publicDir = require('path').join(__dirname,'/public');
app.use(express.static(publicDir));

serv.listen(2000);
console.log("Server started");

var SOCKET_LIST = [];

var io = require('socket.io')(serv,{});
////////////////////////////////////////////////////////////
//      OnConnection

io.sockets.on('connection', function(socket){
    SOCKET_LIST.push(socket);
    socket.id = Math.round(Math.random() * (9999 - 1000) + 1000);
    console.log('socket connection ' + socket.id);

    socket.emit('setId', socket.id);

////////////////////////////////////////////////////////////
//      Set player statistics
    socket.position = 0;
////////////////////////////////////////////////////////////
//      On socket data input


socket.on('keyPressed', function(data)
{
  Move(socket, data);
});

socket.on('sentInvite', function(data)
{
  if(socket.id != data) Invite(socket, data);
});

socket.on('acceptParty', function(data)
{
  var mySocket;
  var partySocket;

  for (var i = 0; i < SOCKET_LIST.length; i++) {
    if(SOCKET_LIST[i].id == data.myId){
      mySocket = SOCKET_LIST[i];
    }else if(SOCKET_LIST[i].id == data.partyId){
      partySocket = SOCKET_LIST[i];
    }
  }
  mySocket.party = partySocket;
  partySocket.party = mySocket;

  console.log('player '+mySocket.id+' and  player '+partySocket.id+' are now in a party!');
});


////////////////////////////////////////////////////////////
//      OnDisconection

    socket.on('disconnect', function () {
    io.emit('user disconnected ');
    var index = SOCKET_LIST.indexOf(socket);
    if (index > -1) {
      SOCKET_LIST.splice(index, 1);
      console.log('user disconnected: ' + socket.id);
    }
  });
});
////////////////////////////////////////////////////////////

//      ServerFunctions
function Invite(socket, data)
{
  console.log(socket.id+' invited '+ data);
  for (var i = 0; i < SOCKET_LIST.length; i++)
  {
    if(SOCKET_LIST[i].id == data)
    {
      SOCKET_LIST[i].emit('showInvite',
      {
        playerId: socket.id
      });
      break;
    }
  }
}

function Move(socket, key)
{
  var direction;

  if(key=='a' || key=='A'){
    socket.position += 10;
    direction = -1;
  }
  else if(key=='d' || key=='D'){
    socket.position -= 10;
    direction = 1;
  }
  socket.emit('move', {
    position: socket.position,
    direction: direction
  });

  if(socket.party!= null)
  {
    socket.party.emit('party_move', {
      position: 20-socket.position,
      direction: direction
    });
  }
}
