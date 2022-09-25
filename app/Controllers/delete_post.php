<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

$get_id = intval ($_GET['id']);

if(isset($_POST['delete'])){
    $article_delete = "DELETE FROM `articles` WHERE id = ?";
    $req = $bdd->prepare($article_delete);
    $req->execute(array($get_id));
    header('location: index.php?page=blog');
}

$sql = "SELECT `titre`, `contenu`, `chapo`, `auteur` FROM `articles` WHERE id = ?";

$query = $bdd->prepare($sql);
$query->execute(array($get_id));

$result = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($result as $row)
{
    require('./app/Views/deleteForm.php');
}
?>
</form>
<br>
?>