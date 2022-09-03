<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);

    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));

    if($article->rowCount() == 1){
        $article = $article->fetch();
        $titre = $article['titre'];
        $contenu = $article['contenu'];
    }else{
        die('Cet article n\'existe pas');
    }
}else{
    die('ERREUR');
}
?>
    <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>