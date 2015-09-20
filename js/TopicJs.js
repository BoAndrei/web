
function replyReply(reply_id){
   
        $('#'+reply_id).toggle();
   
}


$(document).ready(function () {
	
	$('#resizable').resizable({
    	handles: {
        	 s: $('.ui-resizable-s')
    	},

    	alsoResize: $('textarea')
	});
});