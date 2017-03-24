<link rel="stylesheet" href="/css.css">
<?php 
session_start();

if(count($_SESSION['cart']) < 2)
{
    header('Location: /');
    die();
}


include "connect.php";
include "checkInputData.php";
include "DRYfunctions.php";
require 'PHPMailer-master/PHPMailerAutoload.php';
?>
<?php
            $nameErr = "";
            $streetErr = "";
            $pnumberErr = "";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ok = 1;
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";$ok = 0;
                } else {
                    $name = sanitize($_POST["name"]);
                }
                if (empty($_POST["street"])) {
                    $streetErr = "Street information is required";$ok = 0;
                } else 
                    $email = sanitize($_POST["street"]);

                if (empty($_POST["pnumber"])) {
                    $pnumberErr = "Phone number is required";$ok = 0;
                } else {
                    $pnumber = sanitize($_POST["pnumber"]);

                    if (!is_numeric($_POST["pnumber"])) {
                        $pnumberErr = "Only numbers required";$ok = 0;
                    }
                }

                if($ok == 1)
                {

                    $_SESSION['buyer_name'] = $_POST["name"];
                    $_SESSION['buyer_phonenumber'] = $_POST["pnumber"];
                    $_SESSION['buyer_street_info'] = $_POST["street"];

                    header('Location: sendmail.php');die();

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
        <table style="width:100%">
            <caption>Products in the cart:</caption>
            <tr>
            
                <th>Nanme</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>

            </tr>
             <?php echo $tableHeader = ob_get_clean(); ?>

            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($con,$sql);
            ?>

            <?php while($row = mysqli_fetch_assoc($result)): ?>           
                <?php if(isset( $_SESSION['cart'])): ?>
                    <?php foreach($_SESSION['cart'] as $name): ?>
                        <?php if($row['product_id'] == $name): ?>

                            <tr>
                                
                                <?php TableBody($row); ?>

                            </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                

        </table>


        <form action="order.php" method = "POST">

            <label for = "name">Name:</label>
            <input type = "text" id = "name" name = "name" value = "<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/>
            <span class="error"><?php echo htmlentities($nameErr);?></span><br><br>

            <label for = "email">Street information:</label>
            <input type = "text" id = "email" name = "street" value = "<?php echo isset($_POST['street']) ? $_POST['street'] : '' ?>"/>
            <span class="error"><?php echo htmlentities($streetErr);?></span><br><br>

            <label for = "pnumber">Phone number:</label>
            <input type = "text" id = "pnumber" name = "pnumber" value = "<?php echo isset($_POST['pnumber']) ? $_POST['pnumber'] : '' ?>"/><br>
            <span class="error"><?php echo htmlentities($pnumberErr);?></span><br><br>

            <input type = "submit" value = "Order" />



        </form>


    </body>
</html>

