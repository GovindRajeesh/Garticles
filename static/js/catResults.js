var container = document.getElementById("results")

function getResults() {
    fetch("/categories/getResults.php?query=" + query).then(res => res.json())
        .then((res) => {
            if (res.results.length > 0) {
                for (let index = 0; index < res.results.length; index++) {
                    const item = res.results[index];

                    const element = document.createElement("div")
                    element.style.margin = "auto"
                    element.style.width = "50%"
                    element.style.display = "flex"
                    element.style.justifyContent = "center"

                    const resultEl = document.createElement("a")
                    resultEl.href = "/categories/articles.php?slug=" + item.slug
                    resultEl.className = "cat"
                    resultEl.style.textAlign = "center"
                    resultEl.innerText = item.name

                    element.appendChild(resultEl)
                    container.appendChild(element)
                    container.appendChild(document.createElement("br"))

                }
            } else {
                container.style.display="flex"
                container.style.justifyContent="center"
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
            container.querySelector(".loading").remove()
        })
}

getResults()