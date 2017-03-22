<?php
session_start();
include "connect.php";

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 $errLogin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    //echo $username;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    //if($row['username'] === $username && $row['password'] == md5($password)) 
    if($username === ADMIN_USERNAME && $password == ADMIN_PASSWORD)
        {  
            $_SESSION['user'] = $row['username'];
            header('Location: /');
        }
    else
        $errLogin = "Username or Password are wrong!";

    



}

if(isset($_POST['username_reg']) && isset($_POST['password_reg']))
{
    $username = sanitize($_POST['username_reg']);
    $password = md5(sanitize($_POST['password_reg']));

    $sql = mysqli_query($con,"INSERT INTO users (username,password,admin) VALUES ('$username','$password','1')"); 
}





$sql = "SELECT * FROM users";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);


?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css.css">

    </head>
    <body>

        <?php if($row): ?>

            <form action="login.php" method = "POST">

                <label for = "username">Username:</label>
                <input value = "admin" id = "username" type = "textarea"  name = "username" /> 

                <label for = "password">Password:</label>
                <input id = "password" type = "password"  name = "password" /><br><br>
                
                <span name = "errLogin" id = "errLogin" ><?php  echo $errLogin; ?></span><br><br>

                <input type = "submit" value = "Submit Login" />

            </form>

            <?php else: ?>

            <form action="login.php" method = "POST">

                <label for = "username">Username:</label>
                <input value = "admin" id = "username_reg" type = "textarea"  name = "username_reg" /> 

                <label for = "password">Password:</label>
                <input id = "password_reg" type = "password"  name = "password_reg" /><br><br>

                <input type = "submit" value = "Submit Register" />

            </form>
            <?php endif; ?>

    </body>
</html>
