<div id="cv">
    <?php
    if(isset($_SESSION['user'])){
    ?>
    <h1><?php print_r($_SESSION['user']->getIdentifiant()); ?></h1>
    <?php
        }
    ?>
        <h2 id="titre_cv">Découvrez mon CV</h2>
        <a href="/app/public/cv/CV_Developpeur_Web_-_Rayene_Ben_Rehouma.pdf.pdf" id="link_pdf">CV développeur Web Rayen Ben Rehouma</a>
    </div>
    <div class="container mailForm">
        <form action="" method="POST" class="form">
            <h3 id="title_form">Envoyez nous un message</h3>

            <input type="text" id="firstname" name="firstname" placeholder="Votre nom" required>

            <input type="text" id="sujet" name="sujet" placeholder="Objet" required>

            <input type="email" id="email" name="email" placeholder="Votre Email" required>

            <textarea id="message" name="message" cols="30" rows="4" placeholder="Votre message..."></textarea>

            <button type="submit">Envoyez</button>

        </form>
    </div>