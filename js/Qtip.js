 $(document).ready(function() {          
         $('.btn-xx').qtip({ 
			 content: {
			     text: 'Sterge acest raspuns definitiv'
			},
   			style: {
        		classes: 'qtip-green qtip-rounded',
    		}
	})

  $('.acceptat2').each(function() {
    var reply_id = $(this).attr('id');

 $('#'+reply_id).qtip({ 
       content: {
           text: 'Cel mai folositor raspuns'
      },
        style: {
            classes: 'qtip-green qtip-rounded',
        },
        position: {
            my: 'top center',  // Position my top left...
            at: 'bottom center', // at the bottom right of...
            target: $('#'+reply_id) // my target
        }
  })



  });


         $('.acceptat').qtip({ 
			 content: {
			     text: 'Cel mai folositor raspuns'
			},
   			style: {
        		classes: 'qtip-green qtip-rounded',
    		},
    		position: {
       			my: 'top center',  // Position my top left...
		        at: 'bottom center', // at the bottom right of...
		        target: $('.acceptat') // my target
    		}
	})

        
         
});
