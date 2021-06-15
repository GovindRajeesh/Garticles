<style>
    /**
    Style for search bar
    */
    .search-container{
        display:flex;
        justify-content:center
    }

    .search-elm{
        border-radius:3px;
        border-width:1px;
        height:2rem;
        text-indent:3px;
        border-color:rgb(204, 204, 204);
        border-top-right-radius:0px;
        border-bottom-right-radius:0px;
        outline:none !important;
        width:15rem;
    }

    .search-btn{
        border-width:1px;
        border-color:rgb(21, 128, 221);
        background-color: rgb(21, 128, 221);
        color:white;
        border-top-right-radius:3px;
        border-bottom-right-radius:3px;
        width:3rem;
        outline:none !important;
        cursor:pointer;
    }

    .search-btn:hover{
        background-color:rgb(19, 183, 233)
    }

    .search-icon::after{
        content:"\002315"
    }

    .search-title{
        text-align: center;
    }

</style>

<h2 class="search-title"><?php echo $params["title"];?></h2>

<div class="search-container">
    <form action="<?php echo "{$params["search_url"]}"?>" method="get">
        <div class="search-container">
            <input type="text" name="query" id="" class="search-elm" placeholder="Search">
    <button type="submit" class="search-btn">
        <span class="search-icon"></span>
    </button>
        </div>
    </form>
</div>

<br><br>