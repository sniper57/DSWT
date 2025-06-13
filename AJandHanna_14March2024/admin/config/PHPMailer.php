<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/vendor/PHPMailer/src/Exception.php';
require 'admin/vendor/PHPMailer/src/PHPMailer.php';
require 'admin/vendor/PHPMailer/src/SMTP.php';

function _sendmail($mailTo,$mailFrom,$mailFromName,$mailSubject,$mailBody){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {

        //Server settings
        $mail = new PHPMailer();
        $mail->IsSMTP();
        //$mail->SMTPDebug  = 2;
        $mail->Host = 'sg2plzcpnl506710.prod.sin2.secureserver.net';    // Must be GoDaddy host name
        $mail->SMTPAuth = true; 
        $mail->Username = "notifications@theweddingdaystory.com"; /*Substitute with your real email*/
        $mail->Password = "Incorrect57."; /*Substitute with your real password*/
        $mail->SMTPSecure = 'tls';   // ssl will no longer work on GoDaddy CPanel SMTP
        $mail->Port = 587;    // Must use port 587 with TLS

        //Sender
        $mail->setFrom('noreply@theweddingdaystory.com','RSVP: TheWeddingDayStory');        
        //Recipients 
        $mail->addAddress($mailTo);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('theweddingdaystory@gmail.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mailSubject;
        $mail->Body    = $mailBody;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: ". $mail->ErrorInfo;
        return false; 
    }
}

?>