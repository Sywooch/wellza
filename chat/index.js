//$(document).ready(function(){
    //var site_url = document.getElementById("siteurl").value;
    //var page_url = document.getElementById("pageurl").value;
    var app = require('express')();
    var http = require('http').Server(app);
    var io = require('socket.io')(http);
    var request = require('request');
    var messages = [];
    var url = "http://192.168.0.192:80/wellza/api/web/v1/message/";
    
    /*
    app.get('/', function (req, res) {
        res.sendFile('/client/message/', {root: __dirname});
    });*/   

    /*http.listen(3000, function () {
        console.log('listening on *:3000');
    });*/
    
    http.listen(3000,function () {
        console.log('listening on *:3000');
        //console.log(socket.handshake.headers.host);
    });

    io.on('connection', function (socket) {
        
        socket.on('send-message', function (message) {
            messages.push(message);
            //socket.broadcast.emit('recieve-message',message); 
            var options = {
                url: url + 'create',
                method: 'POST',
                body: JSON.stringify(message),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'                    
                }
            };
            
            request(options, function (error, response, body) {
                console.log('chat error', body);
                socket.broadcast.emit('recieve-message',body); 
            });
            //socket.broadcast.to().emit('recieve-message', messages);
            
        });
                 
        socket.on('disconnect', function(){
            console.log('server disconnected');            
        });
    });
//});
