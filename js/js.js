$(document).ready(function(){





					var slider = $('#slider');

			$('nav').on('mouseenter','a',function(){

			  var box = $(this);
			  var p = box.position();
			  slider.animate({
			    width: box.outerWidth(),
			    left: p.left,
			  },250);
			});

			$('nav').on('mouseleave','a',function(){

			  slider.stop();
			});

			$('nav').on('mouseleave',function(){
			  $('#slider').animate({
			    width: 0,
			    left: 0,
			  },250);
			});

			$('.dropdown').click(function(e){
				e.preventDefault();
				$('.dropdown-menu').show();
			});


});