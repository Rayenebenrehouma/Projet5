<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
    <ul>
        <?php while($a = $articles->fetch()) { ?>
            <li><?= $a['titre'] ?></li>
            <li><?= $a['contenu'] ?></li>
            <li>
                <a href="http://localhost:8000/public?page=solo&&id=<?=$a['id']?>">
                    Voir plus
                </a>
            </li>
        <?php } ?>
    <ul>
