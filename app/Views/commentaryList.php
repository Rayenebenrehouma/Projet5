<section>
    <div class="article_zoom_commentary">
        <h1>Commentaires :</h1>
        <?php foreach ($commentZoom as $comment){ ?>
        <h2><?= $comment->author?></h2>
        <h3><?= $comment->content ?></h3>
            <br>
        <?php
            }
        ?>
    </div>
</section>
<hr>