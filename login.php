<?php
session_start();
include "connect.php";
include "checkInputData.php";

$errLogin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);



    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD)
    {  
        $_SESSION['user'] = $row['username'];
        unset($_SESSION['cart']);
        header('Location: /');
    }
    else
        $errLogin = "Username or Password are wrong!";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css.css">

    </head>
    <body>
            <form action="login.php" method = "POST">

                <label for = "username">Username:</label>
                <input value = "admin" id = "username" type = "textarea"  name = "username" /> 

                <label for = "password">Password:</label>
                <input id = "password" type = "password"  name = "password" /><br><br>

                <span name = "errLogin" id = "errLogin" ><?php  echo $errLogin; ?></span><br><br>

                <input type = "submit" value = "Submit Login" />

            </form>

    </body>
</html>
