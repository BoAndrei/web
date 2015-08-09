@extends('layouts.PrimaPaginaLayout')

@section('SetarileContului')
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
	 	<div class = "col">
			<input style = "font-size:15px;"type = "text" name = "EmailActual" id="EmailActual"value = "<?php $user=Auth::user();echo $user->email; ?>" readonly></input>
		</div>
	</div>

	<div class="form-group">
			<label class = "col" for = "NoulEmail" >Noul Email:</label>
	 	<div class = "col">
			<input style = "font-size:15px;"type = "text" name = "NoulEmail" id="NoulEmail"></input>
		<div style = "vertical-align: top;"id = "eNoulEmail"> </div>
		</div>

	</div>

	<div class="form-group">
			<label class = "col" for = "ParolaActuala" >Parola Actuala:</label>
	 	<div class = "col">
			<input style = "font-size:15px;"type = "text" name = "ParolaActuala" id="ParolalActuala"></input>
		<div id = "eParolaActuala"></div>
		</div><br>
		<input style = "margin-left:0px;"class = "btn" id= "EmailSubmit" type = "submit" value = "Modifica"></input>

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
	 	<div class = "col">
			<input type = "text" name = "ParolaActuala2" id="ParolaActuala2"></input>
		<div id = "eParolaActuala2"></div>
		</div>
	</div>

	<div class="form-group">
			<label class = "col" for = "NouaParola" >Noua Parola:</label>
	 	<div class = "col">
			<input type = "text" name = "NouaParola" id="NouaParola"></input>
		<div id = "eNouaParola"></div>
		</div>
	</div>

	
	<div class="form-group">
			<label class = "col" for = "NouaParola2" >Noua Parola:</label>
	 	<div class = "col">
			<input type = "text" name = "NouaParola2" id="NouaParola2"></input>
		<div id = "eNouaParola2"></div>
		</div><br>
	<input style = "margin-left:0px;"class = "btn" id= "ParolaSubmit" type = "submit" value = "Modifica"></input>
	</div>

</form>
</div>
</div>
</div>

@stop