@extends('layouts.PrimaPaginaLayout')

<style type="text/css">

.regular{
	color:black;
	font-weight: bold;
}

.marker {
	
	color:black;
}

.new {
	font-weight: normal;
}



</style>


@section('Mesaje')
<script type="text/javascript" src = "/js/SiteSearch.js"></script>
<script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>
<link href='/css/chosen.css' rel='stylesheet' />

<script src = "/js/Mesaje.js"></script>
<?php 
function schimba_data_format($data){
  $luni=array("ianuarie","februarie","martie","aprilie","mai","iunie","iulie","august","septembrie","octombrie",
  "noiembrie","decembrie");
  $an=''; $luna=''; $zi=''; $ora='';
  for($i=0;$i<=3;$i++) $an.=$data[$i];
  for($i=5; $i<=6;$i++) $luna.=$data[$i];
  $luna=$luni[intval($luna)-1];
  for($i=8; $i<=9; $i++) $zi.=$data[$i]; $zi=intval($zi);
  for($i=11;$i<strlen($data);$i++) $ora.=$data[$i];
  return $data=$zi.' '.$luna.' '.$an.' '.$ora;
}


?>
<style type="text/css">
#MesajeForm{
	right: 10px;
	
	position: relative;
	
}
label { display: inline-block;  }​
</style>



<div style = "margin-top:-739px"class = "Mesaje">


<div style = "width:900px;"class="CSSTableGenerator" >
<table class="table">

<tbody>
	<td><i style = "cursor:pointer;"class="fa fa-square-o"></i></td>
	
	<div class = "CheckList">
		<div style = "cursor:pointer;" class = "dropp all">Toate</div>
		<div style = "cursor:pointer;" class = "dropp necitit">Necitite</div>
		<div style = "cursor:pointer;" class = "dropp citit">Citite</div>
	</div>

	<td>Expeditor</td>
	<td>Subiect</td>
	<td>Data primirii</td>
	<form id = "DeleteForm" method = "POST" action = "/stergemesajd">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($mesaje as $mesaj)
@if($mesaj->viz_exp != 1)
               @if($mesaj->citit == 1 && $mesaj->destinatar_id == Auth::user()->user_id )


	<tr style = "position:relative;">
	<td><input class = "questionCheckBox citite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a style = "padding:10px;font-weight:normal;color:#5C5C5C;"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$mesaj->username}}</a></td>
	<td><a style = "padding:10px;font-weight:normal;color:#5C5C5C;"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"> {{$mesaj->subiect}}</a></td>
	<td><a style = "padding:10px;font-weight:normal;color:#5C5C5C;"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	
	</tr>
	  @elseif($mesaj->citit != 1&& $mesaj->destinatar_id == Auth::user()->user_id )
	
<tr style = "position:relative;">
	<td><input class = "questionCheckBox necitite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$mesaj->username}}</a></td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"> {{$mesaj->subiect}}</a></td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	</tr>
  @endif
@endif     
    @endforeach<br>
<input style = "background-color:#EAEAEA;outline:none;position:relative;margin-bottom:20px;"type = "submit" class = "btn" value = "Sterge mesaje">
</form>

	</div>

	</div>



</div>
@stop