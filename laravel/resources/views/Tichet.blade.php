@extends('layouts.PrimaPaginaLayout')

@section('Tichet')
<div class = "tabel-contact">

<div class = "first-color">

	<h1>Vizualizare tichet nr. #{{Request::segment(2)}}</h1>

</div>

<div class = "client-msg">
	
	<div class = "client-msg-header">
			@foreach($msj_contact as $msj)

				<span>{{ $msj->mesaj_c_titlu }}</span>
					<br>
					<hr style = "border-bottom: dotted 1px;">
					<br>
				<span>Mesaj de la {{ $msj->username }}:</span>
				<span style = "float:right;">{{ $msj->mesaj_c_data }}</span>
					<br><br>
				<span style = "font-weight:normal; font-size:15px;line-height:25px;">{{ $msj->mesaj_c_subiect }}</span>


			@endforeach
	</div>


</div>



</div>
@stop