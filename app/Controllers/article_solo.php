<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

class Posts  {
    Public function postShow($params){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if($params == 2){

            $article = $bdd->prepare('SELECT titre, chapo, contenu, auteur, date_time_publication FROM articles WHERE id = ?');
            $article->execute(array($params));

            if($article->rowCount() == 1){
                $article = $article->fetch();
                $titre = $article['titre'];
                $chapo = $article['chapo'];
                $contenu = $article['contenu'];
                $auteur = $article['auteur'];
                $update = $article['date_time_publication'];

                require('./app/Views/articleZoom.php');
            }else{
                die('Cet article n\'existe pas');
            }
        }else{
            die('ERREUR');
        }
    }
}
?>