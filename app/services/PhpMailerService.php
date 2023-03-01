<?php

require_once('../../PHPMailer/src/PHPMailer.php');
require_once('../../PHPMailer/src/Exception.php');
require_once('../../PHPMailer/src/SMTP.php');

class PhpMailerService
{

    static function send($recipients, $subject, $body, $attachment) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'devlopment@next-g.website';                     //SMTP username
            $mail->Password   = '51n4r54kt1';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('devlopment@next-g.website', 'nextg');
            $mail->addAddress("$recipients", '');     //Add a recipient

            //Attachments
            $mail->addAttachment("$attachment");         //Add attachments

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "$subject";
            $mail->Body    = "$body";
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return 'succes send email';
        } catch (Exception $e) {
            return "failed send email : Mailer Error: {$mail->ErrorInfo}";
        }
    }

}