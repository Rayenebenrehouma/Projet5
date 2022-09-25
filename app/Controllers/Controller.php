<?php
require './app/Models/PostRepository.php';
require './app/Models/abstractPostRepository.php';


class Controller{
    public function postControllerAll(){
        $postRepository = new postRepository();
        $blogPost = $postRepository->findAll();
        require('./app/Views/articleList.php');
    }

    public function postControllerById($postId){
        $postRepository = new postRepository();
        $postZoom = $postRepository->postById($postId);
        require('./app/Views/articleZoom.php');
        die($postId);
    }

    public function postControllerAdd(){
        $postAbstractRepository = new AbstractPostRepository();
        $postAdd = $postAbstractRepository->addPost();
        require('./app/Views/formRedaction.php');
    }

    public function postControllerUpdate($updateId){
        $postAbstractRepository = new AbstractPostRepository();
        $postUpdate = $postAbstractRepository->postById($updateId);
        require('./app/Views/updateForm.php');
        $postUpdate = $postAbstractRepository->updatePost($updateId);
    }

    public function postControllerDelete($deleteId){
        $postAbstractRepository = new AbstractPostRepository();
        $postDelete = $postAbstractRepository->postById($deleteId);
        require('./app/Views/deleteForm.php');
        $postDelete = $postAbstractRepository->deletePost($deleteId);
    }
}