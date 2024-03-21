<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
   $name= $_REQUEST['name'];
   $phone= $_REQUEST['phone'];
   $email= $_REQUEST['email'];
   $service= $_REQUEST['service'];
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                          //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'queries.propertyrevive@gmail.com';     //SMTP username
    $mail->Password = 'iqyfiunnzvmdiqwz';                     // queries.propertyrevive@gmail.com password
    //$mail->Username = 'info@propertyrevive.ae';             //SMTP username
    //$mail->Password = 'vmjnvsuvhxmrbzts';                   //info@propertyrevive.ae password


    $mail->SMTPSecure = 'tls';                                   //Enable implicit TLS encryption
    $mail->Port = 587;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@propertyrevive.ae', 'Property Revive Query');
    $mail->addAddress('mazharue84@gmail.com', 'Joe User');     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
  //  $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    $pagecontents = file_get_contents("mail.html");

    $pagecontents= str_replace("%date", date('Y'), $pagecontents);
    $pagecontents= str_replace("%name", $name, $pagecontents);
    $pagecontents= str_replace("%phone", $phone, $pagecontents);
    $pagecontents= str_replace("%email", $email, $pagecontents);
    $pagecontents= str_replace("%service", $service, $pagecontents);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Quotation Query';
    $mail->Body = $pagecontents;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
