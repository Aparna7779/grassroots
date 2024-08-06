<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'webgrassroots@gmail.com';                 // SMTP username
    $mail->Password = "bzuw xsrc mxjx fter";//'GrassRootsAdmin123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //data
    $firstname = $_GET["firstname"];
$amount = $_GET["amount"]; //Please use the amount value from database
$txnid = $_GET["txnid"];

$productinfo = $_GET["proinfo"];
$email = $_GET["email"];
$date=$_GET["date"];
$qty=$_GET["qty"];
    //Recipients
    $mail->setFrom('webgrassroots@gmail.com', 'GrassRootsAdmin');
    $mail->addAddress($email,$firstname);     // Add a recipient
    // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Transaction details';
    $mail->Body    = 'Your payment of '.' '.$amount.' '.'for'.' '.$qty.' '.'of'.' '.$productinfo.' '.'on'.' '.$date.' '.'is complete! Your transaction ID is'.$txnid ;
    

    $mail->send();
    echo 'Message has been sent';
     header("location:orderhistory.php");
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
   
}

 ?>