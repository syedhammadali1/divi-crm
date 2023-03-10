

var express = require('express');
var socket = require('socket.io');
var server = require('http').createServer(app);
var io = require('socket.io')(server);
var fs = require('fs');

//App setup
var app =  express();
var server = app.listen(9001, function(){
	console.log('listening to requests on port 9001');
});

//Static files
app.use(express.static('public'));

//Socket setup
var io = socket(server);
 
io.on('connection', function(socket){
	console.log('made socket connection',socket.id);

		socket.on('chat message', function(data){ // Receiver
			//console.log(data);
			//io.sockets.emit(`chat_${data.receiverId}`,data);
            //var body = comment_msg_submit(data)
			io.sockets.emit('chat message', data);  // Sender
		});

         socket.on('like post', function(data){ // Receiver
            
            //io.sockets.emit(`chat_${data.receiverId}`,data);
            //var body = comment_msg_submit(data)
            io.sockets.emit('like post', data);  // Sender
        });

        socket.on('message post', function(data){ // Receiver
            console.log(data);
            //io.sockets.emit(`chat_${data.receiverId}`,data);
            //var body = comment_msg_submit(data)
            io.sockets.emit('message post', data);  // Sender
        });

        socket.on('notification post', function(data){ // Receiver
            console.log(data);
            io.sockets.emit('notification post', data);  // Sender
        });
        
        socket.on('thread-message post', function(data){ // Receiver
            console.log(data);
            io.sockets.emit('thread-message post', data);  // Sender
        });

		socket.on('typing', function(data){
			//socket.emit('typing_${data.senderId}',data)
		});

	  socket.on('disconnect', () => {
	    console.log('user disconnected');
	  });
});

// http.listen(3000, () => {
//   console.log('listening on *:3000');
// });