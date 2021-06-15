<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//db//connection.inc.php";

function getCategories($limit=5,$page=1){
    // Initialize db
    $db=Db();
    $prev;
    $next;

    // Index of first item of the page
    $startIndex=($page-1)*$limit;

    $lastIndex=$startIndex+$limit-1;
    
    // Query to retrieve categories from db
    $res=mysqli_query($db,"SELECT * FROM categories LIMIT $startIndex,$limit");

    if($lastIndex>=numCategories()){
        $next=null;
    }else{
        $next=$page+1;
    }

    if($startIndex>0){
        $prev=$page-1;
    }else{
        $prev=null;
    }

    $out=array();


    if(mysqli_num_rows($res)>0){
        while($i=mysqli_fetch_assoc($res)){
            array_push($out,$i);
        }
    }else{
        array_push($out,mysqli_fetch_assoc($res));
    }

    return array("items"=>$out,"next"=>$next,"prev"=>$prev);
}

// Method to get number of categories
function numCategories(){
    $db=Db();
    $res=mysqli_query($db,"SELECT COUNT(*) AS NUM FROM `categories`");

    return mysqli_fetch_assoc($res)["NUM"];
}

function SearchCat($query){

    // Split the query string by spaces
    $queryArray=explode(" ",$query);
    $qstring="";
    
    // Check whether there is space in the query array
    $isSpacein=array_search(" ",$queryArray);

    // If there is space remove it
    if($isSpacein){
        unset($queryArray[$isSpacein]);
    }

    for ($i=0; $i < sizeof($queryArray); $i++) { 
        if($queryArray[$i]!=""){
            $qstring.="`name` LIKE '%{$queryArray[$i]}%'";

        if($i==(sizeof($queryArray)-1)){
            $qstring.="";
        }else{
            if($i+1<sizeof($queryArray)&& $queryArray[$i+1]==""){
            }else{
                $qstring.=" OR ";

            }
        }
        }
    }

    $db=Db();
    $query=mysqli_query($db,"SELECT * FROM `categories` WHERE $qstring");
    $results=array();

    while($i=mysqli_fetch_assoc($query)){
        array_push($results,$i);
    }
    
    // Display results in json format
    header("Content-type:application/json");
    echo json_encode(array("results"=>$results,"query"=>$_GET["query"]));
}


function getCategoryBySlug($slug){
    $db=Db();
    $query=mysqli_query($db,"SELECT * FROM `categories` WHERE `slug`='{$slug}' LIMIT 1");
    $r=mysqli_fetch_assoc($query);
    return $r!=null?
    $r:null;
}

function getCategoryById($id){
    $db=Db();
    $query=mysqli_query($db,"SELECT * FROM `categories` WHERE `id`='{$id}' LIMIT 1");
    $r=mysqli_fetch_assoc($query);
    return $r!=null?
    $r:null;
}

function getAllCat(){
    $db=Db();
    $res=mysqli_query($db,"SELECT * FROM categories");

    $out=array();


    if(mysqli_num_rows($res)>0){
        while($i=mysqli_fetch_assoc($res)){
            array_push($out,$i);
        }
    }else{
        array_push($out,mysqli_fetch_assoc($res));
    }

    return $out;
}
?>