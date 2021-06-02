var io = require('socket.io')(3000);
console.log('Connected to port 3000');
io.on('error',function(socket) {
    console.log('error');
});
io.on('connection',function (socket) {
   console.log('User has  connection ' + socket.id);
   socket.on('disconnection',function () {
       console.log(socket.id + 'disconnected')
   })
});
var Redis = require('ioredis');
var redis = new Redis(1000);
redis.psubscribe("*",function (error,count) {

});
redis.on('pmessage',function (partner,channel,message) {
    console.log(channel)
    console.log(message)
    message = JSON.parse(message);
    io.emit(channel+":"+message.event,message.data.message);
    console.log('Sent message success');
});
