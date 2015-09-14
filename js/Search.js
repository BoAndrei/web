
  $(document).ready(function(){
        $('#search').keyup(function(e){
          
          
  var form = $('.SearchForm');
         var topic = $('#topicz').val();
   		$.ajax({
				type: 'GET',
				url: '/search',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000
          
          
    });

   });

});
    