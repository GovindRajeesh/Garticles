<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";

function fileUpload($img){
        $maxSize=2097152;

        if($img["size"]>$maxSize ){
            renderString("layout.php",
            "<p class='text-center'>Image size should not be greater than 2mb"."</p>",
            $title="");
            exit();
        }

        if(explode("/",$img["type"])[0]!="image"){
            renderString("layout.php",
            "<p class='text-center'>The file you have uploaded is not an image"."</p>",
            $title="");
            exit();
        }

        $filename=date("ymdHis").$img["name"];

        move_uploaded_file($img["tmp_name"],$_SERVER["DOCUMENT_ROOT"]."/media/".$filename);

        $img="/media/".$filename;

        return $img;
}

?>