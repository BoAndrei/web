<?php
function TableBody($row){
    
    echo '
    
    <td>'.htmlentities($row['product_name']).'</td>
    <td>'.htmlentities($row['product_description']).'</td>
    <td>'.htmlentities($row['product_price']).'</td>
    <td><img width="150" height="150" src = "'.htmlentities($row['product_image']).'"</td>
    
    ';    
    
}

function SqlFinish($con,$sql){
    
    $sql->execute();
    $sql->close();
    $con->close();
}

?>