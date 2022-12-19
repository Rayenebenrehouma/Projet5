<?php
if(isset($_SESSION['user'])){
if($_SESSION['user']->getRole() == 1){
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
    <hr>
    <div>
        <a href="liste-des-commentaire-">
            <button class="btn btn-primary">Liste des commentaires</button>
        </a>
    </div>
</div>
    <?php
            }
        }else{
    ?>
    <div class="article_comment_bottom">
        <h1>Veuillez Vous connectez pour pouvoir laisser un commentaire !</h1>
    </div>

<?php
    }
?>