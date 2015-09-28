 $(document).ready(function() {          
         $('.btn-xx').qtip({ 
			 content: {
			     text: 'Sterge acest raspuns definitiv'
			},
   			style: {
        		classes: 'qtip-green qtip-rounded',
    		}
	})

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

         $('.acceptat2').qtip({ 
       content: {
           text: 'Cel mai folositor raspuns'
      },
        style: {
            classes: 'qtip-green qtip-rounded',
        },
        position: {
            my: 'top center',  // Position my top left...
            at: 'bottom center', // at the bottom right of...
            target: $('.acceptat2') // my target
        }
  })
         
});
