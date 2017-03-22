<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
session_start();
include "connect.php";



function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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


}

$nameErr = $descriptionErr = $priceErr = $fileErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ok = 1;


    if (empty($_POST["name"])) {
        $nameErr = "Name is required";$ok = 0;
    } else 
        $product_name = sanitize($_POST["name"]);

    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";$ok = 0;
    } else 
        $product_description = sanitize($_POST["description"]);

    if (empty($_POST["price"])) {
        $priceErr = "Price is required";$ok = 0;
    } else 
        {
            $product_price = sanitize($_POST["price"]);
             if (preg_match("/^[a-zA-Z ]*$/",$_POST["price"])) {
             $priceErr = "Only numbers required";$ok = 0;
        }
            
        }


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

    }
        if (!$_FILES["fileToUpload"]["name"])
        {
            $ok = 0;
            $fileErr = "You must introduce an image";
        }
        





    if($ok)
    {  
        $sql = mysqli_query($con,"INSERT INTO produse (nume_produs, descriere_produs, pret_produs, imagine_produs) VALUES ('$product_name','$product_description','$product_price', '$target_file')");
        header('Location: /');
    }

}

if(isset($_GET['id_produs']) && !isset($_GET['removeCart']))
{
    $_SESSION['cart'][] = $_GET['id_produs'];
    header('Location: /');

}

if(isset($_GET['removeCart']))
{
    foreach ($_SESSION['cart'] as $key => $value){
        if ($value == $_GET['id_produs']) {
            unset($_SESSION['cart'][$key]);
        }
    }
    header('Location: /');
}

if(isset($_GET['reset']))
{
    unset($_SESSION['cart']);
    header('Location: /');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="css.css">


    </head>
    <body>

        <ul>

            <?php if(!isset($_SESSION['user'])): ?>
            
                <li style="float:right"><a href="login.php">Login</a></li>
                
            <?php else: ?>
            
                <li style="float:right"><a href="logout.php">Logout</a></li>
                
            <?php endif; ?>

        </ul>


        <?php if(isset($_SESSION['user'])):?>
            <form action = "index.php" method = "POST" enctype="multipart/form-data" >
                <label for = "name">Name: </label>
                <input type = "text" name = "name" id = "name"/>
                <span name = "nameErr"><?php echo $nameErr; ?></span>
                <br><br>

                <label for = "descriere">Descriprion: </label>
                <input type = "text" name = "description" id = "descriere"/>
                <span name = "descriptioneErr"><?php echo $descriptionErr; ?></span>
                <br><br>

                <label for = "pret">Price: </label>
                <input type = "text" name = "price" id = "pret"/>
                <span name = "priceErr"><?php echo $priceErr; ?></span>
                <br><br>

                <label for = "fileToUpload">Image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                <span name = "fileErr"><?php echo $fileErr; ?></span><br><br>


                <input id = "insert" type = "submit" value = "Add item" />
            </form>
        <?php endif; ?>
        <br>

        <table style="width:100%">
            <caption>Cart products</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Descriprion</th>
                <th>Price</th>
                <th>Image</th>
                <th>Operation</th>
            </tr>


            <?php

            $perpage = 3;
            if(isset($_GET['page']))
                $page = $_GET['page'];

            if(!isset($_GET['page']) || $page == 1 || $page == 0)
                $page1 = 0;
            else
                $page1 = ($page*$perpage)-$perpage;

            $sql = "SELECT * FROM produse LIMIT $page1,$perpage";
            $sql2 = "SELECT * FROM produse";

            $result = mysqli_query($con,$sql);
            $result2 = mysqli_query($con,$sql2);
            $count = mysqli_num_rows($result2);
            $a = $count / $perpage;
            $a = ceil($a);


            if(isset($_SESSION['cart'])) 
                while($row = mysqli_fetch_assoc($result))
                {
                    if(!in_array($row['id_produs'],$_SESSION['cart']))
                    {
                        echo '
                        <tr>

                        <td>'.$row['id_produs'].'</td>
                        <td>'.$row['nume_produs'].'</td>
                        <td>'.$row['descriere_produs'].'</td>
                        <td>'.$row['pret_produs'].'</td>
                        <td><img src ="'.$row['imagine_produs'].'"</td><td>';

                        if(isset($_SESSION['user']))
                            echo '


                            <a href = "op.php?id_produs='.$row['id_produs'].'" name = "edit" />Edit information<?a><br>
                            <a class = "confirmation" href = "op.php?id_produs='.$row['id_produs'].'&delete=1" name = "delete" />Delete product<?a><br>
                            <a href = "op.php?id_produs='.$row['id_produs'].'&editimg=1" name = "editimg" />Edit the image<?a><br><br>
                            <a href = "index.php?id_produs='.$row['id_produs'].'" name = "addCart" />Add to cart<?a></td>


                            </tr>
                            ';
                        else
                            echo '<a href = "index.php?id_produs='.$row['id_produs'].'" name = "addCart" />Add to cart<?a></td>';
                    }
            }
            else
                if(!isset( $_SESSION['cart']))
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '
                        <tr>

                        <td>'.$row['id_produs'].'</td>
                        <td>'.$row['nume_produs'].'</td>
                        <td>'.$row['descriere_produs'].'</td>
                        <td>'.$row['pret_produs'].'</td>
                        <td><img src ="'.$row['imagine_produs'].'"</td>
                        ';

                        if(isset($_SESSION['user']))
                        {echo ' <td>
                            <a href = "op.php?id_produs='.$row['id_produs'].'" name = "edit" />Edit information<?a><br>
                            <a class = "confirmation" href = "op.php?id_produs='.$row['id_produs'].'&delete=1" name = "delete" />Delete product<?a><br>
                            <a href = "op.php?id_produs='.$row['id_produs'].'&editimg=1" name = "editimg" />Edit the image<?a><br><br>
                            <a href = "index.php?id_produs='.$row['id_produs'].'" name = "addCart" />Add to cart<?a></td>

                            </tr>
                            ';
                        }else
                            echo '<a href = "index.php?id_produs='.$row['id_produs'].'" name = "addCart" />Add to cart<?a> </td>';

                }
            ?>

            <?php
            for($b =1;$b <= $a; $b++)
            {
                echo '<a href = "?page='.$b.'"style = "text-decoration:none" href = '.$b.'>'.$b.' </a>';
            }

            ?>
        </table>
        <br><br><br>

        <table style="width:100%">
            <caption>Cart products</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Operation</th>
            </tr>
            <?php  

            $sql = "SELECT * FROM produse";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result))                
                if(isset( $_SESSION['cart']))
                    foreach($_SESSION['cart'] as $name)
                    {if($row['id_produs'] == $name)
                        echo '
                        <tr>

                        <td>'.$row['id_produs'].'</td>
                        <td>'.$row['nume_produs'].'</td>
                        <td>'.$row['descriere_produs'].'</td>
                        <td>'.$row['pret_produs'].'</td>
                        <td><img src ="'.$row['imagine_produs'].'"</td>
                        <td>

                        <a href = "index.php?id_produs='.$row['id_produs'].'&removeCart=1" name = "removeCart" />Remove from cart</a>

                        </td>
                        </tr>
                        ';
                }




            ?>
        </table><br>
        <a href = "?reset" name = "reset">Reset</a>
        <a href = "order.php" name = "reset">Order</a><br><br><br><br>




    </body>
</html>

<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Do you want to delete this product ?')) e.preventDefault();
    };

    console.log(elems);

    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>

