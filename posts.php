<?php
## Desc: posts.php - Display individual post.
## Auth: Drew D. Lenhart
## http://www.drewlenhart.com
## 07/05/15

include("lib/posts.class.php");
include("includes/header.php");

//get article from URL
$get_article = strip_tags($_GET['post']);

$view = New listPost();
?>

<?php 
//readPosts("directory", "get_article variable.") -- Grabs post slug from URL
echo $view->readPosts("posts", $get_article);
?>

<?php
include("includes/footer.php");
?>

