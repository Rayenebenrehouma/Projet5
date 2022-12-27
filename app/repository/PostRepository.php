<?php
namespace MyApp\repository;

use MyApp\Models\Database;
use MyApp\Models\Post;

class PostRepository
{

    /**
     * @return array
     */
    public function findAll(){
        $BDD = new Database();
        $DB= $BDD->connect();
        $articles = $DB->query("SELECT id, titre, date_time_publication, chapo FROM articles ORDER BY date_time_publication DESC");
        $datas = [];
        foreach ($articles->fetchAll(\PDO::FETCH_CLASS) as $row){
            $data = new Post();
            $data->setId($row->id);
            $data->setTitre($row->titre);
            $data->setChapo($row->chapo);
            $data->setDateTimePublication($row->date_time_publication);
            $datas[] = $data;
        }
        return $datas;
    }

    /**
     * @param $postId
     * @return Post|void
     */
    public function postById($postId){
        $BDD = new Database();
        $DB= $BDD->connect();
        if(isset($postId) && $postId > 0){
            $article = $DB->prepare('SELECT id, titre, chapo, contenu, identifiant, date_time_publication FROM articles INNER JOIN utilisateurs ON articles.auteur = utilisateurs.id_utilisateur WHERE id = ?');
            $article->execute(array($postId));
            $datas = $article->fetch();
            //Stockage des informations dans l'objet
            $data = new Post();
            $data->setId($datas["id"]);
            $data->setTitre($datas["titre"]);
            $data->setChapo($datas["chapo"]);
            $data->setContenu($datas["contenu"]);
            $data->setAuteur($datas["identifiant"]);
            $data->setDateTimePublication($datas["date_time_publication"]);
            return $data;
    }

}

    /**
     * @param $newPost
     * @return void
     */
    public function addPost($newPost){
                $BDD = new Database();
                $DB= $BDD->connect();
                //Stockage des information dans l'objet Post
                $sql = $DB->prepare('INSERT INTO articles(titre, contenu, chapo, auteur, date_time_publication) VALUES(?, ?, ?, ?, NOW())');
                $result = $sql->execute(array($newPost->getTitre(), $newPost->getContenu(),$newPost->getChapo(), $newPost->getAuteur()));

                if ($result) {
                    echo "article ajouté";
                }else{
                    echo "article non ajouté";
                }
            }

    /**
     * @param $updateId
     * @param $upPost
     * @return void
     */
    public function updatePost($updateId, $upPost){
        $BDD = new Database();
        $DB= $BDD->connect();
            $article = $DB->prepare('UPDATE articles SET titre = ?, contenu = ?, chapo = ?, date_time_publication = ? WHERE id = ?');
            $result =  $article->execute(array($upPost->getTitre(), $upPost->getContenu(), $upPost->getChapo(), $upPost->getDateTimePublication(), $updateId));
            if ($result){
                header('location: /liste-des-articles');
            }else{
                echo "l'update na pas fonctionné";
            }

    }

    /**
     * @param $deleteId
     * @return void
     */
    public function deletePost($deleteId){
        $BDD = new Database();
        $DB= $BDD->connect();

        if(isset($_POST['delete'])){
            $article_delete = "DELETE FROM `articles` WHERE id = ?";
            $req = $DB->prepare($article_delete);
            $req->execute(array($deleteId));
            header('location: /liste-des-articles');
        }
    }

}