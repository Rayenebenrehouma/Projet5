<?php
if(isset($_SESSION['user'])){
if($_SESSION['user']['role'] == 1){
?>
<h1>Ajouter un commentaires</h1>
<form action="" method="POST">
    <div class="form-group">
        <label for="">Contenu du commentaire</label>
        <textarea class="form-control" name="commentary_content">
        </textarea>
    </div>
    <button type="submit" value="ajout-commentaire" class="btn btn-primary">Ajout</button>
</form>

    <?php
            }
        }else{
    header ('location: /connection');
}
    ?>