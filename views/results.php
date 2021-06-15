<?php 

include($_SERVER["DOCUMENT_ROOT"]."//views//searchBar.php");
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//static.inc.php";

echo "<script>
document.querySelector(`.search-elm`).value='{$_GET["query"]}'
const query='{$_GET["query"]}'
</script>";

?>

<style>
    .loading{
        background-color:transparent;
        height:4rem;
        width:4rem;
        border-radius:50%;
        border:10px solid transparent;
        border-right-color:#2379dd;
        border-width:3px;
        margin:auto;
        margin-top:10px;
        animation:spin 1s infinite linear;
    }

    @keyframes spin{
        0%{
            transform:rotate(0deg);
        }
        100%{
            transform:rotate(360deg);
        }
    }
</style>
<br><br>
<div id="results">
    <div class="loading"></div>
</div>

<link rel="stylesheet" href="<?php echo getStatic($params["css"])?>">
<script src="<?php echo getStatic($params["js"])?>"></script>