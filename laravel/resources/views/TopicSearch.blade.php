@extends('layouts.PrimaPaginaLayout')

@section('TopicSearch')

<script src = "/js/Search.js"></script>
<style type="text/css">
#TopicForm{
	
	display: inline-block;
	
}
a {
	color:blue;
	font-weight: bold;
	font-size: 15px;
}

a:hover {
   text-decoration: underline;

  
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>
<form name = "searchform"id = "TopicForm" class = "SearchForm"action = "/cauta/" role="search" method = "GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="search-group">
          
          <input style = "outline:none;border-radius:5px;width:500px;height:35px;font-size:30px;"name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati topic">
   		<input onClick = "submitForm();"class = "btnNou" id= "DateSubmit" type = "submit" value = "Trimite topicul"></input>

        </div>
</form>
    
		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group" style = " font-weight: normal;">
		

			@foreach($topics as $topic)

			<hr style='background-color:#778489;border-width:0;color:#000000;height:5px;line-height:0;text-align:left;width:100%;'/>

			
<div style = "width: 600px;padding:25px;">
	<img  style = "float:left;width:60px;height:60xp;margin-top:-13px;margin-left:-20px;position:relative;" src="/{{ $topic->image }}">
				<span style = "margin-left:20px;margin-top:-20px;position:absolute;"><b>{{ $topic->username }}</b> intreaba:</span><br>
				<a style = "padding:25px;width: 600px;class = "new"id = "" name = "topic" value = ""style = "line-height:30px;position:relative;padding:16px 18px 16px 120px;display: inline; height: 100%;"href = "/topic/{{ $topic->categ_urlslug }}/{{ $topic->topic_urlslug }}"><?php echo wordwrap($topic->contents, 75, "<br />", true); ?></a>
				
			</div>
			@endforeach

		

	</div>


<br><br>

</form>


@stop