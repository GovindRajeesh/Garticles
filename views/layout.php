<?php include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php"?>
<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(array_key_exists("metadesc",$params)){?>
    <meta name="description" content="<?php echo $params["metadesc"]?>" />
    <?php }else{?>
    <meta name="description" content="An article site" />
    <?php }?>
    <title>
        <?php echo $title?> Garticles
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo getStatic('css/base.css')?>">
    <link rel="stylesheet" href="<?php echo getStatic('css/navbar.css')?>">


</head>

<body>
    <div class="fixed-container">
        <div class="fixed">
            <h1 class="text-center">Garticles</h1>
            <div style="display:flex;justify-content:center">
                <button class="navbar-toggle" style="width:10%;border-width:0px;
            background-color: rgb(72, 161, 240);
            color:white;padding:5px;border-radius: 2px;min-height:3rem;text-align:center">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="navbar mob-hid">
                <a href="/" class="navbar-item">Home</a>
                <a href="/articles/search.php" class="navbar-item">Articles Search</a>
                <a href="/categories" class="navbar-item">Categories</a>
                <a href="/#latest" class="navbar-item">Latest</a>
                <?php if(!isset($_SESSION["user"])){?>
                <a href="/auth#login" class="navbar-item">Login</a>
                <a href="/auth#signup" class="navbar-item">Signup</a>
                <?php }else{?>
                <a href="/articles/write.php" class="navbar-item">Write</a>
                <a href="/articles/myArticles.php" class="navbar-item">MyArticles</a>
                <a href="/auth/logout.php" class="navbar-item">Logout</a>
                <?php }?>
            </div>
            <br>
        </div>

    </div>
    <?php 
    if($type=="file"){
        include($_SERVER["DOCUMENT_ROOT"]."//views//{$template}");
    }else{
        echo $template;
    }
    ?>
    <br>
    <script>
    document.querySelector(".navbar-toggle").addEventListener("click", () => {
        var navbar = document.querySelector(".navbar")
        if (navbar.classList.contains("mob-hid")) {
            navbar.classList.remove("mob-hid")
            document.querySelector(".fixed").style.height = "100%"
            document.querySelector(".navbar-toggle").innerHTML = `<i class="fa fa-close"></i>`
        } else {
            navbar.classList.add("mob-hid")
            document.querySelector(".fixed").style.height = "150px"
            document.querySelector(".navbar-toggle").innerHTML = `<i class="fa fa-bars"></i>`
        }
    })
    </script>
    <?php if(isset($_SESSION["msg"])){?>
    <?php 
        $msg=$_SESSION["msg"];
        unset($_SESSION["msg"]);
    ?>
    <div class="msg-outer" id="<?php echo str_replace(" ","-",$msg["title"])?>">
        <div class="msg-inner">
            <h2 class="text-center"><?php echo $msg["title"]?></h2>
            <hr style="width:100%">
            <p class="text-center"><?php echo $msg["body"]?></p>
            <br>
            <div class="hor-center ver-center">
                <button class="msg-close"
                    onclick="document.querySelector(`#<?php echo str_replace(" ","-",$msg["title"])?>`).remove()">Close</button>
            </div>
        </div>
    </div>
    <?php }?>
    <p class="text-center">
                <strong>Note:</strong>Articles in this site can be fictional or non fictional.
            </p>
    <div class="hor-center">
        <footer>
            <p class="text-center">Garticles</p>
            <p class="text-center">A Govind Rajeesh Production</p>
            <p class="text-center">
                &copy; <?php echo date("Y")?> Garticles
            </p>
        </footer>

    </div>
</body>

</html>

<?php session_write_close()?>