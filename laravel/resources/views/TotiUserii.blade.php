@extends('layouts.PrimaPaginaLayout')



<div class="CSSTableGenerator" >
<table class="table">

<tbody>
<td>Username</td>
	<td>Data inregistrarii</td>
	<td>User Type</td>
@foreach($Users as $users)
	<tr style = "position:relative;">
		@if($users->user_status == '1')
	<td style = "color:blue">{{$users->username}}</td>
	<td>{{$users->date_registered}}</td>
	<td>{{$users->user_type}}</td>
	@else
<td>{{$users->username}}</td>
	<td>{{$users->date_registered}}</td>
	<td>{{$users->user_type}}</td>
	</tr>
	@endif
	
@endforeach
</tbody>
</table>
</div>