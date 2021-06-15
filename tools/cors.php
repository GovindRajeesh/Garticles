<?php

function cors(){
    if(isset($_SERVER["HTTP_ORIGIN"])){
        $allowed=array("http://localhost:8080","https://garticlesbygovind.000webhostapp.com");
        $in_arr=array_search($_SERVER["HTTP_ORIGIN"],$allowed);
            if($in_arr!=null){
                header("Access-Control-Allow-Origin:".$allowed($in_arr));
            }else{
                header("Access-Control-Allow-Origin:".null);
            }
    }
}

?>