<?php
## Desc: index.php - Display all posts
## Auth: Drew D. Lenhart
## http://www.drewlenhart.com
## 07/05/15

require_once("lib/list.class.php");
include("includes/header.php");

$reader = new listArticle();

//get the article list from controller
//posts are in the posts dir
$rc = $reader->indexCont("posts/");
?>

<?php
//loop out each article and display accordingly
foreach ($rc as $articles){
    $output = "<h2>" . $articles['title'] . "</h2>";
    $output .= "By: <em>" . $articles['auth'] . "</em> - " . $articles['date'] . "<br /><br />";

    //only list first 200 characters from content. Also strip tags so it doesnt show html on listing page
    $content = strip_tags($articles['content']);
    $content = substr($content, 0, 200);

    $output .= $content . " <a href='posts.php?post=" . $articles['slug'] . "'>Read More>>></a>";
    $output .= "<hr>";
    echo $output;
}
?>

<?php
include("includes/footer.php");
?>