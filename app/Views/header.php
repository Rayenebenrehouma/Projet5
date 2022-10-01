<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>projet 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<div class="banner">
    <nav>
        <img src="../../image/devlogo.png" class="logo" alt="">
        <ul>
            <li><a href="/accueil">Accueil</a></li>
            <li><a href="ajouter-un-article">Redaction</a></li>
            <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']['role'] == 1){
                ?>
                <li><a href="/liste-des-articles">Articles</a></li>
                <?php
                }
            }
            ?>
            <li><a href="/inscription">Inscription</a></li>
            <?php
            if(isset($_SESSION['user'])){
                ?>
                <li><a href="/deconnexion">Deconnexion</a></li>
                <?php
            }else{
            ?>
            <li><a href="/connection">Se Connecter</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>

    <div class="site-container">
        <p>Bienvenue sur</p>
        <h1>Le Projet 5</h1>
        <h4>Le developpeur qu'il vous faut</h4>
    </div>
</div>