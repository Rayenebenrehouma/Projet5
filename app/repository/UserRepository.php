<?php
namespace MyApp\repository;

use MyApp\Models\Database;
use PDO;
use MyApp\Models\User;

class UserRepository
{
    public function addUser($user){
                $BDD = new Database();
                $DB= $BDD->connect();
                $sql = $DB->prepare("INSERT INTO `utilisateurs`(`identifiant`, `email`, `password`, `role`) VALUES (?,?,?,'0')");
                $result = $sql->execute(array($user->getIdentifiant(),$user->getEmail(),$user->getPassword()));
                if($result){
                    echo 'Votre compte à bien été ajouter';
                }else{
                    echo 'bug non trouvé';
                }
            }

    public function connectUser($user){
            $BDD = new Database();
            $DB= $BDD->connect();
            $check = $DB->prepare('SELECT id_utilisateur, identifiant, email, password, role FROM utilisateurs WHERE email = ?');
            $check->execute(array($user->getEmail()));
            $data = $check->fetch();
            $row = $check->rowCount();
            $test02 = password_verify($user->getPassword(),$data["password"]);

            if($row == 1){
                if($test02 == true){
                    $datas = new User();
                    $datas->setId($data["id_utilisateur"]);
                    $datas->setIdentifiant($data["identifiant"]);
                    $datas->setEmail($data["email"]);
                    $datas->setPassword($data['password']);
                    $datas->setRole($data["role"]);
                    //changer vraiment
                    session_start();
                    $_SESSION['user'] = $datas;
                    header('location: /accueil');
                }
            }
        }

    public function disconnectUser(){
        session_start();
        session_destroy();
        header('location: /connection');
    }
}