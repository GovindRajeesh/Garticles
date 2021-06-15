<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//loginRequired.inc.php";

loginRequired(false);
session_write_close();

$isNext=array_key_exists("next",$_GET);

$desc=$isNext?"<p class='text-center'>Login or signup to continue</p>":"";

render("layout.php","auth.php",$title="Auth",$params=array("desc"=>$desc));
?>