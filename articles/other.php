<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//render.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//loginRequired.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//db//articles.inc.php";


$action=array_key_exists("action",$_GET)?$_GET["action"]:"";
switch ($action) {
    case 'latest':
        header("Access-Control-Allow-Origin:*");
        header("Content-type:application/json");
        echo json_encode(getLatest(), JSON_PARTIAL_OUTPUT_ON_ERROR);
        break;

    case 'random':
        // Run method RandomSlug from articles.inc.php and get result
        $slug=RandomSlug();

        // Redirect to the article
        header("Location:/articles/?slug=".$slug);
        break;
        
    case "edit":
        loginRequired(true);
        $slug=array_key_exists("slug",$_GET)?$_GET["slug"]:"";
        
        $article=getArticleBySlug($slug);

        session_write_close();

        if($article==null || !array_key_exists("userId",$article) || $article["userId"]!=$_SESSION["user"]["id"]){
            include($_SERVER["DOCUMENT_ROOT"]."//404.php");
            exit();
        }else{
            switch ($_SERVER["REQUEST_METHOD"]) {
                case 'GET':
                    render("layout.php","writer.php",$title="Edit ".$article["title"],$params=array(
                        "article"=>$article,
                        "action"=>$_SERVER["REQUEST_URI"]
                    ));
                    break;

                case 'POST':
                    include_once $_SERVER["DOCUMENT_ROOT"]."//tools//cors.php";
                    cors();

                    $img=null;

                    $fields=array(
                        "title",
                        "body"
                    );
                    // Check if the fields are present in the request
                    for ($i=0; $i < sizeof($fields); $i++) { 
                        $fieldname=$fields[$i];

                        if(!array_key_exists($fieldname,$_POST) || !isset($_POST[$fieldname]) || strlen($_POST[$fieldname])<=0){
                            // Show form error message
                            $_SESSION["msg"]=array(
                                "title"=>"Form error",
                                "body"=>"One of the field is empty,try again."
                            );

                            // Send user to the page they came from page
                            header($_SERVER["REQUEST_URI"]);

                            exit();
                            // Break the loop
                            break;
                        }
                    }

                    if($_POST["type"]=="file"){
                        if(file_exists($_SERVER["DOCUMENT_ROOT"].$article["image"])){
                            unlink($_SERVER["DOCUMENT_ROOT"].$article["image"]);
             
                        }
               $img=fileUpload($_FILES["file"]);
                    }elseif($_POST["type"]=="address"){
                        $img=$_POST["img"];
                    }

                    if($_POST["type"]=="address" && $_POST["img"]!=$article["image"]){
                        if(file_exists($_SERVER["DOCUMENT_ROOT"].$article["image"])){
                            unlink($_SERVER["DOCUMENT_ROOT"].$article["image"]);
                        }
                    }
                    updateArticle($article["id"],array(
                        "title"=>$_POST["title"],
                        "body"=>$_POST["body"],
                        "image"=>$img,
                    ));

                    renderString("layout.php","
                    <h2 class='text-center'>Article {$article['title']} updated successfully!</h2>
                    <p class='text-center'><a href='/articles?slug={$article['slug']}'>Do you want to read it?</a></p>
                    ",$title="success");
                    
                    break;

                default:
                    # code...
                    break;
            }
        }
        break;
    default:
        renderString("layout.php",'
        <style>.page-to-go{
            padding:10px;
        }</style>
        <h1 class="text-center">Things to do with Articles</h1>
        <div class="hor-center">
        <div class="pages-to-go">
            <a href="/" class="page-to-go">Latest</a>
            <a href="?action=random" class="page-to-go">Read random article</a>
        </div>
        </div>
        
        ',$title="");
        break;
}
?>