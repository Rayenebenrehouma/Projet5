<?php

require 'vendor/autoload.php';
require './app/Controllers/Controller.php';

$urlParts =  array_values(array_filter(explode('/', $_SERVER["REQUEST_URI"])));
$urlString = implode('',$urlParts);
$controllerName = $urlParts[0];


require ('./app/Views/header.php');

if($controllerName == 'accueil'){
    require ('./app/Views/home.php');
}if($controllerName == 'liste-des-articles'){
    $newPost = new Controller();
    $newPost->postControllerAll();
}if($controllerName == 'ajouter-un-article'){
    $newPost = new Controller();
    $newPost->postControllerAdd();
}if(preg_match('#update-post-([0-9]+)#',$urlString, $params)){
    $updateId = $params[1];
    $updateById = new Controller();
    $updateById->postControllerUpdate($updateId);
}if(preg_match('#delete-post-([0-9]+)#',$urlString, $params)){
    $deleteId = $params[1];
    $deleteById = new Controller();
    $deleteById->postControllerDelete($deleteId);
}if(preg_match('#article-([0-9]+)#',$urlString, $params)){
    $postId = $params[1];
    $postById = new Controller();
    $postById->postControllerById($postId);
    /*$post = new Posts;
    $post->postShow($postId);*/
}if($controllerName == 'inscription'){
    $newPost = new Controller();
    $newPost->userControllerAdd();
}if($controllerName == 'connection'){
    $newPost = new Controller();
    $newPost->userControllerConnect();
}if($controllerName == 'deconnexion'){
    $newPost = new Controller();
    $newPost->userControllerDisconnect();
}


require ('./app/Views/footer.php');