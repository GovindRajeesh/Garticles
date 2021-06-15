<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//loginRequired.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//components//_pagination.php";

loginRequired(true);
session_write_close();

if(!array_key_exists("page",$_GET)){
    header("Location:/articles/myArticles.php?page=1");
    exit();
}

// PAGE NUMBER
$page=$_GET["page"];

$limit=10;

$result=getUsersArticles($_SESSION["user"]["id"],$page=$page,$limit=$limit);
$articles=$result["items"];

$totalPages=ceil($result["totalLength"]/$limit);

$pagination=pagination(
    $total=$totalPages,
    $current=$page,
    $next=$page<$totalPages?$page+1:null,
    $previous=$page>1?$page-1:$page-1,
    $link="?page=");

render("layout.php","displayArticles.php",$title="Articles of user",$params=array(
    "results"=>$articles,
    "title"=>"MyArticles.",
    "pagination"=>$pagination,
));
?>