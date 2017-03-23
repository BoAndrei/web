<?php
include "checkLogin.php";
include "connect.php";
include "checkInputData.php";

$id = "";
if(isset($_GET['id_produs']))
    $id = sanitizeNumber($_GET['id_produs']);

if(isset($_GET['delete']))
{
    $sql = $con->prepare("DELETE FROM produse WHERE id_produs = ?");
    $sql->bind_param("i",$id);
    $sql->execute();

    $sql->close();
    $con->close();

    header('Location: /');
}


$nameErr = $descriptionErr = $priceErr = $fileErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ok = 1;

    if(!$id)
    {
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

        if(!$_FILES["fileToUpload"]["name"])
        {
            $sql = "SELECT * FROM produse WHERE id_produs='$id'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            $target_file = $row['imagine_produs'];

        }   
    }  




    if($ok && !$id)
    {  
        $sql = $con->prepare("INSERT INTO produse (nume_produs, descriere_produs, pret_produs, imagine_produs) VALUES (?, ?, ?, ?)");
        $sql->bind_param('ssis',$product_name,$product_description,$product_price,$target_file);

        $sql->execute();
        $sql->close();
        $con->close();

        header('Location: /');
    }


    if($id)
    {
        $ok = 1;


        if (empty($_POST["nameUpdate"])) {
            $nameErr = "Name is required";$ok = 0;
        } else 
            $product_name = sanitize($_POST["nameUpdate"]);

        if (empty($_POST["descriptionUpdate"])) {
            $descriptionErr = "Description is required";$ok = 0;
        } else 
            $product_description = sanitize($_POST["descriptionUpdate"]);

        if (empty($_POST["priceUpdate"])) {
            $priceErr = "Price is required";$ok = 0;
        } else 
        {
            $product_price = sanitize($_POST["priceUpdate"]);
            if (preg_match("/^[a-zA-Z ]*$/",$_POST["priceUpdate"])) {
                $priceErr = "Only numbers required";$ok = 0;
            }
        }
        if($ok)
        {   
            $sql = $con->prepare("UPDATE produse SET nume_produs=?,descriere_produs=?,pret_produs=?,imagine_produs=? WHERE id_produs=?");
            $sql->bind_param('ssisi',$product_name,$product_description,$product_price,$target_file,$id);

            $sql->execute();
            $sql->close();
            $con->close();

            header('Location: /');
        }
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
        <?php if(!isset($_GET['id_produs'])):?>
            <form action = "edit.php" method = "POST" enctype="multipart/form-data" >
                <label for = "name">Name: </label>
                <input type = "text" name = "name" id = "name"/>
                <span name = "nameErr"><?php echo htmlentities($nameErr); ?></span>
                <br><br>

                <label for = "descriere">Descriprion: </label>
                <input type = "text" name = "description" id = "descriere"/>
                <span name = "descriptioneErr"><?php echo htmlentities($descriptionErr); ?></span>
                <br><br>

                <label for = "pret">Price: </label>
                <input type = "text" name = "price" id = "pret"/>
                <span name = "priceErr"><?php echo htmlentities($priceErr); ?></span>
                <br><br>

                <label for = "fileToUpload">Image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                <span name = "fileErr"><?php echo htmlentities($fileErr); ?></span><br><br>


                <input id = "insert" type = "submit" value = "Add item" />
            </form>

            <?php else: ?>

            <?php
            $sql = $con->prepare("SELECT * FROM produse WHERE id_produs = ?");
            $sql->bind_param('i', $id);

            $sql->execute();

            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            ?>




            <form id = "form" action = "edit.php?id_produs=<?php echo $id ?>" method = "POST" enctype="multipart/form-data" >
                <label for = "name">Nume: </label>
                <input type = "text" name = "nameUpdate" id = "name" value = "<?php echo htmlentities($row['nume_produs']); ?>"/>
                <span name = "nameErr"><?php echo htmlentities($nameErr); ?></span>
                <br>

                <label for = "descriere">Descriere: </label>
                <input type = "text" name = "descriptionUpdate" id = "descriere" value = "<?php echo htmlentities($row['descriere_produs']); ?>"/>
                <span name = "descriptioneErr"><?php echo htmlentities($descriptionErr); ?></span>
                <br>

                <label for = "pret">Pret: </label>
                <input type = "text" name = "priceUpdate" id = "pret" value = "<?php echo htmlentities($row['pret_produs']);?>"/>
                <span name = "priceErr"><?php echo htmlentities($priceErr); ?></span>
                <br>

                <br><br>

                <div>
                    <span>Current image:</span><br><br>
                    <img src = <?php echo htmlentities($row['imagine_produs']); ?> />    
                    <br><br>

                </div>

                Select image to update:
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>


                <input id = "edit" name = "edit" type = "submit" value = "Update" />
            </form>

            <?php endif; ?>

    </body>
</html>
