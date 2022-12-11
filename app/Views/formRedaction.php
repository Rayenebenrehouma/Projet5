<?php
if(isset($_SESSION['user'])){
?>

<div class="form_h1_style">
    <h1>Ajouter un article</h1>
</div>
<div class="form_style">
<form action="" method="POST">
    <input type="text" name="article_titre" placeholder="Titre"><br>
    <textarea name="article_contenu" id="" cols="30" rows="10" placeholder="Contenu de l'article"></textarea><br>
    <input type="text" name="article_chapo" placeholder="Chapo"><br>
    <input type="submit" value="Envoyer l'article">
</form>
<br>
</div>

<?php
}else{
    header('location: /connection');
}
?>