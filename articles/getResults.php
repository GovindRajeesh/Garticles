<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";

SearchArticles($_GET["query"],$page=array_key_exists("page",$_GET)?$_GET["page"]:1);
?>