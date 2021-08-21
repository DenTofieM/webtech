const customerBtn = document.querySelector(".sidenav .customer-btn"),
        ContentC = document.querySelector(".body-part .main-content");

customerBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();  // Creating XML object
    xhr.open("GET", "Page_Customer.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                ContentC.innerHTML = data;

            }
        }
    }
    xhr.send();
}
