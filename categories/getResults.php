<?php 

include_once $_SERVER["DOCUMENT_ROOT"]."//db//categories.inc.php";

if(array_key_exists("query",$_GET) && strlen($_GET["query"])>0){
SearchCat($_GET["query"]);
}else{
    header("Content-type:application/json");
    echo json_encode(array("response"=>"Query is empty"));
}
?>