<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']['role'] == 1){
        die(var_dump($_SESSION['user']['role']));
        ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Châpo</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Dernière modification</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><?= $postZoom['titre']; ?></th>
        <td><?= $postZoom['chapo']; ?></td>
        <td><?= $postZoom['contenu']; ?></td>
        <td><?= $postZoom['auteur']; ?></td>
        <td><?= $postZoom['date_time_publication']; ?></td>
        <td>
            <a class="btn btn-primary" href="/update-post-<?= $postId ?>">Update</a>
            <a class="btn btn-danger" href="/delete-post-<?=  $postId ?>">Delete</a>
            <a class="btn btn-success" href="/public?page=delete&&id=<?php echo $get_id ?>">Commentaires</a>
        </td>
    </tr>
    </tbody>
</table>
        <?php
    }else{
        header ('location: /accueil');
    }
}else{
    header ('location: /connection');
}
?>