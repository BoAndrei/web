

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