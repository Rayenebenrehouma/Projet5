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
    public function addPost(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
            if (!empty($_POST['article_titre']) and !empty($_POST['article_contenu'])) {


                $article_titre = htmlspecialchars($_POST['article_titre']);
                $article_contenu = htmlspecialchars($_POST['article_contenu']);
                $article_chapo = htmlspecialchars($_POST['article_chapo']);
                $article_auteur = htmlspecialchars($_POST['article_auteur']);

                $sql = $bdd->prepare('INSERT INTO articles(titre, contenu, chapo, auteur, date_time_publication) VALUES(?, ?, ?, ?, NOW())');
                $result = $sql->execute(array($article_titre, $article_contenu, $article_chapo, $article_auteur));
                if($result){
                    echo "article ajouté";
                }

            } else {
                $message = "Veuillez remplir tous les champs";
            }
        }

    }

    public function updatePost($updateId){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if(isset($_POST['update'])){
            $titre = $_POST['article_titre'];
            $chapo = $_POST['article_chapo'];
            $contenu = $_POST['article_contenu'];
            $auteur = $_POST['article_auteur'];

            $article = $bdd->prepare('UPDATE articles SET titre = ?, chapo = ?, contenu = ?, auteur = ? WHERE id = ?');
            $article->execute(array($titre, $chapo, $contenu, $auteur, $updateId));

            header('location: /liste-des-articles');
        }
    }

    public function deletePost($deleteId){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        if(isset($_POST['delete'])){
            $article_delete = "DELETE FROM `articles` WHERE id = ?";
            $req = $bdd->prepare($article_delete);
            $req->execute(array($deleteId));
            header('location: /liste-des-articles');
        }
    }
}