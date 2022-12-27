<?php
namespace MyApp\repository;

use MyApp\Models\Database;
use PDO;
use MyApp\Models\Commentary;

class CommentaryRepository
{

    /**
     * @param $commentId
     * @param $commentaryAdd
     * @return void
     */
    public function addCommentary($commentId, $commentaryAdd)
    {
        $BDD = new Database();
        $DB= $BDD->connect();
                $req = $DB->prepare('INSERT INTO commentaires(content, author, id_article, status) VALUES(?, ?, ?, ?)');
                $req->execute(array($commentaryAdd->getContent(), $commentaryAdd->getAuthor(), $commentId, $commentaryAdd->getStatus()));

                header('location: /accueil');
    }


    /**
     * @param $commentId
     * @return array
     */
    public function allCommentary($commentId){
        $BDD = new Database();
        $DB= $BDD->connect();
        $status = htmlspecialchars("approved");
        $sql = $DB->query("SELECT id_commentaire, content, author FROM commentaires WHERE id_article = $commentId");
        $datas = [];
        foreach ($sql->fetchAll(\PDO::FETCH_CLASS) as $row) {
            $data = new Commentary();
            $data->setId($row->id_commentaire);
            $data->setAuthor($row->author);
            $data->setContent($row->content);
            $datas[] = $data;
        }
        return $datas;
        }

    /**
     * @param $deleteId
     * @return void
     */
    public function deleteCommentary($deleteId){
        $BDD = new Database();
        $DB= $BDD->connect();

            $commentaryDelete = "DELETE FROM `commentaires` WHERE id_commentaire = ?";
            $req = $DB->prepare($commentaryDelete);
            $result = $req->execute(array($deleteId));

            if ($result){
                header('location: /liste-des-articles');
            }
    }

}