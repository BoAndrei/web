@extends('layouts.PrimaPaginaLayout')

@section('SetarileContului')
<script type="text/javascript" src="/js/SchimbareParola.js"></script>
<div class = "container">
<div class = "SetarileContului">
<div class = "SchimbareEmail">
	<div class = "SchimbareEmailWrapper">
	<div id = "SchimbareEmail">
	<a class = "lol">Schimbare Email<i style = "top:1px;margin-left:15px;"class="fa fa-level-down"></i></a>
	</div>
		<form id = "EmailForm" method = "POST" action = "/EditEmail">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<div class="form-group">
			<label class = "col" for = "EmailActual" >Email Actual:</label>
	 	
			<input class="form-control" style = "font-size:15px;"type = "text" name = "EmailActual" id="EmailActual"value = "<?php $user=Auth::user();echo $user->email; ?>" readonly></input>
		
	</div>

	<div class="form-group">
			<label class = "col" for = "NoulEmail" >Noul Email:</label>
	 	
			<input class="form-control" style = "font-size:15px;"type = "text" name = "NoulEmail" id="NoulEmail"></input>
		<div style = "vertical-align: top;"id = "eNoulEmail"> </div>
		

	</div>

	<div class="form-group">
			<label class = "col" for = "ParolaActuala" >Parola Actuala:</label>
	 	
			<input class="form-control" style = "font-size:15px;"type = "text" name = "ParolaActuala" id="ParolalActuala"></input>
		<div id = "eParolaActuala"></div>
		<br>
		<div style = "text-align:center;">
			<input style = "margin-left:0px;"class = "btnNou" id= "EmailSubmit" type = "submit" value = "Modifica"></input>
		</div>
	</div>
	</form>

</div>

</div>

<div class = "SchimbareParola">
	<div id = "SchimbareParola">
	<a>Schimbare Parola<i style = "top:1px;margin-left:15px;"class="fa fa-level-down"></i></a>
	</div>
	<div class = "SchimbareParolaInputs">

	<form id = "ParolaForm" method = "POST" action = "/EditParola">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<div class="form-group">
			<label class = "col" for = "ParolaActuala2" >Parola Actuala:</label>
	 	
			<input class="form-control" type = "text" name = "ParolaActuala2" id="ParolaActuala2"></input>
		<div id = "eParolaActuala2"></div>
		
	</div>

	<div class="form-group">
			<label class = "col" for = "NouaParola" >Noua Parola:</label>
	 	
			<input class="form-control" type = "text" name = "NouaParola" id="NouaParola"></input>
		<div id = "eNouaParola"></div>
		
	</div>

	
	<div class="form-group">
			<label class = "col" for = "NouaParola2" >Noua Parola:</label>
	 	
			<input class="form-control" type = "text" name = "NouaParola2" id="NouaParola2"></input>
		<div id = "eNouaParola2"></div>
		<br>
		<div style = "text-align:center;">
			<input style = "margin-left:0px;"class = "btnNou" id= "ParolaSubmit" type = "submit" value = "Modifica"></input>
		</div>
	</div>

</form>
</div>
</div>
</div>
</div>
@stop