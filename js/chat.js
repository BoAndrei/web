function urlFunction(url){

	var username = $('#user').val();
	document.location = '/profil/'+username+'/mesaje/'+url;

}

$(document).ready(function(){


	var getNode = function(s) {
		return document.querySelector(s);
	},
	messages = getNode('.chat-messages'),
	textarea = getNode('.text'),
	chatName = getNode('#user'),
	room = getNode('#room_id'),
	current = getNode('#current');



	try {

		var socket = io.connect('http://localhost:27017');

	}	catch(e) {
	}

	if(socket !== undefined) 
	{


		socket.on('output',function(data) {
			
			if(data.length) 
			{
				for(var x = 0; x < data.length; x++)
				{
					if(data[x].room_id == current.value)
					{
						var message = document.createElement('div');
						message.setAttribute('class','chat-message');
						message.textContent = data[x].name + ': ' + data[x].message;
						messages.appendChild(message);
						//messages.insertBefore(message, messages.firstChild);
					}
				}

			}

				/*$("#chat-messages").animate({
     				 scrollTop: $("#chat-messages")[0].scrollHeight
   				});*/
		});


		
		textarea.addEventListener('keydown',function(ev) {

			var name = chatName.value,
				self = this,
				current_id = current.value;
			
			if(ev.which === 13 && ev.shiftKey === false) {
				socket.emit('input', {name:name, message:self.value, room_id: current_id});
				
				/*$("#chat-messages").animate({
     				 scrollTop: $("#chat-messages")[0].scrollHeight
   				});*/

					textarea.value = '';
				
			}

			

		});


	} 


});