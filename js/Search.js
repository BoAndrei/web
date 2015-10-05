$(document).ready(function() {
     $('.SearchForm').submit( function() {              
          goUrl = '/cauta/' + $('#search').val().toLowerCase();
          window.location = goUrl;
          return false;  
     });
});

$(document).ready(function() {
     $('.cauta').click( function() {
     	$('.cautadown').slideToggle(100);
     });
});