<?php


class PostRepository
{
    public function findAll(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");
        $articles = $bdd->query("SELECT id, titre, date_time_publication, chapo FROM articles ORDER BY date_time_publication DESC");
        $datas = $articles->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }

    public function postById($postId){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if(isset($postId) && $postId > 0){
            $article = $bdd->prepare('SELECT titre, chapo, contenu, auteur, date_time_publication FROM articles WHERE id = ?');
            $article->execute(array($postId));
            $datas = $article->fetch();
            return $datas;
    }

}
}