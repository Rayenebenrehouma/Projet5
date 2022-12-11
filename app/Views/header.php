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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../Accueil.css">
</head>
<body>

<header>
    <div class="limitedWidthBlockContainer informations">
    </div>
    <div class="limitedWidthBlockContainer menu">
        <div class="limitedWidthBlock">
            <a href="./index.html">
                <img class="logo" src="../../image/devlogo.png" alt="Logo de l'entreprise">
            </a>
            <nav>
                <ul>
                    <a href="/accueil"><li>Accueil</li></a>
                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                    <a href="/ajouter-un-article"><li>Rédaction</li></a>
                    <?php
                    }
                    ?>
                    <a href="/liste-des-articles"><li>Articles</li></a>
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                    <a href="/inscription"><li>inscription</li></a>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                    <a href="/deconnexion"><li>deconnexion</li></a>
                    <?php
                    }else{
                    ?>
                    <a href="/connection"><li>connexion</li></a>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <img class="banniere" src="../../image/Banner.jpg" alt="Baniere">
</header>