<?php
require_once(__DIR__ . '/vendor/autoload.php');
use \Mailjet\Resources;
define('API_USER', '303b105a2272495c7b87aecf5c3b1f2e');
define('API_LOGIN', '8871939a370159418a20095a5e4ef928');
$mj = new \Mailjet\Client(API_USER,API_LOGIN,true,['version' => 'v3.1']);

if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])){
    $surname = htmlspecialchars($_POST['name']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "rayenebenrehouma@outlook.fr",
                        'Name' => "Personne"
                    ],
                    'To' => [
                        [
                            'Email' => "rayenebenrehouma@outlook.fr",
                            'Name' => "Personne"
                        ]
                    ],
                    'Subject' => "Greetings from Mailjet.",
                    'TextPart' => "$email, $message",
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        echo "Email envoyé avec succès";
    }else{
        echo "Email non valide";
    }
}else{
    header('location:index.php');
    die();
}
?>