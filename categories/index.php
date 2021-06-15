<?php
// Categories page

// Check if page number is given
// if not redirect to this page with page number
if(!array_key_exists("page",$_GET)){
    header("Location:?page=1");
}

include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//db//categories.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//components//_pagination.php";

// Css file
$css=getStatic("css/categories.css");

// Limit
// Maximum number of items in a page
$limit=8;

// Total number of pages
$totalPages=ceil(numCategories()/$limit);

// Get categories
$result=getCategories(
    $limit=$limit,
    $page=!array_key_exists("page",$_GET)?1:$_GET["page"]
);
$categories=$result["items"];

$response="";
// Loop through categories and append to a string
for ($i=0; $i < sizeof($categories); $i++) { 
    $response=$response."<a class='cat' 
    href='/categories/articles.php?slug={$categories[$i]["slug"]}'>{$categories[$i]['name']}</a><br>";
}

// Show page with categories
renderString(
    "layout.php",
    '<link rel="stylesheet" href="'.$css.'">
    <h1 class="text-center">Categories</h1>
    <p class="text-center">Page '.$page.' of '.$totalPages.'</p>
    <div style="display:flex;justify-content:center">
    <a href="/categories/search.php">Search for categories</a>
    </div>
    <br>'.
    $response."<br><br><div style='display:flex;justify-content:center;width:100%'>".pagination(
        $total=$totalPages,
        $current=$page,
        $next=$page<$totalPages?$page+1:null,
        $previous=$page>1?$page-1:$page-1,
        $link="?page=").'</div>'   ,
    $title="Categories"
)
?>