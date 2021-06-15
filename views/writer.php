<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//db//categories.inc.php";
$cats=getAllCat();
$article=array_key_exists("article",$params)?$params["article"]:null;
?>
<div class="inner">
    <link rel="stylesheet" href="/static/css/writer.css">
    <h2 class="text-center">Writer</h2>
    <p class="text-center">Help you write articles.</p>
    <br><br>
    <form method="post" enctype="multipart/form-data" <?php
    if(isset($params["action"])){
        echo "action='{$params["action"]}'";
    }
    
    ?>>
        <textarea placeholder="Title" name="title"><?php
        if($article!=null){
            echo $article["title"];
        }
        ?></textarea>
        <br>
        <textarea placeholder="Body" name="body"><?php
        if($article!=null){
            echo $article["body"];
        }
        ?></textarea>
        <br>
        <div class="hor-center">
            <label for="catSelect">Select category:</label>
            &nbsp;
            <select name="cat" id="catSelect">
                <?php for($i=0;$i<sizeof($cats);$i++){?>
                <?php $cat=$cats[$i]?>
                <option value="<?php echo $cat["id"]?>" <?php if($article!=null && $article["catId"]==$cat["id"]){echo "selected";}?>><?php echo $cats[$i]["name"]?></option>
                <?php }?>
            </select>
        </div>
        <br><br>
        <div class="hor-center">
            <button type="button" onclick="setTab(tabs.address)" data-tab="address" class="tab-btn active">Image
                address</button>
            <button type="button" onclick="setTab(tabs.upload)" data-tab="upload" class="tab-btn">Image upload</button>
        </div>

        <div class="hor-center card img-part frm">
            <div id="address-type" style="display: inherit;">
                <input type="text" name="img" id="address" placeholder="Paste image address here..">
            </div>
            <div id="upload-type" style="display: none;">
                <input type="file" name="file" id="file">
                <label for="file">Choose a picture</label>
                &nbsp
                <span id="changeDetect">No image selected</span>
                <input type="hidden" name="type" <?php 
                if($article!=null && array_key_exists("image",$article) && $article["image"]!=null){
                    echo 'value="address"';
                }else{
                    echo 'value="none"';
                }
                ?>>
            </div>
        </div>
        <br>
        <div class="hor-center card frm">
            <img alt="" class="prv">
        </div>
        <br>
        <div class="hor-center">
            <button type="submit">Post</button>
        </div>
    </form>
    <script src="/static/js/writer.js"></script>
    <?php if($article!=null && array_key_exists("image",$article) && $article["image"]!=null){?>
        <script>
            document.getElementById("address").value="<?php echo $article["image"]?>"
            document.getElementsByClassName("prv")[0].src="<?php echo $article["image"]?>"
        </script>
    <?php }?>
</div>