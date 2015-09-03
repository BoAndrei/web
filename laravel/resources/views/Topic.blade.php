@extends('layouts.PrimaPaginaLayout')




@section('Topic')

<style type="text/css">

label { display: inline-block; width: 140px; text-align: right; }​
</style>

	
	<div  id = "TopicForm">
		
			
	

	<div class="form-group">
		<div style = "margin-left:367px;margin-top:160px;"class = "arrow_box_border"></div>
		<div style = "margin-left:366px;margin-top:160px;"class = "arrow_box"></div>
				<div class = "topic">


				@foreach($topic as $topics)
<img  style = "float:left;width:100px;height:100xp;margin-left:-150px;margin-top:-30px;position:relative;" src="/<?php echo $topics->image; ?>">
 
				
						<span style = "margin-right:450px;">{{ $topics->username }} intreaba:</span><br><br>
						<span >{{ $topics->contents }}</span><br><br>
						<div class = "reply">
						<form class = "" action = "/PostReply" method = "POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class = "form-group">
									<div class = "arrow"></div>
								<textarea class = "content-box"id = "reply"name = "reply" cols = "40" rows = "10" placeholder = "Raspunde la aceasta intrebare"></textarea>
							</div>
								<input name = "topic_id" type = "hidden" value = "<?php echo Request::segment(2); ?>">
								<input style = "margin-left:20px;position:relative;"type = "submit" class = "btnNou">
						</form>
					</div>
				@endforeach
			</div><br><br><?php $topict = DB::table('replies')->where('topic',Request::segment(2))->get(); ?>
		<div style = "width:625px;padding:20px;background-color:deepskyblue;border-radius:10px;"class = "raspunsuri">Raspunsuri:<?php echo count($topict); ?></div>
				<br><br><br>
				@foreach($replies as $reply)
				
				 
			<div class = "topic">
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