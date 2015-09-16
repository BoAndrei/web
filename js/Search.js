

  $(document).ready(function(){
        $('#search').keyup(function(e){
          
          
  var form = $('.SearchForm');
        
   		$.ajax({

				type: 'POST',
				url: '/search',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
       success: function (data) {
         var parsed_data =  JSON.stringify(data);
         
        $('.test').html(parsed_data);
            }
          
          
    });

   });

   });

