@extends('layouts.PrimaPaginaLayout')
@section('SchimbareImagine')
<div class = "SchimbareImagine">

<?php if(Auth::user()->image){?>

	<img width = "250px" height = "250px" id = "thumb" src="/<?php echo Auth::user()->image; ?>">

<?php } else {?>


<img width = "250px" height = "250px" id = "thumb" src="/images/noimage.jpg">

<?php }?>

<?php 



 ?>
 <form action="/EditImagine" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
<div class="form-group">
      <label>Poster:</label>
      <div class="col-lg-10">
          <input id="input-5" type="file" name = "image"  >
        
        </div>
    </div>
</div>

<input type = "submit" class = "btn"value = "Schimba Imaginea"></input>
</form>
@stop