<?php
if(isset($_SESSION['user'])){
?>
<div class="article_zoom_form">
    <h1>Ajouter un commentaires</h1>
    <form action="" method="POST">
        <div class="form-group">
                <label for="">Votre commentaire</label>
            <textarea class="form-control" name="commentary_content">
            </textarea>
        </div>
        <button type="submit" value="ajout-commentaire" class="btn btn-primary">Ajout</button>
    </form>
</div>
    <?php

        }else{
    ?>
    <div class="article_comment_bottom">
        <h1>Veuillez Vous connectez pour pouvoir laisser un commentaire !</h1>
    </div>

<?php
    }
?>