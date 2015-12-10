@extends('layouts.PrimaPaginaLayout')

@section('RaspunsurileMele')
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
<div class = "topicurilemele">
	
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group" style = " font-weight: normal;">
		
	
			@foreach($topics as $topic )
			
		
			<?php 
$string = strip_tags($topic->contents);
if (strlen($string) > 250) {

    $stringCut = substr($string, 0, 250);

    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...(mai mult)'; 
}
			?>
<div style = "background-color:#FFFEED;"class = "Topicss">
	<div >
				
				</div><br>
				
					<span style = "font-size:16px;font-weight:bold;margin-left:7px;"><?php $date = new DateTime($topic->reply_date_added);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}</span><br><br>
					<br>
			
			<?php $input = $topic->content;$output = preg_replace('/(?:(?:\r\n|\r|\n)\s*){2}/s', "\n\n", $input);; ?>
						<span style = "word-break: break-all;font-weight:normal;"><b>{!! nl2br($output) !!}</b></span>
				<br><br><b>Raspuns la intrebarea:</b><br>
					
					<a style = "color:black;display: inline; height: 100%;width: 600px;" class = "new"id = "" name = "topic"href = "/topic/{{ $topic->categ_urlslug }}/{{ $topic->topic_urlslug }}"><?php echo $string; ?></a>
				
			</div><br>
			
			@endforeach

		
	</div>


<br><br>




</div>

@stop