@extends('layouts.PrimaPaginaLayout')

@section('CautareSite')

<script src = "/js/SiteSearch.js"></script>
<script type="text/javascript" src="/js/chosen.jquery.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>


<form class="SearchForm form-wrapper cf"name = "cautaresiteform"id = "TopicForm" action = "/cautare/" role="search" method = "GET">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input name = "search" type="text" list = "datalist" class="form-control" id = "search"  autocomplete = "off" placeholder="Cautati utilizator" required>
	
	<button onClick = "submitForm();" id= "DateSubmit" type = "submit" value = "&#128269;">Search</button>


<select  data-placeholder="Cauta utilizator dupa..." style="width:170px;" class="chosen-select">
    <option value=""></option>
    <option value="1">Username</option>
    <option value="2">Localitate</option>
    <option value="3">NrTelefon</option>
    <option value="4">Email</option>
    <option value="5">Nume</option>
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
<br><br><br><br>
<table class="table table-striped table-bordered">


            <thead>
                <tr>
                    <th><a href="supporttickets.php?orderby=date">User</a></th>
                    <th><a href="supporttickets.php?orderby=dept">Data inscrierii</a></th>
                    <th><a href="supporttickets.php?orderby=subject">Reputatie</a></th>
                    <th><a href="supporttickets.php?orderby=status">Status</a></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
        @foreach($users as $user)    
            
            <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->date_registered }}</td>
                    <td><div align="left"></div></td>
                 @if($user->user_status == 0)
                    <td><span style="color:gray">Offline</span></td>
                 @else
                    <td><span style="color:green">Online</span></td>
                  @endif
                    <td class="textcenter"><a class = "tableBtn"href="/tichet/">Trimite un mesaj</a></td>
                </tr>
          </tbody>

        @endforeach
</table>



@stop