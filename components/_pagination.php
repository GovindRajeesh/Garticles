<?php 
//aLwTj3SG8ZqJK#y
function pagination($total=0,$current=0,$next=null,$previous=null,$link="/?page="){
    include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php";
    $returnString="";
    
    $css=getStatic('css/pagination.css');

    $returnString.="<link rel='stylesheet' href='{$css}'>";
    $returnString.="<div class='pagination'>";

    if($previous!=null){
        $prevPage=$link.$previous;
        $returnString.="<a class='pagination-item' href='$prevPage'>Prev</a>";
    }

    for ($i=0; $i < $total; $i++) { 
        $toPage=$link.($i+1);
        $num=$i+1;
        $class=$num==$current?"pagination-item pagination-item-active":"pagination-item";
        $returnString.="<a class='$class' href='$toPage'>{$num}</a>";
    }

    if($next!=null){
        $nextPage=$link.$next;
        $returnString.="<a class='pagination-item' href='$nextPage'>Next</a>";
    }

    $returnString.="</div>";
    return $returnString;
}
?>