


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


  if(finalCount <= 10 )
  {
console.log(finalCount);
    $('textarea.content-box').qtip({ 
       show: 'blur',
         hide: 'focus',
       content: {
           text: 'Trebuie sa introduci cel putin 10 cuvinte',
           button: 'Close'
      },
        style: {
             classes: 'qtip-red qtip-shadow'
        },
        position: {
            my: 'left top',  // Position my top left...
            at: 'right center', // at the bottom right of...
            target: $('textarea.content-box') // my target
        }
    });
  }
  else 
  {
    var api = $('textarea').qtip();
   api.toggle(false); //hide
  }

    }).keyup();




   





});