var tabs = {
    login: document.getElementById("login"),
    signup: document.getElementById("signup")
}

function setTab(tab) {
    for (const key in tabs) {
        tabs[key].style.display = "none"
        if (tabs[key] != tab) {
            document.querySelector(`[data-tab="${key}"]`).className = "tab-btn"
        }else{
            document.querySelector(`[data-tab="${key}"]`).className="tab-btn tab-btn-active"
        }
    }

    tab.style.display = "block"
}

setTab(tabs.login)

const hash = window.location.hash.substring(1);
if (hash.length > 0) {
    if (Object.keys(tabs).includes(hash)) {
        setTab(tabs[hash])
    }
}