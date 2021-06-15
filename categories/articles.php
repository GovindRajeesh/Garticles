<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//db//categories.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//components//_pagination.php";

$limit=10;

if(array_key_exists("slug",$_GET)){
    $slug=$_GET["slug"];
}else{
    $slug=null;
}

$page=null;
if(!array_key_exists("page",$_GET)){
    header("Location:/categories/articles.php?slug=$slug&page=1");
}else{
    $page=$_GET["page"];
}

if($slug==null){
    header("Location:/categories/");
}else{
    $category=getCategoryBySlug($slug);

    if($category==null){
        include($_SERVER["DOCUMENT_ROOT"]."//404.php");
        exit();
    }

    // Retrieve from articles table
    $result=getArticlesByCat($category["id"],$page=$page,$limit=$limit);

    $articles=$result["results"];

    $totalPages=ceil($result["size"]/$limit);

    render("layout.php","displayArticles.php",
    $title="Articles of ".$category["name"],
    $params=array(
        "title"=>"Articles related to ".$category["name"],
        "category"=>$category,
        "results"=>$articles,
        "pagination"=>pagination(
            $total=$totalPages,
            $current=$page,
            $next=$page<$totalPages?$page+1:null,
            $previous=$page>1?$page-1:null,
            $link="/categories/articles.php?slug=".$slug."&page="
        )
        )
);
}
?>