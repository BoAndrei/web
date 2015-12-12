@extends('layouts.PrimaPaginaLayout')

@section('Contact')
 <script type="text/javascript" src="/js/chosen.jquery.js"></script>

 <style type="text/css">

.chosen-container {
	position: absolute;
	top: 150px;
	left: 340px;
}

 </style>
<div class = "ContactNou">
	@if (Auth::check())
		<form id = "TopicForm" method = "POST" action = "/contactnou">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">

<select name = "tip_tichet" data-placeholder="Tipul tichetului..." style="width:170px;" class="chosen-select">
    <option value=""></option>
    <option value="Sugestie pentru site">Sugestie pentru site</option>
    <option value="Problema Tehnica">Problema Tehnica</option>
    <option value="Eroare gasita">Eroare gasita</option>
    <option value="Raportare user">Raportare user</option>
</select>

<script type="text/javascript">

var config = {
      '.chosen-select'           : {search_contains:true},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Nu s-a gasit nici un rezultat'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

</script>




			 <br><br>
<label class="control-label bold" for="subject">Subiect</label>
<input class="input-xlarge" type="text" name="subiect" id="subject" value="" style="width:100%;">


<br><br>
	

			<label class="control-label bold" for="message">Mesaj</label>				
				<textarea class = "message"name = "mesaj" WRAP=HARD cols = "80" rows = "13" ></textarea>
			

			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2" value = "Trimite Tichet">
		@else
			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2 autentificare" value = "Trebuie sa te loghezi ca sa poti trimite un ticket">
		@endif

		</form>






<div>
@stop