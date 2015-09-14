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
</script>

<script type="text/javascript">
$(document).ready(function () {
	
	$('#resizable').resizable({
    	handles: {
        	 s: $('.ui-resizable-s')
    	},

    	alsoResize: $('textarea')
	});
});
</script>

<script src = "/js/LikeButton.js"></script>

<style type="text/css">

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
		<div style = "margin-left:367px;margin-top:160px;"class = "arrow_box_border"></div>
		<div style = "margin-left:366px;margin-top:160px;"class = "arrow_box"></div>
				<div class = "topic">


				@foreach($topic as $topics)
<img  style = "float:left;width:100px;height:100xp;margin-left:-150px;margin-top:-30px;position:relative;" src="/<?php echo $topics->image; ?>">

@if(Auth::check() && Auth::user()->user_type == 'admin')
			
<input class = "btn-x"  type="button" value = "&#10006;" onclick="location.href='/topicdelete/<?php echo Request::segment(3); ?>';">
		@endif		
						<span style = "margin-right:450px;">{{ $topics->username }} intreaba:</span><br><br>
						<span ><?php echo wordwrap($parsedown->text($topics->contents), 65, "<br />", true); ?></span><br><br>
						
					
					
					

				@endforeach
<?php $id = DB::table('topics')->where('topic_urlslug',Request::segment(3))->first(); $topic_id = $id->topic_id; ?>
<form method = "POST" id = "LikesForm" action = "/likeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-up fa-2x" id = "likeButton" type = "submit" class = "btnNou" value = "Like">
		<span style = "margin-left:0px;font-size:15px;font-weight:bold;color:black;"id = "likes">{{$id->likes}} likes</span>
		</button>
		

</form>

<form method = "POST" id = "DislikeForm" action = "/dislikeAdd">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		
				
<input name = "topic_id" type = "hidden" value = "<?php echo $topic_id; ?>">
<button class="fa fa-thumbs-down fa-2x" id = "dislikeButton" type = "submit" class = "btnNou" value = "disLike">
		<span style = "margin-left:0px;font-size:15px;font-weight:bold;color:black;"id = "dislikes">{{$id->dislikes}} dislikes</span>
		</button>
		

</form>

			</div><br>
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
			<?php $topict = DB::table('replies')->where('topic',Request::segment(3))->get(); ?>
		<div style = "width:625px;padding:20px;background-color:deepskyblue;border-radius:10px;"class = "raspunsuri">Raspunsuri:<?php echo count($topict); ?></div>
				<br><br><br>
				@foreach($replies as $reply)
				
				 
			<div class = "topic">
				@if(Auth::check() && Auth::user()->user_type == 'admin')
			
<input class = "btn-x"  type="button" value = "&#10006;" onclick="location.href='/replydelete/{{ $reply->reply_id }}';">
		@endif
<div style = "position:relative;margin-left:-30px;margin-top:-25px;"class = "arrow_box_border"></div>
		<div style = "position:relative;margin-left:-30px;margin-top:-30px;"class = "arrow_box"></div>
			
					<span style = "font-size:16px;font-weight:normal;margin-right:450px;">{{ $reply->username }} raspunde:</span><br><br>
						<img  style = "width:100px;height:100px;float:left;margin-left:-150px;margin-top:-67px;position:relative;" src="/<?php echo $reply->image; ?>">
						<span >{{ $reply->content }}</span>
			</div>	<br><br>
				@endforeach
			

	</div>


<br><br>

</div>

@stop