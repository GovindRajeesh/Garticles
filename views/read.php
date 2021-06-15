<?php include_once $_SERVER["DOCUMENT_ROOT"]."//tools/static.inc.php"?>
<?php include_once $_SERVER["DOCUMENT_ROOT"]."//db/users.inc.php"?>
<?php include_once $_SERVER["DOCUMENT_ROOT"]."//db/categories.inc.php"?>

<link rel="stylesheet" href="<?php echo getStatic("css/read.css")?>">

<?php $article=$params["article"]?>

<?php
$article["title"]=htmlspecialchars($article["title"]);
$article["body"]=nl2br(strip_tags($article["body"]));
?>

<h1 class="text-center"><?php echo $article["title"]?></h1>

<p class="text-center">Article related to <a href="/categories/articles.php?slug=<?php echo getCategoryById($article["catId"])["slug"]?>"><?php echo getCategoryById($article["catId"])["name"]?></a></p>
<?php if(isset($_SESSION["user"]) && $_SESSION["user"]["id"]==$article["userId"]){?>
    <p class="text-center">Article by you.<a href="<?php echo "/articles/other.php?action=edit&slug=".$article["slug"]?>">Edit?</a></p>
<?php }else{?>
    <p class="text-center">Article by <?php echo getUserById($article["userId"])["username"]?></p>
<?php }?>

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
            color:white;"
        >
        No Image
    </div>
    <?php }?>
</div>

<div class="hor-center">
    <div class="article-desc-cont">
        <p class="paragraph"><?php echo $article["body"]?></p>
    </div>
</div>