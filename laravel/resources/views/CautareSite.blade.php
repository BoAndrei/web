@extends('layouts.PrimaPaginaLayout')

@section('CautareSite')
<script src = "/js/SiteSearch.js"></script>
<script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>


<form class="SearchForm form-wrapper cf"name = "cautaresiteform"id = "TopicForm" action = "/cautare/" role="search" method = "GET">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati utilizator" required>
	
	<button onClick = "submitForm();" id= "DateSubmit" type = "submit" value = "&#128269;">Search</button>


<select  data-placeholder="Cauta utilizator dupa..." style="width:170px;" class="chosen-select">
    <option value=""></option>
    <option value="1">Username</option>
    <option value="2">Localitate</option>
    <option value="3">NrTelefon</option>
    <option value="4">Email</option>
    <option value="5">Nume</option>
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

  
  <?php /*
<nav class = "drop">
	<ul>
		<li class = "option">Cauta<div id="down-triangle"></div>
			<ul class = "cautadown">
				<li><a>Email<div class="circle"></div></a></li>
				<li><a>Username<div class="circle"></div></a></li>
				<li><a>Nume<div class="circle"></div></a></li>
				<li><a>Localitate<div class="circle"></div></a></li>
				<li><a>NrTelefon<div class="circle"></div></a></li>
				
			</ul>
		</li>
	</ul>
</nav>
 */?>

</form>





@stop