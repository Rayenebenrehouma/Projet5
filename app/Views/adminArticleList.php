<?php
if(isset($_SESSION['user'])){
if($_SESSION['user']->getRole() == 1){
?>
<div class="article_main_title">
    <h1>Administration articles</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">chapo</th>
            <th scope="col">auteur</th>
            <th scope="col">Dernière date de modification</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            for ($i = 0; $i <= 10000; $i++){
            if(isset($blogPost[$i])){
            ?>
            <th scope="row">
                <?=$blogPost[$i]->getId();?>
            </th>
            <th>
                <?=$blogPost[$i]->getTitre();?>
            </th>
            <th>
                <?=$blogPost[$i]->getContenu();?>
            </th>
            <th>
                <?=$blogPost[$i]->getChapo();?>
            </th>
            <th>
                <?=$blogPost[$i]->getAuteur();?>
            </th>
            <th>
                <?=$blogPost[$i]->getDateTimePublication();?>
            </th>
            <th>
                <a href="administration-update-post-<?=$blogPost[$i]->getId();?>">
                    <button class="btn btn-primary">Update</button>
                </a>
                <a href="administration-delete-post-<?=$blogPost[$i]->getId();?>">
                    <button class="btn btn-danger">Delete</button>
                </a>
                <a href="admin-commentaire-<?=$blogPost[$i]->getId();?>">
                    <button class="btn btn-primary">Liste des commentaires</button>
                </a>
            </th>
        </tr>
        <?php
        }
        }
        ?>

        </tbody>
    </table>
</div>
    <?php
}else{
    header ('location: /accueil');
}
}else{
    header ('location: /connection');
}
?>