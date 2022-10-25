<section>
    <div class="article_zoom_commentary">
        <h1>Commentaires :</h1>
        <?php
            $number = 1;
            foreach ($commentZoom as $comment){
                ?>
        <h2><?= $number ." - ". $comment->author?></h2>
        <h3><?= $comment->content;?></h3>

            <br>
        <?php
            $number++;
            }
        ?>
    </div>
</section>
<hr>