<?php
include "connect.php";


session_start();
if(!isset($_SESSION['user']))
    header('Location: /');

$id = $_GET['id'];
if (isset($_FILES["fileToUpload"]["name"])) {



    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    $name = $_FILES["fileToUpload"]["name"];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];

    $location = 'uploads/';

    if (move_uploaded_file($tmp_name, $location.$name)){
        echo 'Uploaded';
    }

    if(!$_FILES["fileToUpload"]["name"])
    {
        $sql = "SELECT * FROM produse WHERE id_produs='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $target_file = $row['imagine_produs'];

    }       



    $sql = mysqli_query($con,"UPDATE produse SET imagine_produs='$target_file' WHERE id_produs='$id'");     



}








header('Location: /');
?>




