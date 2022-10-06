<table class="table">
    <thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Châpo</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Dernière modification</th>
        <th scope="col">Commentaires</th>
        <?php
        if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] == 1){
        ?>
        <th scope="col">Actions</th>
            <?php
        }
        }
        ?>
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
            <a class="btn btn-primary" href="/commentary"> Liste des commentaires </a>
            <a class="btn btn-success" href="/commentary-add-<?= $postId ?>"> Ajout d'un commentaire</a>
        </td>
        <?php
        if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] == 1){
        ?>
        <td>
            <a class="btn btn-primary" href="/update-post-<?= $postId ?>">Update</a>
            <a class="btn btn-danger" href="/delete-post-<?=  $postId ?>">Delete</a>
        </td>
            <?php
                    }
                }
            ?>
    </tr>
    </tbody>
</table>
