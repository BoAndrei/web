@extends('layouts.PrimaPaginaLayout')

@section('Tichete')
<div class = "tabel-contact">

<div class = "first-color">

	<h1>Tichete Trimise</h1>


</div>


<table class="table table-striped table-bordered">


				    <thead>
				        <tr>
				            <th><a href="supporttickets.php?orderby=date">Data trimiterii</a></th>
				            <th><a href="supporttickets.php?orderby=dept">Numar de ordine</a></th>
				            <th><a href="supporttickets.php?orderby=subject">Subiect</a></th>
				            <th><a href="supporttickets.php?orderby=status">Status</a></th>
				            <th>&nbsp;</th>
				        </tr>
				    </thead>
				    <tbody>
	@foreach($msj_contact as $msj)										    
						<tr>
				            <td>{{ $msj->mesaj_c_data }}</td>
				            <td>#{{ $msj->mesaj_c_id }}</td>
				            <td><div align="left">{{ $msj->mesaj_c_titlu }}</div></td>
				            @if($msj->mesaj_c_status == 0)
				            <td><span style="color:red">In asteptare</span></td>
				            @else
 							<td><span style="color:green">Raspuns</span></td>
				            @endif
				            <td class="textcenter"><a class = "tableBtn"href="/tichet/{{ $msj->mesaj_c_id }}">Vezi Tichet</a></td>
				        </tr>
					
	@endforeach
	</tbody>
</table>
</div>
@stop