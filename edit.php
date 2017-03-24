<?php
include "checkLogin.php";
include "connect.php";
include "checkInputData.php";
include "DRYfunctions.php";


$id = "";
if(isset($_GET['product_id']))
    $id = sanitizeNumber($_GET['product_id']);
    
    

 
$_SESSION['last_page'][] = $_SERVER['HTTP_REFERER'];

if(isset($_GET['delete']))
{
    $sql = $con->prepare("DELETE FROM products WHERE product_id = ?");
    $sql->bind_param("i",$id);
    
    SqlFinish($con,$sql);

    header('Location: '.$_SESSION['last_page'][0]);
    die();
}


    $sql = $con->prepare("SELECT * FROM products WHERE product_id = ?");
    $sql->bind_param('i', $id);

    $sql->execute();

    $result = $sql->get_result();
    $row = $result->fetch_assoc();

$nameErr = $descriptionErr = $priceErr = $fileErr = "";
$product_name = $product_price = $product_description = '';

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
            if (!is_numeric($_POST["price"])) {
                $priceErr = "Only numbers required";$ok = 0;
            }

        }
    

    if ($ok && isset($_FILES["fileToUpload"]["name"])) {



        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


        $name = $_FILES["fileToUpload"]["name"];
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
        
        $i = 0;
           while(file_exists($target_file))
           {
               $i++;
               $target_file = $target_dir . $i . basename($_FILES["fileToUpload"]["name"]);
               
               
           }
        
        
        
       

        $location = 'uploads/';

        if (move_uploaded_file($tmp_name, $location.$i.$name)){
            echo 'Uploaded';
        }

        if(!$_FILES["fileToUpload"]["name"])
        {
            $target_file = $row['product_image'] ? $row['product_image'] : '';

            if(!$row['product_image'])
            {
                $fileErr = "You must introduce an image";
                $ok = 0;
            }   
        }
        
    }  




    if($ok && !$id)
    {  
        $sql = $con->prepare("INSERT INTO products (product_name, product_description, product_price, product_image) VALUES (?, ?, ?, ?)");
        $sql->bind_param('ssis',$product_name,$product_description,$product_price,$target_file);

        SqlFinish($con,$sql);

        header('Location: '.$_SESSION['last_page'][0]);
        die();
    }


    
        if($ok)
        {   
            $sql = $con->prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,product_image=? WHERE product_id=?");
            $sql->bind_param('ssisi',$product_name,$product_description,$product_price,$target_file,$id);

            SqlFinish($con,$sql);

            header('Location: '.$_SESSION['last_page'][0]);
            die();
        }
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>

            <form action = "<?php echo $id != '' ? 'edit.php?product_id='.$id : 'edit.php' ?>" method = "POST" enctype="multipart/form-data" >
                <label for = "name">Name: </label>
                <input type = "text" name = "name" id = "name" value = "<?php echo isset($_GET['product_id']) ? ($product_name != '' ? $product_name : htmlentities($row['product_name'])) : $product_name ?>" />
                <span name = "nameErr"><?php echo htmlentities($nameErr); ?></span>
                <br><br>

                <label for = "descriere">Descriprion: </label>
                <input type = "text" name = "description" id = "description" value = "<?php echo isset($_GET['product_id']) ? ($product_description != '' ? $product_description : htmlentities($row['product_description'])) : $product_description ?>" />
                <span name = "descriptioneErr"><?php echo htmlentities($descriptionErr); ?></span>
                <br><br>

                <label for = "pret">Price: </label>
                <input type = "text" name = "price" id = "price" value = "<?php echo isset($_GET['product_id']) ? ($product_price != '' ? $product_price : htmlentities($row['product_price'])) : $product_price ?>" />
                <span name = "priceErr"><?php echo htmlentities($priceErr); ?></span>
                <br><br>


                <?php if(isset($_GET['product_id'])):?>

                    <div>
                        <span>Current image:</span><br><br>
                        <img src = <?php echo htmlentities($row['product_image']); ?> />    
                        <br><br>
                    </div>

                <?php endif; ?>


                <label for = "fileToUpload">Image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                <span name = "fileErr"><?php echo htmlentities($fileErr); ?></span><br><br>


                <input id = "insert" type = "submit" value = "Submit" />
            </form>

    </body>
</html>
