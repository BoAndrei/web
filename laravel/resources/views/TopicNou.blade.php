@extends('layouts.PrimaPaginaLayout')
@section('TopicNou')
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
#TopicForm{
  display: inline-block;
  margin-top: 600px;
  right: 250px;
  position: absolute;

  padding: 10px;
  
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>
<script src = "/js/jquery.livepreview.js"></script>
<script src = "/js/TopicNou.js"></script>
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
			
				<div  style="display: inline-block; position: relative;" id = "resizable">						
					<textarea id = "styled" class = "content-box"name = "Topic" WRAP=HARD cols = "72" rows = "10" placeholder = "Raspunde la aceasta intrebare"></textarea>
				</div>
        
<input id="a" type="text" value="Hello world" /><br/>
<input id="finalcount" value="0" disabled />
               <div style = "color:orange" id = "countWords"></div>  
  <br>
  	<div class = "prev">
			<img  style = "float:left;width:60px;height:60xp;" src="/<?php echo Auth::user()->image; ?>">
			<span style = "margin-left:5px;">{{ Auth::user()->username }} intreaba:</span><br>
			<span style = "margin-left:5px;"><?php $dataa = date('Y-m-d');?>{{ schimba_data_format($dataa) }}</span>
					
		<div class="preview"></div>
	

	</div>
</div>

		
	</div>



<br><br>
<input style = "margin-left:250px;"class = "btnNou" id= "DateSubmit" type = "submit" value = "Trimite topicul"></input>
		
</form>

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