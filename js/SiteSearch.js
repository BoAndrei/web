$(document).ready(function() {
     $('.SearchForm').submit( function() {              
          goUrl = '/cautare/' + $('.chosen-select :selected').text().toLowerCase() + '/' + $('#search').val().toLowerCase() ;
          window.location = goUrl;
          return false;  
     });



     $('.option').click( function() {
     	$('.cautadown').toggle(100);
     });

$('#MesajSubmitt').click(function(e){
		e.preventDefault();
var form = $('#MesajForm');
			$.ajax({
				headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
				type: 'POST',
				url: '/TrimiteMesaj',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000

			});
	});



});