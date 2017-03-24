<?php
session_start();
include "connect.php";
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = MAIL_SENDER_USERNAME;                 // SMTP username
$mail->Password = MAIL_SENDER_PASSWORD;             // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = MAIL_TCP_PORT;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress(MAIL_RECEIVER);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC(MAIL_CC);
$mail->addBCC(MAIL_BCC);

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = MAIL_SUBJECT;
$mail->IsHTML(true);

$mail->Body .= "<head><style>

table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
padding: 5px;
text-align: left;
}

</style></head>";
$mail->Body  .= "


Name: ".$_SESSION['buyer_name']."<br><br>
Street: ".$_SESSION['buyer_street_info']."<br><br>
Phone number: ".$_SESSION['buyer_phonenumber']."<br><br>



<table style='width:100%'>
<caption>Products ordered:</caption>
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Image</th>

</tr>

";
$sql = "SELECT * FROM products";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) 
{  
    if(isset( $_SESSION['cart']))
    {foreach($_SESSION['cart'] as $name)
        if($row['product_id'] == $name)
        {

            $mail->Body .=  '<tr>';
            $mail->AddEmbeddedImage($row['product_image'], 'logoimg'.$row['product_image'].'');
            $mail->Body .= 
            "<td>".$row['product_id']."</td>
            <td>".$row['product_name']."</td>
            <td>".$row['product_description']."</td>
            <td>".$row['product_price']."</td>
            <td><img src ='cid:logoimg".$row['product_image']."'</td></tr>";


        }

    }


}



$mail->Body .=  "</table>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


header('Location: /');
unset($_SESSION['cart']);
die();
