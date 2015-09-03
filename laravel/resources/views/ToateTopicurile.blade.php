@extends('layouts.PrimaPaginaLayout')

@section('ToateTopicurile')


<style type="text/css">
#TopicForm{
	
	display: inline-block;
	
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>

		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		


		

			@foreach($topics as $topic)
<div style = "width: 100px;padding:50px;"class = "topic">
				<a class = "new"id = "" name = "topic" value = ""style = "line-height:30px;position:relative;padding:16px 18px 16px 120px;display: inline; height: 100%;"href = "/topic/{{ $topic->topic_urlslug }}">{{ $topic->contents }}</a>
			</div><hr>
			@endforeach

		

	</div>


<br><br>

</form>


@stop