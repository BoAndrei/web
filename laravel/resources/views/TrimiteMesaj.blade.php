@extends('layouts.PrimaPaginaLayout')

@section('TrimiteMesaj')
<style type="text/css">
.Mesaje {
	margin-top:-550px;
}


</style>
<div class = "Mesaje">
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

.MesajeWrapper {
	background-color: #F8F8F8;	
}


.chosen-container {
	left:15px;
}
label { display: inline-block;  }​
</style>



<div style = "margin-top:-550px"class = "Mesaje">
<div class = "MesajeWrapper">
<div class = "Compune">Compune un mesaj</div>
		<form  id = "MesajForm"action = "/TrimiteMesaj" method = "post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
			<div class="form-group">
				
		 	<div class = "col">
		<label class = "col" for = "subiect" >Catre:</label><br>
<script type="text/javascript">
$(document).ready(function() {
$('select').chosen({plugins: ['option-adding']});
});

</script>


<select  name="ids[]" id = "my-select"size="3" data-placeholder="Alege destinatarul..." style="right:50px;width:350px;" multiple class="chosen-select">
   @foreach ($users as $usernames)
 
    <option class = "s" value = "{{ $usernames->user_id }}">{{ $usernames->username }}</option>
   
   @endforeach
</select>



<script type="text/javascript">
    var config = {
      '.chosen-select'           : {search_contains:true},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:2},
      '.chosen-select-no-results': {no_results_text:'Nu s-a gasit nici un rezultat'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
				
			<div id = "eCatre"></div>
			</div>

</div><br><br>


			<div class="form-group">
		 	<div class = "col">
		 		<label class = "col" for = "subiect" >Subiect:</label><br>
				<input type = "textarea" name = "subiect" id="subiect"></input>
			<div id = "eSubiect"></div>
			</div>
			</div>

			<div class="form-group">
				
		 	<div class = "col">
		 		<label class = "col" for = "mesaj" >Mesaj:</label><br>
				<textarea style = "resize:none;"id="mesaj" name = "mesaj" rows="10" cols="70"></textarea>
			</div>
			</div>
<input style = "margin-left:200px;"class = "btnNou" id= "MesajSubmitt" type = "submit" value = "Trimite mesaj"></input>
	
		</form>

</div>
</div>

@stop