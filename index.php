<?php
//BP8sISjYLx&x77%lBQ*1
ini_set('display_errors','Off');

// Home page

include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";

// Show Home page
render("layout.php","home.php",$title="Home");

?>