<div class = "SchimbareParola">
	<div id = "SchimbareParola">
	<a>Schimbare Parola<i style = "top:1px;margin-left:15px;"class="fa fa-level-down"></i></a>
	</div>
	<div class = "SchimbareParolaInputs">

	<form id = "ParolaForm" method = "POST" action = "/EditParola2/<?php echo Request::segment(1) ?>">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">


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