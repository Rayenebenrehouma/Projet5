<?php

class CommentaryController{
    public function commentaryControllerList($commentId){
        $commentRepository = new CommentaryRepository();
        $commentZoom = $commentRepository->allCommentary($commentId);
        require './app/Views/commentaryList.php';
    }
}