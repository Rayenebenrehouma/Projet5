<?php

class CommentaryController{
    public function commentaryControllerList($commentId){
        $commentRepository = new CommentaryRepository();
        $commentZoom = $commentRepository->allCommentary($commentId);
        require './app/Views/commentaryList.php';
    }

    public function commentaryControllerAdd($commentId){
        $commentaryRepository = new commentaryRepository();
        $commentaryAdd = $commentaryRepository->addCommentary($commentId);
        require('./app/Views/commentaryAdd.php');
    }
}