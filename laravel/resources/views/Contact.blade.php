@extends('layouts.PrimaPaginaLayout')

@section('Contact')
 <script type="text/javascript" src="/js/chosen.jquery.js"></script>


<div class = "ContactNou container">
	@if (Auth::check())
		<form class = "form-horizontal" id = "TopicForm" method = "POST" action = "/contactnou">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">

<select name = "tip_tichet" data-placeholder="Tipul tichetului..." class="chosen-select">
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
<div class="form-group" style = "float:left;">
    <label class="control-label col-sm-2" for="subject">Subiect:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control input-lg" id="subject" name = "subiect" placeholder="">
    </div>
</div>

<br><br><br><br>

<div class="form-group">
	<div class="col-sm-10">
  <label for="comment">Mesaj:</label>

  <textarea id="comment"class = "message form-control"name = "mesaj" WRAP=HARD cols = "80" rows = "13" ></textarea>
</div>
</div>	

			<br><br>

			<input style = "width:100%;"type = "submit" class = "btnNou2" value = "Trimite Tichet">
		@else
			<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou2 autentificare" value = "Trebuie sa te loghezi ca sa poti trimite un ticket">
		@endif

		</form>






<div>
@stop