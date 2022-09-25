<h1>Supprimer le post</h1>
<form action="" method="POST">
    <input type="text" name="article_titre" placeholder="Titre" value="<?= $postDelete['titre']; ?>"><br>
    <input name="article_contenu" id="" cols="30" rows="10" placeholder="Contenu de l'article" value="<?= $postDelete['contenu']; ?>"<br>
    <input type="text" name="article_chapo" placeholder="Chapo" value="<?= $postDelete['chapo']; ?>"><br>
    <input type="text" name="article_auteur" placeholder="nom de l'auteur" value="<?= $postDelete['auteur']; ?>"><br>
    <input type="submit" name="delete" value="supprimer">