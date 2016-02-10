@extends('layouts.PrimaPaginaLayout')


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

<div class = "container">

<table class="table table-hover table-striped">
	<thead>
      <tr>
      	<th></th>
        <th>Expeditor</th>
        <th>Subiect</th>
        <th>Data primirii</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($mesaje as $mesaj)
@if($mesaj->viz_exp != 1)
               @if($mesaj->citit == 1 && $mesaj->destinatar_id == Auth::user()->user_id )


	<tr class = "citite"id = "{{$mesaj->mesaj_id}}"onclick="showMessage({{$mesaj->mesaj_id}});">
	<td ><input class = "questionCheckBox citite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}">{{$mesaj->username}}</a></td>
	<td><a class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"> {{$mesaj->subiect}}</a></td>
	<td class = "date"><a class = "date" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	
	</tr>

	<tr class='panel panel-default {{$mesaj->mesaj_id}}' style = "display:none;" >
        <td colspan='7'>
            <div class="panel-body">{{ $mesaj->mesaj }}</div>
        </td>
    </tr>

	  @elseif($mesaj->citit != 1 && $mesaj->destinatar_id == Auth::user()->user_id )
	
<tr class = "necitite" id = "{{$mesaj->mesaj_id}}" onclick="showMessage({{$mesaj->mesaj_id}});">
	<td><input class = "questionCheckBox necitite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a style = "font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}">{{$mesaj->username}}</a></td>
	<td><a style = "font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"> {{$mesaj->subiect}}</a></td>
	<td class = "date"><a style = "font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	</tr>

	<tr class='panel panel-default {{$mesaj->mesaj_id}}' style = "display:none;" >
        <td colspan='7'>
            <div class="panel-body">{{ $mesaj->mesaj }}</div>
        </td>
    </tr>
  @endif
@endif     
    @endforeach
    </tbody>

</table>
</div>
@stop

<?php /*

 @foreach ($mesaje as $mesaj)
@if($mesaj->viz_exp != 1)
               @if($mesaj->citit == 1 && $mesaj->destinatar_id == Auth::user()->user_id )


	<tr style = "position:relative;">
	<td ><input class = "questionCheckBox citite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$mesaj->username}}</a></td>
	<td><a class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"> {{$mesaj->subiect}}</a></td>
	<td><a class = "regular" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	
	</tr>
	  @elseif($mesaj->citit != 1 && $mesaj->destinatar_id == Auth::user()->user_id )
	
<tr style = "position:relative;">
	<td><input class = "questionCheckBox necitite" tabindex="1" name = "check[]"type = "checkbox" value = "{{$mesaj->mesaj_id}}">	</td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "username" value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}">{{$mesaj->username}}</a></td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "subiect"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"> {{$mesaj->subiect}}</a></td>
	<td><a style = "padding:10px;font-weight:bold"class = "regular" id = "{{$mesaj->mesaj_id}}" name = "data_mesajului"value = "{{$mesaj->mesaj_id}}"href = "/profil/{{Auth::user()->username}}/mesaje/citeste-mesaj/{{ $mesaj->mesaj_id }}"><?php $date = new DateTime($mesaj->data_mesajului);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}<a></td>
	
	</tr>
  @endif
@endif     
    @endforeach



*/?>