<?php


class UserRepository
{
    public function addUser(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if (isset($_POST['user_email'], $_POST['user_password'])) {
            if (!empty($_POST['user_email']) and !empty($_POST['user_password'])) {

                $user_id = htmlspecialchars($_POST['user_id']);
                $id_utilisateur = "6";
                $user_email = htmlspecialchars($_POST['user_email']);
                $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, ['cost' => 14]);

                $sql = $bdd->prepare("INSERT INTO `utilisateurs`(`id_utilisateur`, `identifiant`, `email`, `password`, `role`) VALUES ('$id_utilisateur','$user_id','$user_email','$user_password','0')");
                $result = $sql->execute();

                if($result){
                    echo 'Votre compte à bien été ajouter';
                }else{
                    echo 'bug non trouvé';
                }
            }
        }else{
            echo "erreur";
        }
    }

    public function connectUser(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if (isset($_POST['user_email'], $_POST['user_password'])) {
            $user_email = htmlspecialchars($_POST['user_email']);
            $user_password = htmlspecialchars($_POST['user_password']);


            $check = $bdd->prepare('SELECT identifiant, email, password, role FROM utilisateurs WHERE email = ?');
            $check->execute(array($user_email));
            $data = $check->fetch();
            $row = $check->rowCount();
            $test02 = password_verify($user_password,$data["password"]);

            if($row == 1){
                if($test02 == true){
                    echo 'vous êtes connecté';
                    session_start();
                    $_SESSION['user'] = $data;
                    header('location: /accueil');
                }
            }else{
                echo "la personne n\'existe pas dans la base de données";
            }
        }
    }

    public function disconnectUser(){

        session_start();
        session_destroy();
        header('location: /connection');
    }
}