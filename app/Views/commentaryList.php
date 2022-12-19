<section>
    <div class="article_zoom_commentary">
        <h1>Commentaires :</h1>
        <?php
            $number = 1;
            for ($i = 0; $i <= 40; $i++){
            if(isset($commentZoom[$i])){
            ?>
        <h2><?= $number ." - ". $commentZoom[$i]->getAuthor() ?></h2>
        <h3><?= $commentZoom[$i]->getContent();?></h3>
                <a href="delete-commentaire-<?=$commentZoom[$i]->getId()?>">
                    <button class="btn btn-danger">Supprimer</button>
                </a>
            <br>
        <?php
            $number++;
            }
            }
        ?>
    </div>
</section>
<hr>