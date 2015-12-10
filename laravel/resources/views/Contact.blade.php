@extends('layouts.PrimaPaginaLayout')

@section('Contact')
<div class = "ContactNou">
	@if (Auth::check())
		<form id = "TopicForm" method = "POST" action = "/contactnou">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<label class="control-label bold" for="subject">Subiect</label>
<input class="input-xlarge" type="text" name="subiect" id="subject" value="" style="width:100%;">


<br><br>
	

			<label class="control-label bold" for="message">Mesaj</label>				
				<textarea class = "message"name = "mesaj" WRAP=HARD cols = "80" rows = "13" ></textarea>
			

			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2" value = "Trimite Tichet">
		@else
			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2 autentificare" value = "Trebuie sa te loghezi ca sa poti trimite un ticket">
		@endif

		</form>






<div>
@stop