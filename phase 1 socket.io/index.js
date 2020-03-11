/*var express = require('express');
var http = require('http').createServer(express);
var io = require('socket.io')(http);

//load the index file
/*express.get('/', function (req, res) {
	res.sendFile(__dirname + '/public/index.html');
});

//localhost port 3000
http.listen(3000, function(){
	console.log('listening on *:3000');
});

//when someone connect to the app
io.on('connection', function(socket){
	console.log('An user has connected');
}); */

//request exstern file
var express = require('express');
var socket = require('socket.io');

var users = 0;

//localhost port 3000
var app = express();
var server = app.listen(3000, function(){
	console.log('listening on *:3000');
});

//get the concept in file ....
app.use(express.static('public'));

var io = socket(server);
//when someone connect to the app
io.on('connection', function(socket){
	users++;
	console.log('An user has connected! ' + users + "/20");
	//socket.broadcast.emit('A user has connected to the chat!');
	//When the user send a message
	socket.on('chat message', function(msg){
		console.log('message: ' + msg);
		io.emit('chat message', msg);
	});
	//when an user disconnect from the app
	socket.on('disconnect', function(){
		users--;
		console.log('An user has disconnected! ' + users + "/20");
	
	});

});




