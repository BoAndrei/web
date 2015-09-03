@extends('layouts.PrimaPaginaLayout')



@section('IntroducereCategorii')


<style type="text/css">
#DateForm{
	margin-top:-70px;
	display: inline-block;
	
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>
<div class = "SetarileContului">
		<form id = "DateForm" method = "POST" action = "/EditCategorii">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<div class = "col">
			<label class = "col" for = "DenumireC" >Denumire:</label>
			<input style = "font-size:15px;"type = "text" name = "DenumireC" id="DenumireC" value = ""></input>
		<div style = "vertical-align: top;"id = "eDenumireC"> </div>
		</div>

	</div>

	
	
	
	






<br><br>
<input style = "margin-left:250px;"class = "btnNou" id= "DateSubmit" type = "submit" value = "Modifica"></input>
		




</form>
</div>

@stop