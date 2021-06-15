<?php include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php"?>

<link rel="stylesheet" href="<?php echo getStatic("css/auth.css")?>">

<h2 class="text-center">Auth page</h2>
<p class="text-center"><?php echo $params["desc"]?></p>

<br>

<div class="hor-center">
    <div class="tab-btns">
        <button class="tab-btn" data-tab="login" onclick="setTab(tabs.login)">Login</button>
        <button class="tab-btn" data-tab="signup" onclick="setTab(tabs.signup)">Signup</button>
    </div>
</div>
<div class="hor-center">
    <div id="login" style="display:none" class="tab">
    <h2 class="text-center">Login</h2>
    <?php 
        $action="/auth/login.php";
        if(array_key_exists("next",$_GET)){
            $action.="?next=".$_GET["next"];
        }
        ?>
        <form action="<?php echo $action?>" method="post">
            <div class="hor-center">
                <input type="text" name="username" placeholder="Username">
            </div>
            <br>
            <div class="hor-center">
                <input type="password" name="password" placeholder="Password">
            </div>
            <br>
            <div class="hor-center">
                <input type="submit" value="Login">
            </div>
            <br>
        </form>
    </div>
    <div id="signup" style="display:none" class="tab">
        <h2 class="text-center">Signup</h2>
        <?php 
        $action="/auth/signup.php";
        if(array_key_exists("next",$_GET)){
            $action.="?next=".$_GET["next"];
        }
        ?>
        <form action="<?php echo $action?>" method="post">
            <div class="hor-center">
                <input type="text" name="username" placeholder="Username">
            </div>
            <br>
            <div class="hor-center">
                <input type="password" name="password" placeholder="Password">
            </div>
            <br>
            <div class="hor-center">
                <input type="submit" value="Signup">
            </div>
            <br>
        </form>
    </div>
</div>
<br>

<script src="<?php echo getStatic("js/auth.js")?>"></script>