<?php
require '../vendor/autoload.php';

$page = $_GET['page'] ?: '404';
require '../elements/header.php';
if($page === 'blog'){
    require 'blog/home.php';
}if($page === 'redaction'){
    require 'blog/redaction.php';
}if($page === 'affichage'){
    require 'blog/article_affichage.php';
}if($page === 'solo'){
    require 'blog/article_solo.php';
}elseif ($page === '404'){
    require 'errors/404.php';
}
require '../elements/footer.php';
?>