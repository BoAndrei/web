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
  padding: 10px;
}


label { display: inline-block; width: 140px; text-align: right; }​
</style>
<script src = "/js/jquery.livepreview.js"></script>
<script src = "/js/TopicNou.js"></script>
 <script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>

<script src="/js/bootstrap-tagsinput.js" type="text/javascript" charset="utf-8"></script>



<div class = "TopicNou container">
		
		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">



<div class="form-group">
        <div class="col-sm-10"> 

<select  name = "categorie" data-placeholder="Alege categorie..." style="width:170px;" class="categorie chosen-select">
    <option value = ""></option>
    @foreach($categorii as $categori)

        <option value = "{{$categori->denumire}}">{{$categori->denumire}}</option>

      @endforeach
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
</div>
</div>

	


	<div style = "margin-top:50px;"class="form-group">

			


			<div class="form-group">
        <div class="col-sm-10">					
					<textarea id = "styled" class = "form-control content-box effect7"name = "Topic" WRAP=HARD cols = "72" rows = "10" placeholder = "Pune o intrebare"></textarea>
				</div>
      </div>

<div class="form-group">
        <div class="col-sm-10"> 
<select id = "select"name = "tags[]" multiple ></select>
</div>
</div>


<br><br>
<div class="form-group">
        <div class="col-sm-10"> 
<!--
<input id="finalcount" value="0" disabled />
               <div style = "color:orange" id = "countWords"></div>  -->

            <h3 style = "color:green;">Preview</h3>
  	<div class = "prev">
			<img  style = "float:left;width:60px;height:60xp;" src="/<?php echo Auth::user()->image; ?>">
			<span style = "margin-left:5px;">{{ Auth::user()->username }} intreaba:</span><br>
			<span style = "margin-left:5px;"><?php $dataa = date('Y-m-d');?>{{ schimba_data_format($dataa) }}</span>
					


		<div class="preview"></div>
	
   
	</div>
      



	</div>

</div>
</div>

<br><br>
<div class="form-group">
        <div class="col-sm-10"> 
<div style = "text-align:center;">
<input class = "btnNou" id= "DateSubmit" type = "submit" value = "Trimite topicul"></input>
		</div>

    </div>
  </div>
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