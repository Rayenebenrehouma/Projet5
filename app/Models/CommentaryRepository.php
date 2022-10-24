<?php

class CommentaryRepository{

    public function addCommentary($postId){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");


        if(isset($_POST['commentary_content'])){
            if(!empty($_POST['commentary_content'])){

                $commentary_content = htmlspecialchars($_POST['commentary_content']);
                $commentary_author = htmlspecialchars($_SESSION['user']['identifiant']);
                $commentary_status = htmlspecialchars("disaproved");


                $req = $bdd->prepare('INSERT INTO commentaires(content, author, id_article, status) VALUES(?, ?, ?, ?)');
                $req->execute(array($commentary_content, $commentary_author, $postId, $commentary_status));

                $message = 'Votre commentaire est en cours de vérification';

                header ('location: /accueil');
            }else{
                $message = "Veuillez remplir tous les champs";
            }
        }
        ?>

        <?php
        if(isset($message)){
            echo $message;
        }
    }

    public function allCommentary($commentId){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        $sql = $bdd->query("SELECT content, author FROM commentaires WHERE id_article = $commentId");
        $datas = $sql->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }
}