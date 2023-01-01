<?php
if(isset($_SESSION['user'])){
if($_SESSION['user']->getRole() == 1){
?>
<div class="article_main_title">
    <h1>Espace d'administration</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Liste des utilisateurs</th>
            <th scope="col">Liste des articles</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">
                <a href="/administration-utilisateur">
                    <button class="btn btn-primary">
                        Liste des utilisateurs
                    </button>
                </a>
            </th>
            <td>
                <a href="/administration-article">
                    <button class="btn btn-primary">Liste des articles</button>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
    <?php
}else{
    header ('location: /accueil');
}
}else{
    header ('location: /connection');
}
?>