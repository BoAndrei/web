	$(document).ready(function(){
		$('#SchimbareParola').click(function () {
			$('.SchimbareParolaInputs').slideToggle(200);
	});

		$('#ParolaSubmit').click(function (p){
		p.preventDefault();
			var NouaParola = $('#NouaParola').val();
			var ParolaActuala2 = $('#ParolaActuala2').val();
			var form = $('#ParolaForm');
			var NouaParola2 = $('#NouaParola2').val();
			var k = 0;
			
			$.ajax({
				type: 'POST',
				url: '/EditParola',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode: {
				    403: function() {
				    	
				    	$('#ParolaActuala2').css('border-color','red','border-style','solid;');
						$('#eParolaActuala2').html('<span style="font-size:15px;color:red;">Parola introdusa este gresita</span>');
						
				    }
					
				},
				
				error:function(data) {
					

					if(NouaParola2 != NouaParola)
					{
						$('#eNouaParola2').css('border-color','red','border-style','solid;');
						$('#eNouaParola2').html('<span style="font-size:15px;color:red;">Noua parola nu este asemanatoare</span>');
					}

					if(NouaParola2 == NouaParola)
					{
						$('#eNouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
					}
				
					if(NouaParola.length < 5)
					{
						$('#NouaParola').css('border-color','red','border-style','solid;');
						$('#eNouaParola').html('<span style="font-size:15px;color:red;">Trebuie introduse cel putin 4 caractere</span>');
					
					}
					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
					
					}
				},
				success:function(data) {
					 if(data['status'] == "parola_buna") {
             			
						$('#ParolaActuala2').removeAttr('style');
						$('#eParolaActuala2').html('');
						k++;
        			}
        			if(NouaParola2 == NouaParola)
					{
						$('#NouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
						k++
					}

					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
						k++
					
					}
        			
        		
					
					if(k==3)
					{window.location.href=window.location.href;}
			}
		});
	});

});