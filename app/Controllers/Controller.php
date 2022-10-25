<?php
require './app/Models/PostRepository.php';
require './app/Models/UserRepository.php';
require './app/Models/CommentaryRepository.php';

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
    }

    public function postControllerAdd(){
        $postRepository = new postRepository();
        $postAdd = $postRepository->addPost();
        require('./app/Views/formRedaction.php');
    }

    public function postControllerUpdate($updateId){
        $postRepository = new postRepository();
        $postUpdate = $postRepository->postById($updateId);
        require('./app/Views/updateForm.php');
        $postUpdate = $postRepository->updatePost($updateId);
    }

    public function postControllerDelete($deleteId){
        $postRepository = new postRepository();
        $postDelete = $postRepository->postById($deleteId);
        require('./app/Views/deleteForm.php');
        $postDelete = $postRepository->deletePost($deleteId);
    }

    public function userControllerAdd(){
        $userRepository = new userRepository();
        $userAdd = $userRepository->addUser();
        require('./app/Views/signUp.php');
    }

    public function userControllerConnect(){
        $userRepository = new userRepository();
        $userConnect = $userRepository->connectUser();
        require('./app/Views/signIn.php');
    }

    public function userControllerDisconnect(){
        $userRepository = new userRepository();
        require('./app/Views/disconnect.php');
        $userDisconnect = $userRepository->disconnectUser();
        require('./app/Views/disconnect.php');
    }
}