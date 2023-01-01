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
            <th scope="col">Contenu</th>
            <th scope="col">auteur</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            for ($i = 0; $i <= 10000; $i++){
            if(isset($adminComment[$i])){
            ?>
            <th scope="row">
                <?=$adminComment[$i]->getId();?>
            </th>
            <th>
                <?=$adminComment[$i]->getContent();?>
            </th>
            <th>
                <?=$adminComment[$i]->getAuthor();?>
            </th>
            <th>
                <?=$adminComment[$i]->getStatus();?>
            </th>
            <th>
                <a href="approve-comment-<?=$adminComment[$i]->getId();?>">
                    <button class="btn btn-success mb-2">Approuver</button>
                </a>
                <a href="disapprove-comment-<?=$adminComment[$i]->getId();?>">
                    <button class="btn btn-danger">Désapprover</button>
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