<?php
include_once "mail.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__."/../../vendor/autoload.php";
class Verification implements mail{
  public  function sendmail($email,$subject, $body){
    $mail = new PHPMailer(true);
    try{  
        //smtp  protocol configuration
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nti.php.develop@gmail.com'; //send mail
        $mail->Password = 'NTI@12345'; //password of the sent mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //ssl secure
        $mail->Port = 465; //port using smtp protocol
        $mail->setFrom('nti.php.develop@gmail.com', 'Eshopper'); //sent from that mail
        $mail->addAddress($email); //sent to this email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        return True;
    }
    catch(Exception $e){
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return False;

    }
    }
    public  function sendfeed($subject, $body){
      $mail = new PHPMailer(true);
      try{  
          //smtp  protocol configuration
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'nti.php.develop@gmail.com'; //send mail
          $mail->Password = 'NTI@12345'; //password of the sent mail
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //ssl secure
          $mail->Port = 465; //port using smtp protocol
          $mail->setFrom('nti.php.develop@gmail.com', 'Eshopper'); //sent from that mail
          $mail->addAddress("shaimaakamal36@gmail.com"); //sent to this email
          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body = $body;
          $mail->send();
          return True;
      }
      catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          return False;
  
      }
      }
}
?>