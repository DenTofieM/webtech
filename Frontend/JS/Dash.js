const dashBtn = document.querySelector(".sidenav .dash-btn"),
        ContentD = document.querySelector(".body-part .main-content");

dashBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();  // Creating XML object
    xhr.open("GET", "Page_Dash.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                ContentD.innerHTML = data;

            }
        }
    }
    xhr.send();
}
