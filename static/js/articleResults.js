var container = document.getElementById("results")
var page = 1;

function fetchResults() {
    var loading=container.querySelector(".loading")

    if(loading==null){
        var loading=document.createElement("div")
        loading.className="loading"

        container.appendChild(loading)
    }
    fetch("/articles/getResults.php?query=" + query+"&page="+page).then(res => res.json())
        .then((res) => {
            if (res.results.length > 0) {
                for (let index = 0; index < res.results.length; index++) {
                    const item = res.results[index];

                    const element = document.createElement("div")
                    element.style.margin = "auto"
                    element.style.width = "50%"
                    element.style.display = "flex"
                    element.style.justifyContent = "center"

                    const resultEl = document.createElement("div")
                    resultEl.className = "article"
                    resultEl.style.textAlign = "center"

                    if(item.image!=null){
                        const img = document.createElement("img")
                    img.style.width = "100%"
                    img.style.height = "200px"
                    img.draggable = false
                    img.src = item.image
                    resultEl.appendChild(img)
                    }else{
                        const img = document.createElement("div")
                    img.style.width = "100%"
                    img.style.height = "200px"
                    img.style.backgroundColor="grey"
                    img.style.color="white"
                    img.innerText="No Image"
                    img.style.display="flex"
                    img.style.alignItems="center"
                    img.style.justifyContent="center"
                    resultEl.appendChild(img)
                    }

                    const title = document.createElement("a")
                    title.href = "/articles?slug=" + item.slug
                    title.innerText = item.title

                    resultEl.appendChild(title)

                    element.appendChild(resultEl)
                    container.appendChild(element)
                    container.appendChild(document.createElement("br"))

                }
            } else {
                container.style.display = "flex"
                container.style.justifyContent = "center"
                container.innerHTML = `
        <div><p>Your search - "${res.query}" - did not match any results.</p>

        <p>Suggestions:</p>
        <ul>
       <li>Make sure that all words are spelled correctly.</li>
       <li>Try different keywords.</li>
       <li>Try more general keywords.</li>
       </ul></div>
        `
            }

            if(loading!=null){
                loading.remove()
            }
            if(res.next!=null){
                page=parseInt(res.next)
            }else{
                page=null
            }
        })
}

fetchResults()

window.onscroll=()=>{
    if((window.innerHeight + window.scrollY) >= document.body.scrollHeight){
        if(page!=null){
            fetchResults()
        }
    }
}