<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']->getRole() == 1){
        ?>
<h1>Supprimer le post</h1>
        <div class="deleteForm">
            <form action="" method="POST">
                <input type="text" name="article_titre" placeholder="Titre" value="<?= print_r($postDelete->getTitre()) ?>"><br>
                <input name="article_contenu" id="" cols="30" rows="10" placeholder="Contenu de l'article" value="<?= print_r($postDelete->getContenu()) ?>"<br>
                <input type="text" name="article_chapo" placeholder="Chapo" value="<?= print_r($postDelete->getChapo()) ?>"><br>
                <input type="text" name="article_auteur" placeholder="nom de l'auteur" value="<?= print_r($postDelete->getAuteur()) ?>"><br>
                <input type="submit" name="delete" value="supprimer">
            </form>
        </div>
        <?php
    }else{
        header ('location: /accueil');
    }
}else{
    header ('location: /connection');
}
?>