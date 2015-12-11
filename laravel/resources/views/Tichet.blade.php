@extends('layouts.PrimaPaginaLayout')

@section('Tichet')
<div class = "tabel-contact">

<div class = "first-color">

	<h1>Vizualizare tichet nr. #{{Request::segment(2)}}</h1>

</div>
@foreach($msj_contact as $msj)
<div class = "client-msg">
	
	<div class = "client-msg-header">
			

				<span>{{ $msj->mesaj_c_titlu }}</span>
					<br>
					<hr style = "border-bottom: dotted 1px;">
					<br>
				<span>Mesaj de la {{ $msj->username }}:</span>
				<span style = "float:right;">{{ $msj->mesaj_c_data }}</span>
					<br><br>
				<span style = "font-weight:normal; font-size:15px;line-height:25px;">{{ $msj->mesaj_c_subiect }}</span>


			
	</div>

@if($msj->mesaj_c_raspuns != '')

<div class = "staff-msg">
	
	<div class = "staff-msg-header">

				
				<span>Mesaj pentru {{ $msj->username }}:</span>
				<span style = "float:right;">{{ $msj->mesaj_c_raspuns_data }}</span>
					<br><br>
				<span style = "font-weight:normal; font-size:15px;line-height:25px;">{{ $msj->mesaj_c_raspuns }}</span>
	</div>

</div>
	@if(Auth::user()->user_type == 'admin')
	<div class = "ContactNou">
		<form id = "TopicForm" method = "POST" action = "/contactraspuns">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <input type = "hidden" name = "mesaj_c_id" value = "{{ $msj->mesaj_c_id }}">
	

			<label class="control-label bold" for="message">Mesaj</label>				
				<textarea class = "message"name = "raspuns" WRAP=HARD cols = "80" rows = "13" ></textarea>
			

			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2" value = "Trimite Tichet">
		

		</form>
</div>


	@endif


</div>



@endif
@endforeach
</div>
@stop