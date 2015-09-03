@extends('layouts.PrimaPaginaLayout')

@section('TopicNou')


<style type="text/css">
#TopicForm{
	
	display: inline-block;
	
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>
<div class = "SetarileContului">
		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<div class = "col">
			<label class = "col" for = "Topic" >Topic:</label>
			<input style = "font-size:15px;"type = "text" name = "Topic" id="Topic" value = ""></input>
		<div style = "vertical-align: top;"id = "eDenumireC"> </div>
		</div>


		<select name = "categorie">

			@foreach($categorii as $categori)

				<option value = "{{$categori->denumire}}">{{$categori->denumire}}</option>

			@endforeach

		</select>

	</div>


<br><br>
<input style = "margin-left:250px;"class = "btnNou" id= "DateSubmit" type = "submit" value = "Modifica"></input>
		
</form>
</div>

@stop