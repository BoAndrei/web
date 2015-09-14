@extends('layouts.PrimaPaginaLayout')
@section('TopicNou')

<style type="text/css">
#TopicForm{
  display: inline-block;
  margin-top: 200px;
  right: 550px;
  position: absolute;
  background-color: #009900;
  padding: 10px;
  border-radius: 15px;
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>

<?php 

if(isset($_POST['name']) && $_POST['name'] != ""){

   die(var_dump($_POST['name'])); }

?>



<div class = "SetarileContului">
		
		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<select class = "categorie"name = "categorie">

			@foreach($categorii as $categori)

				<option value = "{{$categori->denumire}}">{{$categori->denumire}}</option>

			@endforeach

		</select>
	<div class="form-group">
		<div class = "col">
			
			
		<textarea onInput="checkWords()" maxlength = "1500"cols="66" rows="16"name="Topic" id="styled" placeholder = "Introdu topicul aici..."></textarea>
		<div style = "vertical-align: top;"id = "eDenumireC"> </div>
		</div>

 <div style = "color:orange" id = "countWords"></div>
		

	</div>



<br><br>
<input style = "margin-left:250px;"class = "btnNou" id= "DateSubmit" type = "submit" value = "Trimite topicul"></input>
		
</form>
<div class = "boxT3">
Reguli pentru postarea unui topic:
<br><br>
<span>1.</span>

</div>
</div>
<script type="text/javascript">
  
  $( document ).ready(function(){
    var text_max = 1500;
    $( '#countWords' ).html('Mai poti scrie inca ' + text_max + ' de litere');

    $('#styled').keyup(function(){
      var text_length = $( '#styled' ).val().length;
      var text_remaining = text_max - text_length;

      $('#countWords').html('Mai poti scrie inca ' + text_remaining + ' de litere')

    });
  });


</script>


@stop