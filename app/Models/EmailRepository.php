<?php

require_once "./phpmailer/Exception.php";
require_once "./phpmailer/PHPMailer.php";
require_once "./phpmailer/SMTP.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailRepository{
    public function sendMail(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            //On configure le SMTP
            $mail->isSMTP();
            $mail->Host = "localhost";
            $mail->Port = 1025;
            //Charset
            $mail->CharSet = "utf-8";
            //Destinataires
            $mail->addAddress("travoltadev@gmail.com");
            //Expéditeur
            $mail->setFrom("rayenebenrehouma@outlook.fr");
            //Contenu
            $mail->Subject = "Sujet du message avec caractères accentués";
            $mail->Body = "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, 
            et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' 
            est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. 
            De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' 
            vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, 
            souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).";
            //Envoi
            $mail->send();
            echo "Mail bien envoyé";
        }

}