var mongo = require('mongodb').MongoClient;
var client = require('socket.io').listen(27017).sockets;




mongo.connect('mongodb://localhost:27017/mesaje',function(err, db) {

if (err) {
    console.log('Unable to connect to the mongoDB server. Error:', err);
  } 

client.on('connection',function(socket) {


	var col = db.collection('messages');

	col.find().sort({_id: 1}).toArray(function(err,res) {
    	if(err) throw(err);

    	socket.emit('output', res);

    });

    socket.on('input',function(data) {
		
		var name = data.name;
		var message = data.message;
		var room_id = data.room_id;
		var whitespacePattern = /^\s*$/;

		if(whitespacePattern.test(name) || whitespacePattern.test(message))
		{
			console.log('s');
			sendStatus('Trebuie sa introduci un mesaj');
		}
		else 
		{
			col.insert({name: name, message: message, room_id: room_id},function() {
				
				client.emit('output', [data]);

				


			});
		}
		

	});

});



});