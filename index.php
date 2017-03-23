<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
session_start();
include "connect.php";
include "checkInputData.php";

if(isset($_GET['id_produs']) && !isset($_GET['removeCart']))
{
    $_SESSION['cart'][] = sanitizeNumber($_GET['id_produs']);
    header('Location: /');

}

if(isset($_GET['removeCart']))
{   
    foreach ($_SESSION['cart'] as $key => $value){
        if ($value == sanitizeNumber($_GET['id_produs'])) {
            unset($_SESSION['cart'][$key]);
        }
    }

    if(count($_SESSION['cart']) == 0)
        unset($_SESSION['cart']);

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

            ?>


            <?php if(isset($_SESSION['cart'])): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <?php if(!in_array($row['id_produs'],$_SESSION['cart'])): ?>

                        <tr>
                            <td><?php echo $row['id_produs'] ?></td>
                            <td><?php echo $row['nume_produs'] ?></td>
                            <td><?php echo $row['descriere_produs'] ?></td>
                            <td><?php echo $row['pret_produs'] ?></td>
                            <td><img src = "<?php echo $row['imagine_produs']; ?>"</td><td>

                                <?php if(isset($_SESSION['user'])): ?>



                                    <a href = "edit.php?id_produs=<?php echo $row['id_produs']; ?>" name = "edit">Edit information</a><br>
                                    <a class = "confirmation" href = "edit.php?id_produs=<?php echo $row['id_produs']; ?> &delete=1" name = "delete"> Delete product</a><br>
                                </td>


                            </tr>

                            <?php else: ?>
                            <a href = "index.php?id_produs=<?php echo $row['id_produs']; ?>" name = "addCart">Add to cart</a></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>


                <?php else: ?>
                <?php if(!isset( $_SESSION['cart'])): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>


                        <tr>

                            <td><?php echo $row['id_produs']; ?></td>
                            <td><?php echo $row['nume_produs'] ?></td>
                            <td><?php echo $row['descriere_produs'] ?></td>
                            <td><?php echo $row['pret_produs'] ?></td>
                            <td><img src ="<?php echo $row['imagine_produs'] ?>"</td>


                            <?php if(isset($_SESSION['user'])): ?>
                                <td>
                                    <a href = "edit.php?id_produs=<?php echo $row['id_produs'] ?>" name = "edit">Edit information</a><br>
                                    <a class = "confirmation" href = "edit.php?id_produs=<?php echo $row['id_produs']; ?> &delete=1" name = "delete" >Delete product</a><br>
                                </td>

                            </tr>

                            <?php else: ?>
                            <td><a href = "index.php?id_produs=<?php echo $row['id_produs']; ?>" name = "addCart">Add to cart</a> </td>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
            <?php endif; ?>

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


        <?php if(isset( $_SESSION['cart'])): ?>

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

