

function showMessage(id) {

	$('.'+id).fadeToggle();
	$('#'+id+' td').css("background-color","#efefef");
	$('.'+id+' td').css("background-color","#dfdfdf");
	$('#'+id+' td a').css("font-weight","normal");


	$.ajax({
		 	headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
		        url: '/profil/mesaj/'+id,
		        type: 'post',
		        data: {id: id}
		    });

}


$(document).ready(function() {     



	$('.fa-square-o').click(function() {
		$('.CheckList').toggle();
	});


	$('.all').click(function() {
		  $('.questionCheckBox').each(function(){ this.checked = true; });
   		 $('.CheckList').hide();
	});
	
	$('.citit').click(function() {
		 $('.citite').each(function(){ this.checked = true; });
		 $('.necitite').each(function(){ this.checked = false; });
   		 $('.CheckList').hide();
	});

	$('.necitit').click(function() {
		 $('.necitite').each(function(){ this.checked = true; });
		 $('.citite').each(function(){ this.checked = false; });
   		 $('.CheckList').hide();
	});

});