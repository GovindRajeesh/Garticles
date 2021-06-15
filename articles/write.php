<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//loginRequired.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";

loginRequired(true);
session_write_close();

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        render("layout.php","writer.php",$title="Writer");
        break;
    case "POST":
        uploadFromRequest(null);

        break;
}
?>