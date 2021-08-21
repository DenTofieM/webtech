const cateList = document.querySelector(".ad-part .sidenav .category-list");

let CatRH = new XMLHttpRequest();
CatRH.open("GET","../../Backend/Get_Category.php", true);
CatRH.onload = ()=>{
    if(CatRH.readyState === XMLHttpRequest.DONE){
        if(CatRH.status == 200){
            let category = CatRH.response;
            cateList.innerHTML = category;
        }
    }
}
CatRH.send();