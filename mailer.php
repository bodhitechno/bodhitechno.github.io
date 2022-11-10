<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'assets/phpmailer/Exception.php';
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';

if($_POST) {

  $from = "testingsoftwares10@gmail.com"; // your mail here
  $name = $_POST['name'];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $body = "Name = ". $name . "<br>Email = " . $email . "<br>Message =" . $message;;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = "true";     
    $mail->SMTPSecure = "tls";                              //Enable SMTP authentication
    $mail->Username   = $from;                     //SMTP username
    $mail->Password   = 'etfpyzvmvkoioeeh';                               //SMTP password
   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = "587";                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($from);
    $mail->addAddress($from);//receipt               
    //Name is optional
    $mail->addReplyTo($email);
    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    

    if($mail->send()){
      echo json_encode(array("success"=>true));
      die();
    }
    else{
       echo json_encode(array("success"=>false));
      die();
    }
    
} catch (Exception $e) {
   echo json_encode(array("success"=>false));
   die();
}

}
?>




