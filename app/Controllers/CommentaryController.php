<?php
namespace MyApp\Controllers;

use MyApp\Models\Commentary;
use MyApp\repository\CommentaryRepository;

class CommentaryController{
    public function commentaryControllerList($commentId){
        $commentRepository = new CommentaryRepository();
        $commentZoom = $commentRepository->allCommentary($commentId);
        require './app/Views/commentaryList.php';
    }

    public function commentaryControllerAdd($commentId){
        if (isset($_POST['commentary_content'])) {
            if (!empty($_POST['commentary_content'])) {
                $commentary_content = htmlspecialchars($_POST['commentary_content']);
                $commentary_author = htmlspecialchars($_SESSION['user']->getIdentifiant());
                $commentary_status = htmlspecialchars("disaproved");

                $commentaryAdd = new Commentary();
                $commentaryAdd->setContent($commentary_content);
                $commentaryAdd->setAuthor($commentary_author);
                $commentaryAdd->setStatus($commentary_status);

                $commentaryRepository = new commentaryRepository();
                $commentaryAdd = $commentaryRepository->addCommentary($commentId, $commentaryAdd);
            }
        }
        require('./app/Views/commentaryAdd.php');
    }

    public function commentaryControllerDelete($deleteId){
        $commentaryRepository = new CommentaryRepository();
        $commentaryDelete = $commentaryRepository->deleteCommentary($deleteId);
    }
}