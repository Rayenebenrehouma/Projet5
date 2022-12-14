<?php
namespace MyApp\Controllers;

use MyApp\Models\Commentary;
use MyApp\Models\Database;
use MyApp\repository\CommentaryRepository;

class CommentaryController{
    /**
     * @param $commentId
     * @return void
     */
    public function commentaryControllerList($commentId){
        $commentRepository = new CommentaryRepository();
        $commentZoom = $commentRepository->allCommentary($commentId);
        require './app/Views/commentaryList.php';
    }


    /**
     * @param $commentId
     * @return void
     */
    public function commentaryControllerAdd($commentId){
        if (isset($_POST['commentary_content'])) {
            if (!empty($_POST['commentary_content'])) {
                $commentary_content = htmlspecialchars($_POST['commentary_content']);
                $commentary_author = htmlspecialchars($_SESSION['user']->getIdentifiant());
                $commentary_status = htmlspecialchars("0");

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

    /**
     * @param $deleteId
     * @return void
     */
    public function commentaryControllerDelete($deleteId){
        $commentaryRepository = new CommentaryRepository();
        $commentaryDelete = $commentaryRepository->deleteCommentary($deleteId);
    }

    public function commentaryControllerListAdmin($postId)
    {
        $commentRepository = new CommentaryRepository();
        $adminComment = $commentRepository->allCommentaryAdmin($postId);
        require('./app/Views/adminCommentary.php');
    }

    public function commentaryControllerAdminApprove($commentId){
        $commentRepository = new CommentaryRepository();
        $adminComment = $commentRepository->approveComment($commentId);
    }

    public function commentaryControllerAdminDisapprove($commentId){
        $commentRepository = new CommentaryRepository();
        $adminComment = $commentRepository->disapproveComment($commentId);
    }
}