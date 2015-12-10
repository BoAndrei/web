@extends('layouts.PrimaPaginaLayout')

@section('TopicSearch')
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
<script src = "/js/Search.js"></script>
<style type="text/css">
#TopicForm{
	
	display: inline-block;
	
}
a {
	color:blue;
	font-weight: bold;
	font-size: 15px;
}

a:hover {
   text-decoration: underline;

  
}
label { display: inline-block; width: 140px; text-align: right; }​
</style>

     <script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>

<form class="SearchForm form-wrapper cf"name = "searchform"id = "TopicForm" action = "/cauta/" role="search" method = "GET">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati topic" required>
	
	<button  id= "DateSubmit" type = "submit" value = "&#128269;">Search</button>
 

 <select  data-placeholder="Cauta..." style="width:170px;" class="chosen-select">
    <option value=""></option>
    <option value="topicuri">Cauta Topicuri</option>
    <option value="raspunsuri">Cauta Raspunsuri</option>
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


</form>

    
		
		<form id = "TopicForm" method = "POST" action = "/EditTopic">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group" style = " font-weight: normal;">
		
	
			@foreach($topics as $topic)

		
			<?php 
$string = strip_tags($topic->contents);
if (strlen($string) > 250) {

    $stringCut = substr($string, 0, 250);

    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...(mai mult)'; 
}
			?>
<div class = "Topicss">
	<div >
		
			<img  style = "float:left;width:50px;height:50px;margin-top:0px;margin-left:0px;position:relative;" src="/{{ $topic->image }}">
					<span style = "margin-left:5px;margin-top:0px;"><b>{{ $topic->username }}</b> raspunde:</span><br>
					<span style = "font-size:16px;font-weight:bold;margin-left:7px;"><?php $date = new DateTime($topic->reply_date_added);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}</span><br><br>
					<br>
			
			<?php $input = $topic->content;$output = preg_replace('/(?:(?:\r\n|\r|\n)\s*){2}/s', "\n\n", $input);; ?>
						
				<a style = "color:black;display: inline; height: 100%;width: 600px;" class = "new"id = "" name = "topic"href = "/topic/{{ $topic->categ_urlslug }}/{{ $topic->topic_urlslug }}">{!! nl2br($output) !!}</a>
				</div><br>
				
				
					
				
			</div><br>
			@endforeach

		
	</div>


<br><br>

</form>


@stop