<?php
require_once './vendor/autoload.php';

use MyApp\Controllers\Controller;
use MyApp\Controllers\CommentaryController;
//require './app/Controllers/CommentaryController.php';

$urlParts =  array_values(array_filter(explode('/', $_SERVER["REQUEST_URI"])));
$urlString = implode('',$urlParts);

if($urlString == ""){
    $controllerName = "accueil";
}else{
    $controllerName = $urlParts[0];
}

require ('./app/Views/header.php');

if($controllerName == ''){
    require ('./app/Views/home.php');
}if($controllerName == 'accueil'){
    $newEmail = new Controller();
    $newEmail->mailSend();
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
    $commentId = $params[1];
    $postById = new Controller();
    $postById->postControllerById($postId);
    $commentaryById = new CommentaryController();
    $commentaryById->commentaryControllerList($commentId);
    $commentaryAdd = new CommentaryController();
    $commentaryAdd->commentaryControllerAdd($commentId);
}if($controllerName == 'inscription'){
    $newPost = new Controller();
    $newPost->userControllerAdd();
}if($controllerName == 'connection'){
    $newPost = new Controller();
    $newPost->userControllerConnect();
}if($controllerName == 'deconnexion'){
    $newPost = new Controller();
    $newPost->userControllerDisconnect();
}if(preg_match('#commentary-add-([0-9]+)#',$urlString, $params)){
    $postId = $params[1];
    $newPost = new Controller();
    $newPost->commentaryControllerAdd($postId);
}if(preg_match('#liste-des-commentaire-([0-9]+)#',$urlString, $params)){
    $postId = $params[1];
    $newPost = new CommentaryController();
    $newPost->commentaryControllerList($postId);
}if(preg_match('#delete-commentaire-([0-9]+)#',$urlString, $params)){
    $deleteId = $params[1];
    $newCom = new CommentaryController();
    $newCom->commentaryControllerDelete($deleteId);
}if($controllerName == 'administration'){
    $newPost = new Controller();
    $newPost->gestionSite();
}if($controllerName == 'administration-utilisateur'){
    $newPost = new Controller();
    $newPost->adminUser();
}if(preg_match('#activer-utilisateur-([0-9]+)#',$urlString, $params)){
    $updateId = $params[1];
    $newPost = new Controller();
    $newPost->activateUser($updateId);
}if($controllerName == 'administration-article'){
    $newPost = new Controller();
    $newPost->adminArticle();
}if(preg_match('#admin-article-([0-9]+)#',$urlString, $params)){
    $updateId = $params[1];
    $newPost = new Controller();
    $newPost->activateUser($updateId);
}if(preg_match('#admin-commentaire-([0-9]+)#',$urlString, $params)){
    $postId = $params[1];
    $newCommentaire = new CommentaryController();
    $newCommentaire->commentaryControllerListAdmin($postId);
}if(preg_match('#approve-comment-([0-9]+)#',$urlString, $params)){
    $commentId = $params[1];
    $newCommentaire = new CommentaryController();
    $newCommentaire->commentaryControllerAdminApprove($commentId);
}if(preg_match('#disapprove-comment-([0-9]+)#',$urlString, $params)){
    $commentId = $params[1];
    $newCommentaire = new CommentaryController();
    $newCommentaire->commentaryControllerAdminDisapprove($commentId);
}if(preg_match('#administration-update-post-([0-9]+)#',$urlString, $params)){
    $updateId = $params[1];
    $updateById = new Controller();
    $updateById->postControllerAdminUpdate($updateId);
}if(preg_match('#administration-delete-post-([0-9]+)#',$urlString, $params)){
    $deleteId = $params[1];
    $deleteById = new Controller();
    $deleteById->postControllerAdminDelete($deleteId);
}

require ('./app/Views/footer.php');