<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";

$article=getArticleBySlug($_GET["slug"]);

if($article==null){
    include($_SERVER["DOCUMENT_ROOT"]."//404.php");
        exit();
}

$title=htmlspecialchars($article["title"]);

render("layout.php",
"read.php",$title=$article["title"],
$params=array("article"=>$article,
"metadesc"=>substr($article["body"],0,10)));

?>