<?php include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php"?>

<link rel="stylesheet" href="<?php echo getStatic("css/articles.css")?>">

<?php if(isset($params["title"])){?>
    <h2 class="text-center"><?php echo $params["title"]?></h2>
    <br><br>
<?php }?>

<?php
$articles=$params["results"];

if(sizeof($articles)>0){
for ($i=0; $i < sizeof($articles); $i++) {
    $article=$articles[$i];

    $article["title"]=htmlspecialchars($article["title"]);
    
    $article["body"]=htmlspecialchars($article["body"]);
?>
<div class="cont-article">
    <div class="article">
        <h3 style="text-align:center"><a
                href="/articles?slug=<?php echo $article["slug"]?>"><?php echo htmlspecialchars($article["title"])."<br>"?></a></h3>
                <p class="text-center">Last updated on <?php echo $article["date"]?></p>
        <hr>
        <div class="hor-center">
            <?php
    if($article["image"]!=null){
    ?>
            <img draggable="false" loading="lazy" src="<?php echo $article["image"]?>" class="article-img">
            <?php }else{?>
            <div class="article-img" style="
            background-color:grey;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;">
                No Image
            </div>
            <?php }?>
        </div>
        <br>
        <div class="hor-center">
        <a class="text-center btn" href="/articles?slug=<?php echo $article["slug"]?>"><?php echo "Read"?></a>
        <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["id"]==$article["userId"]){?>
        &nbsp;
        <a href="/articles/other.php?action=edit&slug=<?php echo urlencode($article["slug"])?>" class="text-center btn">Edit</a>
        <?php }?>
        </div>
    </div>
</div>
<?php }}else{?>
<div class="text-center">No articles related to this category.</div>
<?php }?>

<br><br>
<div style="display:flex;justify-content:center">
    <?php echo $params["pagination"];?>
</div>