
<div class="article_main_title">
    <h1>Liste des articles</h1>
    <h2>Découvrez Nous...</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci commodi dolorum earum, error eveniet, facilis fugiat iusto magni officiis pariatur, perferendis placeat quasi quisquam quod repudiandae totam vitae voluptatibus.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet laudantium odio velit. Accusantium aperiam assumenda cum doloremque est eum exercitationem explicabo harum nesciunt quam quos repellat rerum, sequi vero voluptate.
    </p>
</div>
<div class="article_separator">
</div>
<div class="article_list_style">
    <?php foreach ($blogPost as $post){ ?>
        <div class="article_content_style">
            <h1><?=$post->titre?></h1>
            <h2><?=$post->chapo?></h2>
            <div class="article_bottom_style">
                <a href="/article-<?= $post->id ?> ">
                    Voir plus
                </a>
                <h3><?= $post->date_time_publication ?></h3>
            </div>
        </div>
    <?php } ?>
</div>
