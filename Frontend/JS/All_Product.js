
for(let i=0; i<11; i++){
    let TitleContent = this.document.querySelectorAll(".side-part .items-col p")[i];
    //let TitleShow = document.querySelector(".product-name-show h1");
    //let showProduct = document.querySelector(".show-product-part")
    TitleContent.onclick = ()=>{
        TitleShow.innerHTML = TitleContent.innerHTML;
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../../Backend/All_Product.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    showProduct.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("cat="+TitleContent.innerHTML);
    }
}