<h1>Mettre à jour le post</h1>
<form action="" method="POST">
    <input type="text" name="article_titre" placeholder="Titre" value="<?= $postUpdate['titre']; ?>"><br>
    <input name="article_contenu" id="" cols="30" rows="10" placeholder="Contenu de l'article" value="<?= $postUpdate['contenu']; ?>"<br>
    <input type="text" name="article_chapo" placeholder="Chapo" value="<?= $postUpdate['chapo']; ?>"><br>
    <input type="text" name="article_auteur" placeholder="nom de l'auteur" value="<?= $postUpdate['auteur']; ?>"><br>
    <input type="submit" name="update" value="mettre a jour">
</form>
<br>