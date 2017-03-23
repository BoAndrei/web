<link rel="stylesheet" href="/css.css">
<?php 
session_start();

if(!isset($_SESSION['cart']))
{
    header('Location: /');
    die();
}

include "connect.php";
require 'PHPMailer-master/PHPMailerAutoload.php';
?>

<table style="width:100%">
    <caption>Products in the cart:</caption>
    <tr>
        <th>ID</th>
        <th>Nanme</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>

    </tr>

    <?php
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



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

                </tr>
                ';
        }


        $nameErr = "";
    $streetErr = "";
    $pnumberErr = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ok = 1;
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";$ok = 0;
        } else {
            $name = sanitize($_POST["name"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; $ok = 0;
            }
        }
        if (empty($_POST["street"])) {
            $streetErr = "Street information is required";$ok = 0;
        } else 
            $email = sanitize($_POST["street"]);

        if (empty($_POST["pnumber"])) {
            $pnumberErr = "Phone number is required";$ok = 0;
        } else {
            $pnumber = sanitize($_POST["pnumber"]);
            
            if (preg_match("/^[a-zA-Z ]*$/",$_POST["street"])) {
            $pnumberErr = "Only numbers required";$ok = 0;
        }
        }
        

        if($ok == 1)
        {
            
            $_SESSION['buyer_name'] = $_POST["name"];
            $_SESSION['buyer_phonenumber'] = $_POST["pnumber"];
            $_SESSION['buyer_street_info'] = $_POST["street"];
            
            
            header('Location: sendmail.php');

        }
    }


    ?>
</table>


<form action="order.php" method = "POST">

    <label for = "name">Name:</label>
    <input type = "text" id = "name" name = "name"/>
    <span class="error"><?php echo $nameErr;?></span><br><br>

    <label for = "email">Street information:</label>
    <input type = "text" id = "email" name = "street" />
    <span class="error"><?php echo $streetErr;?></span><br><br>

    <label for = "pnumber">Phone number:</label>
    <input type = "text" id = "pnumber" name = "pnumber"/><br>
    <span class="error"><?php echo $pnumberErr;?></span><br><br>

    <input type = "submit" value = "Order" />



</form>

