<?php
if(isset($_SESSION['user'])){
if($_SESSION['user']->getRole() == 1){
?>
<div class="article_main_title">
    <h1>Administration utilisateurs</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id-utilisateur</th>
            <th scope="col">identifiant</th>
            <th scope="col">email</th>
            <th scope="col">status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            for ($i = 0; $i <= 10000; $i++){
                if(isset($userList[$i])){
                    ?>
                    <th scope="row">
                        <?=$userList[$i]->getId();?>
                    </th>
                    <th>
                        <?=$userList[$i]->getIdentifiant();?>
                    </th>
                    <th>
                        <?=$userList[$i]->getEmail();?>
                    </th>
                    <th>
                        <?=$userList[$i]->getStatus();?>
                    </th>
                    <th>
                        <a href="/activer-utilisateur-<?=$userList[$i]->getId();?> ">
                            <button class="btn btn-success">
                                Activer
                            </button>
                        </a>
                    </th>
        </tr>
                    <?php
                }
            }
            ?>

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