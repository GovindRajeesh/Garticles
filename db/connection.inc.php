<?php 

// Method to establish connection to db
function Db(){
    $host="";
    $username="garticlesaccess";
    $password="{id#|b2LB3F!!Q]S";
    return mysqli_connect($host,$username,$password,"garticles");
}
?>