<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");


if(isset($_POST['commentary_content'], $_POST['commentary_author'])){
    if(!empty($_POST['commentary_content']) AND !empty($_POST['commentary_author'])){


        $commentary_content = htmlspecialchars($_POST['commentary_content']);
        $commentary_author = htmlspecialchars($_POST['commentary_author']);

        $ins = $bdd->prepare('INSERT INTO commentaire(content, author) VALUES(?, ?)');
        $ins->execute(array($commentary_content, $commentary_author));

        $message = 'Votre commentaire est en cours de vérification';
    }else{
        $message = "Veuillez remplir tous les champs";
    }
}
?>

<?php
require('./app/Views/formCommentary.php');
?>

<?php
if(isset($message)){
    echo $message;
}
?>