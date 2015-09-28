/*setInterval("my_function();",1000); 
    function my_function(){
      $('#likes').load(location.href + ' #likes');
    }
    setInterval("my_function2();",1000); 
    function my_function2(){
      $('style').load(location.href + ' style');
    }
    setInterval("my_function3();",1000); 
    function my_function3(){
      $('#dislikes').load(location.href + ' #dislikes');
    }*/
$(document).ready(function(){
	$('#likeButton').click(function(d){
		d.preventDefault();
		var form = $('#LikesForm');
		$.ajax({
				type: 'POST',
				url: '/likeAdd',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode:{
				200: function() {
			      $('#likes').html(my_var+1+' likes');
			      $('#likeButton').css('color','green');

						
			    },
					
				201: function() {
			      $('#likes').html(my_var+' likes');
			      $('#likeButton').css('color','gray');
						
			   		 },
			   	205: function() {
			      $('#likes').html(my_var+1+' likes');
			      $('#likeButton').css('color','green');
			      $('#dislikes').html(my_var2+' dislikes');
			      $('#dislikeButton').css('color','gray');
						
			   		 }

				
			
				}
			});
	});


});

$(document).ready(function(){
	$('#dislikeButton').click(function(e){
		e.preventDefault();
		var form = $('#DislikeForm');

		$.ajax({
				type: 'POST',
				url: '/dislikeAdd',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode:{
				
				203: function() {
			      $('#dislikes').html(my_var2+1+' dislikes');
			      $('#dislikeButton').css('color','red');

						
			    },
					
				204: function() {
			      $('#dislikes').html(my_var2+' dislikes');
			      $('#dislikeButton').css('color','gray');
						
			   		 },
				

			   	206: function() {
			      $('#dislikes').html(my_var2+1+' dislikes');
			      $('#dislikeButton').css('color','red');
			      $('#likes').html(my_var-1+' likes');
			      $('#likeButton').css('color','gray');
						
			   		 }
				
}
			});


	});

});