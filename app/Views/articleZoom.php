<section>
    <div class="article_zoom">
        <h1><?= $postZoom->getTitre();?></h1>
        <h2><?= $postZoom->getChapo(); ?></h2>
        <p><?= $postZoom->getContenu(); ?></p>
            <h3 class="article_zoom_h3"><?= $postZoom->getAuteur(); ?></h3>
            <h3 class="article_zoom_h3"><?= $postZoom->getDatetimepublication(); ?></h3>
    </div>
    <h1>Administrateur <?= $postZoom->getAuteur(); ?></h1>
    <?php
    if(isset($_SESSION['user'])){
    if($_SESSION['user']->getRole() == 1){
    ?>
            <h4>Admin Post</h4>
        <div>
        <a href="update-post-<?= $postZoom->getId(); ?>">
            <button class="btn btn-primary">Update</button>
        </a>
        <a href="delete-post-<?= $postZoom->getId(); ?>">
            <button class="btn btn-danger">Delete</button>
        </a>
    </div>
    <?php
        }
    }
    ?>
</section>
<hr>