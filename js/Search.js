

  $(document).ready(function(){
        $('#search').keyup(function(e){
          
          
  var form = $('.SearchForm');
         
   		$.ajax({

				type: 'POST',
				url: '/search',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
        succes:function(data) {
          
          $('.new').html(data);
        }
          
          
    });

   });

});
    