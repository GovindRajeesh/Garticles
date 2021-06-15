<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";

$searched=true;
$query="";

if(!array_key_exists("query",$_GET) || strlen($_GET["query"])==0){
    $searched=false;
}else{
    $query=$_GET["query"];
}

if($searched){
    render("layout.php","results.php",$title="Search",
    $params=array(
    "title"=>"Articles search results for '{$_GET["query"]}'",
    "search_url"=>"/articles/search.php",
    "js"=>"js/articleResults.js",
    "css"=>"css/results.css"
    ));
}else{
    render("layout.php","searchBar.php",$title="Search",$params=array(
        "title"=>"Articles search",
        "search_url"=>"/articles/search.php",
    ));
}?>