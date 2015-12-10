<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
@include ('js')




       <script src = "/js/Search.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="content">
              <form id = "TopicForm" class = "SearchForm"action = "/search" role="search" method = "POST">
        <div class="search-group">
          
          <input style = "outline:none;border-radius:10px;width:600px;height:60px;font-size:30px;"name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati topic">
    
        </div>
</form>
              @foreach($topics as $topic)

              <span id = "topicz">{{ $topic->topic_urlslug }}</span><br>

               @endforeach
            </div>
        </div>
    </body>
</html>
