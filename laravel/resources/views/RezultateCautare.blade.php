@extends('layouts.PrimaPaginaLayout')


@section('RezultateCautare')
<script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>
<style type="text/css">


.CSSTableGenerator tr:first-child td:first-child{
  border-width:0px 0px 1px 0px;
  width: 200px;
}

.CSSTableGenerator td{
  vertical-align:middle;
  
  
  border:2px solid #cccccc;
  border-width:0px 0px 1px 0px;
  text-align:left;
 padding: 10px;
  font-size:18px;
  font-family:Arial;
  font-weight:normal;
  color:#000000;
   text-align: center;
}

.CSSTableGenerator {
  margin:0px;padding:0px;
  width:700px;
  height: auto;
  border:1px solid #000000;
  float: right;
  position: absolute;
  margin-left: 20%;
  margin-top:50px;
  font-size: 20px;
}


</style>
<script src = "/js/SiteSearch.js"></script>

<form class="SearchForm form-wrapper cf"name = "cautaresiteform"id = "TopicForm" action = "/cautare/" role="search" method = "GET">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati topic" required>
	
	<button onClick = "submitForm();" id= "DateSubmit" type = "submit" value = "&#128269;">Search</button>

				

<script type="text/javascript">
	$(document).ready(function() {
		$(".chosen-select").chosen()
	});
	</script>
<select  tabindex="2" data-placeholder="Alege un filtru..." style="width:350px;" class="chosen-select">
    <option value="1">Username</option>
    <option value="2">Localitate</option>
    <option value="3">NrTelefon</option>
    <option value="4">Email</option>
    <option value="5">Nume</option>
</select>




<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Nu s-a gasit nici un rezultat'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

				
	

</form>

<div class="CSSTableGenerator" >
<table class="table">

<tbody>
	<td>Username</td>
	<td>Data inregistrarii</td>
	<td>Email</td>

@foreach($rezultate as $rezultat)

	<tr style = "position:relative;">
		
	<td>{{$rezultat->username}}</td>
	<td>{{$rezultat->date_registered}}</td>
	<td>{{$rezultat->email}}</td>
	
</tr>
	
@endforeach

</tbody>
</table>
</div>


@stop