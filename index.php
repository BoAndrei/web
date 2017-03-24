<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
session_start();
include "connect.php";
include "checkInputData.php";
include "DRYfunctions.php";


unset($_SESSION['last_page']);

if(isset($_GET['product_id']) && !isset($_GET['removeCart']))
{
    $_SESSION['cart'][] = sanitizeNumber($_GET['product_id']);
    header('Location: /');die();

}
$_SESSION['cart'][0] = 'a';
if(isset($_GET['removeCart']))
{   
    foreach ($_SESSION['cart'] as $key => $value){
        if ($value == sanitizeNumber($_GET['product_id'])) {
            unset($_SESSION['cart'][$key]);
        }
    }


    header('Location: /');die();
}

if(isset($_GET['reset']))
{
    unset($_SESSION['cart']);
    header('Location: /');die();
}

$perpage = 3;
            if(isset($_GET['page']))
                $page = $_GET['page'];

            if(!isset($_GET['page']) || $page == 1 || $page == 0)
                $page1 = 0;
            else
                $page1 = ($page*$perpage)-$perpage;

            $sql = "SELECT * FROM products LIMIT $page1,$perpage";
            $sql2 = "SELECT * FROM products";

            $result = mysqli_query($con,$sql);
            $result2 = mysqli_query($con,$sql2);
            $count = mysqli_num_rows($result2);
            $a = $count / $perpage;
            $a = ceil($a);

$sql = "SELECT * FROM products";
$products_result = mysqli_query($con,$sql);
            


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

        <br>
        
        <?php
            ob_start();
        ?>

        <table style="width:100%">
            <caption>Cart products</caption>
            <tr>
                <th>Name</th>
                <th>Descriprion</th>
                <th>Price</th>
                <th>Image</th>
                <th>Operation</th>
            </tr>
            
        <?php echo $tableHeader = ob_get_clean(); ?>
        
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <?php if(!in_array($row['product_id'],$_SESSION['cart'])): ?>

                        <tr>
                                 <?php TableBody($row); ?>
                            <td>
                            
                                <?php if(isset($_SESSION['user'])): ?>
                                
                                    <a href = "edit.php?product_id=<?php echo htmlentities($row['product_id']); ?>" name = "edit">Edit information</a><br>
                                    <a class = "confirmation" href = "edit.php?product_id=<?php echo htmlentities($row['product_id']); ?>&delete=1" name = "delete">Delete product</a><br>
                            </td>

                        </tr>

                            <?php else: ?>
                            <a href = "index.php?product_id=<?php echo $row['product_id']; ?>" name = "addCart">Add to cart</a></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

            <?php
            for($b =1;$b <= $a; $b++)
            {
                echo '<a href = "?page='.$b.'"style = "text-decoration:none" href = '.$b.'>'.$b.' </a>';
            }
            ?>

        </table>

        <?php if(isset($_SESSION['user'])): ?>

            <a style = "float:right;" href= "edit.php">Add a product</a>

        <?php endif; ?>

        <br><br><br>
        


        <?php if(count($_SESSION['cart']) > 1): ?>

            <?php echo $tableHeader; ?>
            
                <?php while($row = mysqli_fetch_assoc($products_result)): ?>            
                        <?php foreach($_SESSION['cart'] as $name): ?>
                            <?php if($row['product_id'] == $name): ?>

                                <tr>
                                    <?php TableBody($row); ?>
                                    <td>

                                        <a href = "index.php?product_id=<?php echo htmlentities($row['product_id']); ?>&removeCart=1" name = "removeCart" >Remove from cart</a>

                                    </td>
                                </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>
                <?php endwhile; ?>





            </table><br>


            <a href = "?reset" name = "reset">Reset</a>
            <a href = "order.php" name = "reset">Order</a><br><br><br><br>
            <?php endif; ?>




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

