<?php
  
include "connect.php";


$name = $_POST['nume'];
$description = $_POST['descriere'];
$price = $_POST['pret'];
$id = $_POST['id'];
$default_image = "/uploads/anon.jpg";


$sql = mysqli_query($con,"INSERT INTO produse (nume_produs, descriere_produs, pret_produs,imagine_produs) VALUES ('$name','$description','$price','$default_image')");
//echo 
?>
