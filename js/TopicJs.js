
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



	$('#topic').upvote();

	$('.vote').click(function(data) {

var form = $('#votes');
var value = $('#value').val();
		 $.ajax({
		 	headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
		        url: '/vote',
		        type: 'post',
		        data: {value: value}
		    });
		

	});
   
//$('#topic-123').upvote({id: 123, callback: callback});


});


