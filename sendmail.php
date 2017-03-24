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
$sql = "SELECT * FROM produse";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) 
{  
    if(isset( $_SESSION['cart']))
    {foreach($_SESSION['cart'] as $name)
        if($row['id_produs'] == $name)
        {

            $mail->Body .=  '<tr>';
            $mail->AddEmbeddedImage($row['imagine_produs'], 'logoimg'.$row['imagine_produs'].'');
            $mail->Body .= 
            "<td>".$row['id_produs']."</td>
            <td>".$row['nume_produs']."</td>
            <td>".$row['descriere_produs']."</td>
            <td>".$row['pret_produs']."</td>
            <td><img src ='cid:logoimg".$row['imagine_produs']."'</td></tr>";


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


header('Location: /');die();
unset($_SESSION['cart']);