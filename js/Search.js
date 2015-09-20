$(document).ready(function() {
     $('.SearchForm').submit( function() {              
          goUrl = '/cauta/' + $('#search').val().toLowerCase();
          window.location = goUrl;
          return false;  
     });
});