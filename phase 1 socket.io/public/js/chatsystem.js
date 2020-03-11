/*var change = document.getElementById("ch");
change.innerHTML = "appel";*/

//var socket = io();

//socket.connect('http://localhost:3000');

   $(function () {
    var socket = io();
    $('form').submit(function(e){
      e.preventDefault(); // prevents page reloading
      socket.emit('chat message', $('#m').val());
      $('#m').val('');
      return false;
    });
    socket.on('chat message', function(msg){
      $('#messages').append($('<li>').text(msg));
    });
  });	