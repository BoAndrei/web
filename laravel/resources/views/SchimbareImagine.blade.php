@extends('layouts.PrimaPaginaLayout')
@section('SchimbareImagine')
<div class = "SchimbareImagine">

<?php if(Auth::user()->image){?>

	<img width = "250px" height = "250px" id = "thumb" src="/images/sad.jpg">

<?php } else {?>


<img width = "250px" height = "250px" id = "thumb" src="/images/noimage.jpg">

<?php }?>

<?php 


$target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {
       

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
     
        echo "Sorry, file already exists.";
        $uploadOk = 0;

    }

    if ($uploadOk == 0) {
      die(mysqli_error($dbc));
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }

 ?>
 <form action="SchimbareImagine.blade.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
      <label>Poster:</label>
      <div class="col-lg-10">
          <input id="input-5" type="file" name = "image" >
        </div>
    </div>
</div>

<button name = "submit" type="submit" id = "submit" >Submit</button>
</form>
@stop