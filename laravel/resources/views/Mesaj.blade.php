@extends('layouts.PrimaPaginaLayout')


@section('Mesaj')
<div class = "Mesaje">
<div class = "MesajeWrapper">
<div class = "Compune">Compune un mesaj</div>
		<form id = "MesajeForm" action = "/TrimiteMesaj" method = "post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
			<div class="form-group">
				
		 	<div class = "col">
		 		<label class = "col" for = "catre" >Catre:</label>
				<input type = "text" name = "catre" id="catre"></input>
			<div id = "eCatre"></div>
			</div>
			</div>

			<div class="form-group">
				
		 	<div class = "col">
		 		<label class = "col" for = "subiect" >Subiect:</label>
				<input type = "textarea" name = "subiect" id="subiect"></input>
			<div id = "eSubiect"></div>
			</div>
			</div>

			<div class="form-group">
				
		 	<div class = "col">
		 		<label class = "col" for = "mesaj" >Mesaj:</label>
				<textarea id="mesaj" name = "mesaj" rows="10" cols="70"></textarea>
			</div>
			</div>
<input style = "margin-left:0px;"class = "btnNou" id= "MesajSubmit" type = "submit" value = "Trimite mesaj"></input>
		</form>

</div>
<div class = "DisplayMessages">

	<div class = "upperIndex">
		<span style = "font-weight:bold;">Inbox</span>
		<select onChange="window.location.href=this.value">

  <option value="/profil/{{Auth::user()->username}}/mesaje/mesaje-trimise">Mesaje Trimise</option>
<option value="/profil/{{Auth::user()->username}}/mesaje">Mesaje Primite</option>
</select>
		<input style = "margin-left:470px;"type = "text" value = "Cautare"></input>
	</div>

	<div class = "lowerIndex">
		<?php $sup = Request::segment(5)?>
		@foreach($mesaje as $mesaj)
		  

			@if($sup == $mesaj->mesaj_id )
				<span>De la {{$mesaj->username}} :</span><br><br>
				<span>Subiect : {{$mesaj->subiect}} </span><br><br>
				<span>Continut : {{ $mesaj->mesaj }}</span>
			@endif

	
			
		
	@endforeach
	<br><br><input type = "submit" id = "Raspunde"value = "Raspunde"></input>
	</div>

</div>

@stop
