const orderBtn = document.querySelector(".sidenav .order-btn"),
        ContentO = document.querySelector(".body-part .main-content");

orderBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();  // Creating XML object
    xhr.open("GET", "Page_Order_Dash.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                ContentO.innerHTML = data;

            }
        }
    }
    xhr.send();
}
