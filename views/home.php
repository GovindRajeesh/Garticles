<style>
.loading {
    background-color: transparent;
    height: 4rem;
    width: 4rem;
    border-radius: 50%;
    border: 10px solid transparent;
    border-right-color: #673ab7;
    border-width: 3px;
    margin: auto;
    margin-top: 10px;
    animation: spin 1s infinite linear;
}

.latest-grid {
    display: grid;
    grid-template-columns: 18rem 18rem 18rem;
    grid-column-gap:5px;
}

@media screen and (max-width:768px) {
    .latest-grid{
        grid-template-columns:18rem;
        grid-row-gap:10px
    }

}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
<?php if(!isset($_SESSION["user"])){?>
<div class="hor-center">
    <div class="card" style="width:18rem">
        
            <h2 class="text-center">
            Welcome to Garticles
        </h2>
        <p class="text-center">This site enables you to:</p>
        <div class="hor-center">
            <ul>
                <li>Read articles written by users even if you dont have an account.</li>
                <br>
                <li>Write articles if you have an account.</li>
                <br>
                <li>Articles in this site can be fictional or non fictional.</li>
                <br>
                <li>This site can be a source of entertainment.</li>
            </ul>
        </div>
    </div>
</div>
<br><br>
<?php }else{?>
<h1 class="text-center">Hello <?php echo $_SESSION["user"]["username"]?> !</h1>
<br>
<div class="hor-center">
 <a href="/articles/other.php?action=random" class="btn" style="text-align:center;background-color:rgb(255,75,0)">Read Random</a>
</div>
<?php }?> 
<br><br> 
<h2 class="text-center">Latest articles</h2>
<p class="text-center">Shows latest 6 articles.</p>
<div class="hor-center">
    <div class="card">
        <div class="loading" id="latest"></div>
    </div>
</div>
<br><br><br>
<script>
    fetch("/articles/other.php?action=latest").then(res=>res.json())
    .then((res)=>{
        var latest=document.querySelector(`#latest`)
            latest.className="latest-grid"
        for (let index = 0; index < res.length; index++) {
            const article = res[index];
            
            const element=document.createElement("div")

            if(article.image==null){
                const noImg=document.createElement("div")
                noImg.style.display="flex"
                noImg.style.alignItems="center"
                noImg.style.justifyContent="center"
                noImg.style.backgroundColor="grey"
                noImg.style.height="10rem"
                noImg.innerText="No Image"
                element.appendChild(noImg)
            }else{
                const img=document.createElement("img")
                img.style.width="100%"
                img.style.height="10rem"
                img.src=article.image
                element.appendChild(img)
            }
            
            const title=document.createElement("a")
            title.innerText=article.title
            title.href="/articles?slug="+article.slug
            title.style.cursor="pointer"
            element.appendChild(title)

            latest.appendChild(element)
        }
    })
</script>