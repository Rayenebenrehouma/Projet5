<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user']['role'] == 1){
    ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Dernière modification</th>
        <th scope="col">Châpo</th>
        <th scope="col">Voir Plus</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($blogPost as $post){ ?>
        <tr>
            <th scope="row"><?= $post->titre ?></th>
            <td><?= $post->date_time_publication ?></td>
            <td><?= $post->chapo ?></td>
            <td>@<a href="/article-<?= $post->id ?> ">
                    Voir plus
                </a></td>

    <?php } ?>
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