<?php 
function loginRequired($bool){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($bool){
        if(!isset($_SESSION["user"])){
            $uri=$_SERVER["REQUEST_URI"];
            header("Location:/auth?next=".$uri);
        }
    }elseif(!$bool){
        if(isset($_SESSION["userId"])){
            $uri=$_SERVER["REQUEST_URI"];
            header("Location:/");
        }
    }
}

?>