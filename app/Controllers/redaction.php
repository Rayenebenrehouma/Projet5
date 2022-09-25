<?php
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");


    if(isset($_POST['article_titre'], $_POST['article_contenu'])){
        if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])){


        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);
        $article_chapo = htmlspecialchars($_POST['article_chapo']);
        $article_auteur = htmlspecialchars($_POST['article_auteur']);

        $ins = $bdd->prepare('INSERT INTO articles(titre, contenu, chapo, auteur, date_time_publication) VALUES(?, ?, ?, ?, NOW())');
        $ins->execute(array($article_titre, $article_contenu,$article_chapo, $article_auteur));

        $message = 'Votre article a bien été posté';
        }else{
            $message = "Veuillez remplir tous les champs";
        }
    }
?>

<?php
        require('./app/Views/formRedaction.php');
?>

    <?php
    if(isset($message)){
        echo $message;
    }
    ?>

