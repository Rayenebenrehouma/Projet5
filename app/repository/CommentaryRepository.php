<?php
namespace MyApp\repository;

use MyApp\Models\Database;
use PDO;
use MyApp\Models\Commentary;

class CommentaryRepository
{

    public function addCommentary($commentId, $commentaryAdd)
    {
        $BDD = new Database();
        $DB= $BDD->connect();
                $req = $DB->prepare('INSERT INTO commentaires(content, author, id_article, status) VALUES(?, ?, ?, ?)');
                $req->execute(array($commentaryAdd->getContent(), $commentaryAdd->getAuthor(), $commentId, $commentaryAdd->getStatus()));

                header('location: /accueil');
    }


    public function allCommentary($commentId){
        $BDD = new Database();
        $DB= $BDD->connect();
        $status = htmlspecialchars("approved");
        $sql = $DB->query("SELECT content, author FROM commentaires WHERE id_article = $commentId");
        $datas = [];
        foreach ($sql->fetchAll(\PDO::FETCH_CLASS) as $row) {
            $data = new Commentary();
            $data->setAuthor($row->author);
            $data->setContent($row->content);
            $datas[] = $data;
        }
        return $datas;
        }
}