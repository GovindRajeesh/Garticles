<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//db//connection.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//fileUpload.php";

// Method to get articles by the category
function getArticlesByCat($id,$page=1,$limit=10){
    // Initialize db
    $db=Db();

    // Get the index of first item of the page
    $startindex=($page-1)*$limit;

    // Query for articles
    $query=mysqli_query($db,"SELECT * FROM `articles` WHERE `catId`='{$id}' ORDER BY `date` DESC LIMIT $startindex,$limit");
    
    echo mysqli_error($db);
    // Array for storing results
    $results=array();

    // Get results from query and store it in results array
    while($i=mysqli_fetch_assoc($query)){
        // Storing the rsult in the results array
        array_push($results,$i);
    }

    $query=mysqli_query($db,"SELECT COUNT(*) AS NUM FROM `articles` WHERE `catId`='{$id}'");

    $size=mysqli_fetch_assoc($query)["NUM"];

    // Return the results
    return array("results"=>$results,"size"=>$size);
}

function SearchArticles($query,$page=1,$limit=10){

    // Index of the first item in the page
    $startindex=($page-1)*$limit;

    $db=Db();
    $res=mysqli_query($db,"
    SELECT `title`,`slug`,`image`
 FROM `articles` WHERE 
MATCH(`title`,`body`,`slug`) AGAINST ('$query' IN NATURAL LANGUAGE MODE)
 LIMIT $startindex,$limit
    ");

    $items=array();

    while($i=mysqli_fetch_assoc($res)){
        array_push($items,$i);
    }

    $res=mysqli_query($db,"SELECT COUNT(*) AS NUM FROM `articles` WHERE MATCH(`title`,`body`,`slug`) AGAINST ('$query' IN NATURAL LANGUAGE MODE)");
    $NumResults=mysqli_fetch_assoc($res)["NUM"];

    $totalPages=ceil($NumResults/$limit);

    header("Content-type:application/json");

    echo json_encode(array(
        "results"=>$items,
        "next"=>$page<$totalPages?$page+1:null,
        "query"=>$query,
        "num"=>$NumResults
    ));
}

function getArticleBySlug($slug){
    $db=Db();

    // Query Database for article
    $query=mysqli_query($db,"SELECT * FROM `articles` WHERE `slug`='$slug' LIMIT 1");

    // Get article from the query
    $article=mysqli_fetch_assoc($query);

    return $article;
}

function getLatest(){
    $db=Db();

    // Query Database for latest articles
    $query=mysqli_query($db,"SELECT `title`,`body`,`image`,`slug`,`username` AS `user` FROM `articles` JOIN `users` ON `users`.`id`=`articles`.`userId` ORDER BY `date` DESC LIMIT 6");

    $articles=array();
    
    // Retrieve articles from query
    while($i=mysqli_fetch_assoc($query)){
        array_push($articles,$i);
    }

    return $articles;

}

function insert($form){
    $db=Db();

    $query="INSERT INTO `articles`(`title`,`body`,`image`,`userId`,`slug`,`catId`) VALUES('{$form["title"]}','{$form["body"]}','{$form["image"]}',{$_SESSION["user"]["id"]},'{$form["slug"]}',{$form["cat"]})";
    if(mysqli_query($db,$query)==true){
        session_start();
        $_SESSION["msg"]=array(
            "title"=>"Success",
            "body"=>"Article inserted successfully!"
        );
        session_write_close();
    }
}

function getUsersArticles($id,$page=1,$limit=10){
    $db=Db();

    $startindex=($page-1)*$limit;

    $query=mysqli_query($db,"SELECT * FROM `articles` WHERE `userId`=$id ORDER BY `date` desc LIMIT $startindex,$limit");

    $articles=array();

    // Fetch results from database and append to articles array
    while($article=mysqli_fetch_assoc($query)){
        array_push($articles,$article);
    }

    $query=mysqli_query($db,"SELECT COUNT(*) AS length FROM `articles` WHERE `userId`=$id");
    $totalLength=mysqli_fetch_assoc($query)["length"];

    return array(
        "items"=>$articles,
        "totalLength"=>$totalLength
    );
}

function RandomSlug(){
    $db=Db();

    $query=mysqli_query($db,"SELECT `slug` FROM `articles` ORDER BY Rand() DESC Limit 1");

    return mysqli_fetch_assoc($query)["slug"];
}

function uploadFromRequest($slug){
    $title=htmlspecialchars($_POST["title"]);
    $body=htmlspecialchars($_POST["body"]);
    $img_type=htmlspecialchars($_POST["type"]);
    $img=null;

    if($img_type=="address"){
        $img=$_POST["img"];
    }elseif($img_type=="file"){
        $img=fileUpload($_FILES["file"]);
    }
if($slug==null){$slug=urlencode(addslashes($_POST["title"])).date("ymdHis");};

    insert(array("title"=>addslashes($title),"body"=>addslashes($body),"image"=>addslashes($img),"slug"=>$slug,"cat"=>$_POST["cat"]));

    header("Location:"."/articles?slug=".$slug);
}

function deleteArticle($id){
    $db=Db();

    mysqli_query($db,"DELETE FROM `articles` WHERE `id`={$id} LIMIT 1");
}

function updateArticle($id,$form){
    $qstring="";

    $value=addslashes($value);
    foreach ($form as $key => $value) {
        $qstring.="`{$key}`='{$value}'";

        if($key!=array_key_last($form)){
            $qstring.=",";
        }
    }

    $db=Db();

    $query=mysqli_query($db,"UPDATE `articles` SET $qstring WHERE `id`=$id");
}

?>