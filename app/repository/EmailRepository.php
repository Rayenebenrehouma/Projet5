<?php
namespace MyApp\repository;


require_once "./phpmailer/Exception.php";
require_once "./phpmailer/PHPMailer.php";
require_once "./phpmailer/SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;
use MyApp\Models\Mail;

class EmailRepository{


    /**
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function sendMail($mail){
        $email = $mail->getEmail();
        $sujet = $mail->getSujet();
        $message = $mail->getMessage();

            $mail = new PHPMailer(true);
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            //On configure le SMTP
            $mail->isSMTP();
            $mail->Host = "localhost";
            $mail->Port = 1025;
            //Charset
            $mail->CharSet = "utf-8";
            //Destinataires
            $mail->addAddress($email);
            //Expéditeur
            $mail->setFrom("rayenebenrehouma@outlook.fr");
            //Contenu
            $mail->Subject = $sujet;
            $mail->Body = $message;
            //Envoi
            $mail->send();
            if($mail){
                header('location: /accueil');
            }
        }

}