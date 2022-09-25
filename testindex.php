<?php
require './vendor/autoload.php';
require './app/Models/Post.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/accueil', function(){
    require './app/Views/header.php';
    require './app/Views/home.php';
    require './app/Views/footer.php';
});
$router->map('GET', '/liste-des-articles', function(){
    require './app/Views/header.php';
    require './app/Controllers/article_affichage.php';
    require './app/Views/footer.php';
});
$router->map('GET', '/ajouter-un-article', function(){
    require './app/Views/header.php';
    require './app/Controllers/redaction.php';
    require './app/Views/footer.php';
});
$router->map('GET', '/post/[*:slug]-[i:id]', function($slug, $id){
    require './app/Views/header.php';
    require './app/Controllers/article_solo.php';
    require './app/Views/footer.php';
});
$match = $router->match();
if ($match !== null){
    call_user_func_array($match['target'], $match['params']);
}else{
    echo 'pas d url disponnible';
}
?>