@extends('layouts.PrimaPaginaLayout')




@section('Topic')
<?php 

 $id = DB::table("topics")->where("topic_urlslug",Request::segment(3))->first();

 $likes = $id->likes;
 $dislikes = $id->dislikes;
?>

<script type="text/javascript">
var my_var = <?php echo json_encode($likes); ?>;
var my_var2 = <?php echo json_encode($dislikes); ?>;
var topic = <?php echo json_encode(Request::segment(3)); ?>;

</script>
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

<script src = "/js/TopicJs.js"></script>
<script src = "/js/LikeButton.js"></script>
<script src = "/js/RaspunsAcceptat.js"></script>
<script src = "/js/Qtip.js"></script>
<style type="text/css">
#check {
	color:gray;
}
#check:hover {
	color:green;

}
button {
			background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline: none;
            margin-left:20px;
            position:relative;
            color:gray;
            
}

button:hover {
	color:black;
}

label { display: inline-block; width: 140px; text-align: right; }​
</style>
<?php require_once '/php/Parsedown.php';
$parsedown = new Parsedown();

//echo $parsedown->text($text);
 ?>
 @if(Auth::check())
<?php 

$topic_id = DB::table('topics')->where('topic_urlslug',Request::segment(3))->first();

$likes = DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',$topic_id->topic_id)->first();
$dislikes = DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',$topic_id->topic_id)->first();

if(count($likes) != 0)
{
	echo '<style>

		button#likeButton {
			color: green;
		}

		button#likeButton:hover {
	color:green;
}

	</style>';
}

if(count($dislikes) != 0)
{
	echo '<style>

		button#dislikeButton {
			color: red;
		}

		button#dislikeButton:hover {
	color:red;
}

	</style>';
}

?>

@endif



	
	<div  id = "TopicForm">
		
			
	

	<div class="form-group">
		
				<div class = "topic">


				@foreach($topic as $topics)

@if(Auth::check() && Auth::user()->user_type == 'admin')
			
<input class = "btn-xx"  type="button" value = "&#10006;" onclick="location.href='/topicdelete/<?php echo Request::segment(3); ?>';">
		@endif		
		
		<img  style = "float:left;width:60px;height:60xp;" src="/<?php echo $topics->image; ?>">

						<span style = "margin-left:5px;">{{ $topics->username }} intreaba:</span><br>
						<span style = "margin-left:5px;"><?php $date = new DateTime($topics->date_added);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}</span>
					<br><br><br>
						<span ><?php echo wordwrap($parsedown->text($topics->contents), 65, "<br />", true); ?></span><br><br>
						
						@foreach($tag as $tags)
						<span class = "tag label label-info"><a style = "color:black;"href = "/cauta/tags/{{ $tags->nume_tag }}">{{ $tags->nume_tag }}</a></span>
						@endforeach
						<br><br>
					
					
					

				@endforeach
<div class = "likesdislikes" style = "display:inline-block;">

<?php $id = DB::table('topics')->where('topic_urlslug',Request::segment(3))->first(); $topic_id = $id->topic_id; ?>
<form class = "inline" method = "POST" id = "LikesForm" action = "/likeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-up fa-2x" id = "likeButton" type = "submit" class = "btnNou" value = "Like">
		<span style = "margin-left:0px;font-size:13px;font-weight:bold;color:black;"id = "likes">{{$id->likes}} likes</span>
		</button>
		

</form>

<form class = "inline"method = "POST" id = "DislikeForm" action = "/dislikeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-down fa-2x" id = "dislikeButton" type = "submit" class = "btnNou" value = "disLike">
		<span style = "margin-left:0px;font-size:13px;font-weight:bold;color:black;"id = "dislikes">{{$id->dislikes}} dislikes</span>
		</button>
		

</form>

			</div><br>
		</div>
<div class = "reply">
						<form id = "form"class = "" action = "/PostReply" method = "POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<div class = "form-group">
									<div class = "arrow"></div>
								
								<div style="display: inline-block; position: relative;" id = "resizable">
								<textarea class = "content-box"id = "reply"name = "reply" cols = "40" rows = "10" placeholder = "Raspunde la aceasta intrebare"></textarea>
						
							</div>

							<div class="ui-resizable-handle ui-resizable-s"></div>
						<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou" value = "Raspunde">
						</div>
							
								<input name = "topic_id" type = "hidden" value = "<?php echo Request::segment(3); ?>">
								
						

						</form>
					</div>

			<br>
			<?php $topict = DB::table('replies')->where('topic',Request::segment(3))->get();$date = DB::table('replies')->where('topic',Request::segment(3))->orderBy('reply_date_added','DESC')->first(); ?>
		<div style = "width:625px;padding:20px;background-color:#BDFF7D;border-radius:2px;"class = "raspunsuri">

			<span> Raspunsuri: <?php echo count($topict); ?></span><br>
			
 

		</div>
				<br><br><br>


				@foreach($replies as $reply)
			
			<style type="text/css">

#check_{{$reply->reply_id}} {
	color:gray;
	margin-left:-100px;
	position: absolute;
}
#check_{{$reply->reply_id}}:hover {
	color:green;

}

			</style>
				
				<?php $vari = 0; if (DB::table('replies')->where('topic',Request::segment(3))->where('acceptat','1')->first()) $vari = DB::table('replies')->where('topic',Request::segment(3))->where('acceptat','1')->first();?>
		@if(Auth::check() && Auth::user()->user_type == 'admin' || $vari && $reply->reply_id == $vari->reply_id)
		@if($vari && $reply->reply_id == $vari->reply_id)
			
			<a onClick="raspuns_acceptat({{$reply->reply_id}})"name = "check"href = "javascript:void(0);"id = "check_{{$reply->reply_id}}" style = "color:green;cursor:pointer;"class="fa fa-check fa-3x acceptat"></a>
		@else	
			<a onClick="raspuns_acceptat({{$reply->reply_id}})"name = "check"href = "javascript:void(0);"id = "check_{{$reply->reply_id}}" style = "cursor:pointer;"class="fa fa-check fa-3x acceptat2"></a>
		@endif
@endif 
			<div class = "topic">
				
				<div>
				
				@if(Auth::check() && Auth::user()->user_type == 'admin' )
					<input class = "btn-xx"  type="button" value = "&#10006;" onclick="location.href='/replydelete/{{ $reply->reply_id }}';">
				@endif
				@if(Auth::check() && Auth::user()->user_id == $reply->author_id && $reply->acceptat != 1)
					
					<input class = "btn-xx"  type="button" value = "&#10006;" onclick="location.href='/replydelete/{{ $reply->reply_id }}';">
				@endif

					<!-- <div style = "position:relative;margin-left:-30px;margin-top:-25px;"class = "arrow_box_border"></div>
					<div style = "position:relative;margin-left:-30px;margin-top:-30px;"class = "arrow_box"></div>-->
			
					<img  style = "border:2px solid #B3B3B3;width:60px;height:60px;float:left;" src="/<?php echo $reply->image; ?>">
					<span style = "font-size:16px;font-weight:bold;margin-left:7px;">{{ $reply->username }} </span><br>
					<span style = "font-size:16px;font-weight:bold;margin-left:7px;"><?php $date = new DateTime($reply->reply_date_added);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}</span><br><br>
					<br>
			
			<?php $input = $reply->content;$output = preg_replace('/(?:(?:\r\n|\r|\n)\s*){2}/s', "\n\n", $input);; ?>
						<span style = "word-break: break-all;font-weight:normal;">{!! nl2br($output) !!}</span>
				
				</div>

				<br>
						<a href = "javascript:void(0)"onClick = "replyReply({{ $reply->reply_id }});" class = "reply->reply_id"style = "color:#00B200">Raspunde</a><br><br>
						
						
			@foreach($repliesReply as $replyReply)
				@if($reply->reply_id == $replyReply->replies_id )
					<div style = "margin-left:70px;padding:5px;"class = "repliesReply">
<img  style = "border:2px solid #B3B3B3;width:30px;height:30px;float:left;" src="/<?php echo $replyReply->image; ?>">
					<span style = "font-size:13px;font-weight:bold;margin-left:7px;">{{ $replyReply->username }}</span><br>
					<span style = "font-size:13px;font-weight:bold;margin-left:7px;"><?php $date = new DateTime($replyReply->date_added);$dataa = $date->format('Y-m-d H:i');?>{{ schimba_data_format($dataa) }}</span>
					
<br><br><?php $input = $replyReply->repliesReply_content;$output = preg_replace('/(?:(?:\r\n|\r|\n)\s*){2}/s', "\n\n", $input);; ?>
			
							<span style = "word-break: break-all;font-weight:normal;">{!! nl2br($output) !!}</span>
					
					</div><br>
				@endif

@endforeach
<form id = "{{ $reply->reply_id }}" style = "display:none;"action = "/PostReplyReply" method = "POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input name = "topic_id" type = "hidden" value = "<?php echo Request::segment(3); ?>">
								
							<textarea class = "content-boxR" name = "reply" cols = "10" rows = "2" placeholder = ""></textarea>
							<br><input style = "margin-left:250px;position:relative;font-size:13px;padding:6px 13px;"type = "submit" class = "btnNou" value = "Adauga Raspuns">
							<input name = "reply_id" type = "hidden" value = "{{ $reply->reply_id }}">
								
						</form>
			</div>	

			<br>

			<br>
				
				@endforeach
			

	</div>


<br><br>

</div>

@stop