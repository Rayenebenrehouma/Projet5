<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']->getIdentifiant() == $postUpdate->getAuteur()){
?>
<h1>Mettre à jour le post</h1>
    <div class="upForm">
        <form action="" method="POST">
            <input type="text" name="article_titre" placeholder="Titre" value="<?= $postUpdate->getTitre(); ?>"><br>
            <input name="article_contenu" id="" cols="30" rows="10" placeholder="Contenu de l'article" value="<?= $postUpdate->getContenu(); ?>"<br>
            <input type="text" name="article_chapo" placeholder="Chapo" value="<?= $postUpdate->getChapo(); ?>"><br>
            <input type="submit" name="update" value="mettre a jour">
        </form>
    </div>
<br>
    <?php
}else{
    header ('location: /accueil');
}
}else{
    header ('location: /connection');
}
?>