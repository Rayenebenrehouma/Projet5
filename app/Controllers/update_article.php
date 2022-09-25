
<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");
$get_id = intval ($_GET['id']);
if(isset($_POST['update'])){
    $titre = $_POST['article_titre'];
    $chapo = $_POST['article_chapo'];
    $contenu = $_POST['article_contenu'];
    $auteur = $_POST['article_auteur'];

    $article = $bdd->prepare('UPDATE articles SET titre = ?, chapo = ?, contenu = ?, auteur = ? WHERE id = ?');
    $article->execute(array($titre, $chapo, $contenu, $auteur, $get_id));

    header('location: index.php?page=blog');
}

$get_id = intval ($_GET['id']);
$sql = "SELECT `titre`, `contenu`, `chapo`, `auteur` FROM `articles` WHERE id = ?";

$query = $bdd->prepare($sql);
$query->execute(array($get_id));

$result = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($result as $row)
        {
            require('./app/Views/updateForm.php');
        }
    ?>
</form>
<br>

