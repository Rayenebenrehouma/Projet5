$page = $_GET['page'] ?: '404';
require '/app/Views/header.php';
if($page === 'blog'){
require 'app/Views/home.php';
}if($page === 'redaction'){
require 'app/Controllers/redaction.php';
}if($page === 'affichage'){
require 'app/Controllers/article_affichage.php';
}if($page === 'solo'){
require 'app/Controllers/article_solo.php';
}if($page === 'update'){
require 'app/Controllers/update_article.php';
}if($page === 'delete'){
require 'app/Controllers/delete_post.php';
}if($page === 'commentary'){
require 'app/Controllers/commentary.php';
}elseif ($page === '404'){
require 'app/Views/home.php';
}