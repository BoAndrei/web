$(document).ready(function() {
     $('.SearchForm').submit( function() {      
     $.trim()        
         goUrl = '/cauta/' + $('.chosen-select :selected').val().toLowerCase().replace(/ +?/g, '') + '/' + $('#search').val().toLowerCase() ;
          window.location = goUrl;
          return false;  
     });



     $('.cauta').click( function() {
     	$('.cautadown').slideToggle(100);

		});

     


});