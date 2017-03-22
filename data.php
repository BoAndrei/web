<?php
  

include "connect.php";


$name = $_POST['nume'];
$description = $_POST['descriere'];
$price = $_POST['pret'];
$id = $_POST['id'];


$sql = mysqli_query($con,"UPDATE produse SET nume_produs='$name',descriere_produs='$description',pret_produs='$price' WHERE id_produs='$id'");

//echo 


  
  
  
  
?>
