


$(document).ready(function() {    
  
    $('textarea.content-box').livePreview({
        previewElement: $('.preview'),
        allowedTags: ['p', 'strong', 'br', 'em', 'strike'],
        interval: 20
    });

     var wordCounts = {};

    $("textarea").keyup(function() {

        var matches = this.value.match(/\b/g);
        wordCounts[this.id] = matches ? matches.length / 2 : 0;
        var finalCount = 0;
        $.each(wordCounts, function(k, v) {
            finalCount += v;
        });
        $('#finalcount').val(finalCount)


  
      
    

   

}).keyup();//final finalCount

    $('#DateSubmit').click(function(e){
  e.preventDefault();


      //$('textarea.content-box').qtip("destroy");
      var form = $('#TopicForm');
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
              type: 'POST',
              url: '/EditTopic',
              data: form.serialize(),
              dataType: 'json',
              timeout: 9000,
              statusCode:{
              403: function() {
                $('textarea.content-box').css('border-color','red','border-style','solid;');
                  $('textarea.content-box').qtip({ 
                    show:false,
                     hide:'click',
       content: {
           text: 'Trebuie sa introduci mai mult de 15 cuvinte',
           title: {
           button: 'Close'
        }
      },
        style: {
            classes: 'qtip-red',
        },
        position: {
            my: 'left top',  // Position my top left...
            at: 'center right', // at the bottom right of...
            target: $('textarea.content-box') // my target
        }
  }).qtip("show");
                  
                 },

             202: function() {
               $('textarea.content-box').css('border-color','red','border-style','solid;');
                  
                 },

              404: function() {

                  $('.chosen-container').qtip({ 
                    show:false,
                     hide:'click',
       content: {
           text: 'Trebuie sa introduci o categorie',
           title: {
           button: 'Close'
        }
      },
        style: {
            classes: 'qtip-red',
        },
        position: {
            my: 'left top',  // Position my top left...
            at: 'center right', // at the bottom right of...
            target: $('.chosen-container') // my target
        }
        
  }).qtip("show");$('#qtip-2').effect( "shake" );
                  
                 },
             
              
             
              406: function() {
                $('.bootstrap-tagsinput').css('border-color','red','border-style','solid;');
                  $('.bootstrap-tagsinput').qtip({ 
                    show:false,
                    hide:'click',
       content: {
           text: 'Trebuie sa introduci cel putin un tag',
           title: {
           button: 'Close'
        }

      },
        style: {
            classes: 'qtip-red',
        },
        position: {
            my: 'left top',  // Position my top left...
            at: 'center right', // at the bottom right of...
            target: $('.bootstrap-tagsinput') // my target
        }
  }).qtip("show");
                  
                 }
               },
     success: function(data){
        if(data)
             window.location.href = data;
        else
            console.log("Error");
    }
               
            });
    

    });


  $('#select').tagsinput({
    maxTags: 5,
    maxChars: 8,
    minLength:3,
    confirmKeys: [13, 44, 8],
    allowSpaces: false,
    fieldName: 'tags[]'

  });

});//final js