<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

$articles = $bdd->query("SELECT id, titre, date_time_publication, chapo FROM articles ORDER BY date_time_publication DESC");

$posts = [];
while($row = $articles->fetch()){
    $post = [
            'id' => $row['id'],
            'title' => $row['titre'],
            'chapo' => $row['chapo'],
            'update' => $row['date_time_publication']
    ];
    $posts[] =  $post;
}

require('./app/Views/articleList.php');

?>

