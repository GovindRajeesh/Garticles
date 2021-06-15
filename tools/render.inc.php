<?php
function render($layout,$template,$title="",$params=array()){
    $type="file";
    include_once($_SERVER["DOCUMENT_ROOT"]."//views//{$layout}");
}

function renderString($layout,$template,$title="",$params=array()){
    $type="string";
    include_once($_SERVER["DOCUMENT_ROOT"]."//views//{$layout}");
}

?>