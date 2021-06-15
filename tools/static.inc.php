<?php 

function getStatic($url){
    $protocol=strtolower(explode("/",$_SERVER["SERVER_PROTOCOL"])[0]);
    return "/static/".$url;
}
?>