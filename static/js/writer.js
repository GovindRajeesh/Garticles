const tabs={
    address:document.getElementById("address-type"),
    upload:document.getElementById("upload-type")
}

var img=document.querySelector(`input[type="file"]`)
var address=document.querySelector("#address")

img.addEventListener("change",(e)=>{
    if(e.target.files!=null && e.target.files.length>0){
        document.querySelector("#changeDetect").innerText=e.target.value

        var reader=new FileReader()

        reader.onload=()=>{
            document.querySelector(".prv").src=reader.result
        }

        reader.readAsDataURL(e.target.files[0])

        document.querySelector("[name='type']").value="file"
    }else{
        document.querySelector("#changeDetect").innerText="No file selected"

        document.querySelector(".prv").removeAttribute("src")

        if(address.value.length<=0){
            document.querySelector("[name='type']").value="none"
        }else{
            document.querySelector("[name='type']").value="address"
        }
    }
})

address.addEventListener("change",(e)=>{
    document.querySelector(".prv").src=e.target.value
    document.querySelector("[name='type']").value="address"
})

function setTab(tab){
    for (const key in tabs) {
        tabs[key].style.display="none"
        if(tabs[key]!=tab){
            document.querySelector(`[data-tab="${key}"]`).className="tab-btn"
        }else{
            document.querySelector(`[data-tab="${key}"]`).className="tab-btn active"
        }
    }
    tab.style.display="inherit"
}