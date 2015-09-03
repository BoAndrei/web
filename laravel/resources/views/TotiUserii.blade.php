@extends('layouts.PrimaPaginaLayout')



<div class = "TabelUsers">
<table class="table">
<thead><tr><th>Username</th><th>Data inregistrarii</th></tr></thead>
<tbody>

@foreach($Users as $users)
	<tr style = "position:relative;">
		@if($users->user_status == '1')
	<td style = "color:red">{{$users->username}}</td>
	<td>{{$users->date_registered}}</td>
	@else
<td>{{$users->username}}</td>
	<td>{{$users->date_registered}}</td>
	</tr>
	@endif
	
@endforeach
</tbody>
</table>
</div>