let HomeBar = document.querySelector("header .super_shop_logo img");

HomeBar.onclick = ()=>{
    location.href = "Page_Home.php";
}

let userProfile = document.querySelector("header .icons-bar .profile-btn");

userProfile.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../../Backend/Get_Designation.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;

                if(data == "employee"){
                    userProfile.innerHTML = '<i class="fa fa-user"></i>';
                    location.href = "Page_Employee_Profile.php";
                }else if(data == "customer"){
                    userProfile.innerHTML = '<i class="fa fa-user"></i>';
                    location.href = "Page_Customer_Profile.php";
                }else if(data == "admin"){
                    userProfile.innerHTML = '<i class="fa fa-user"></i>';
                    location.href = "Page_Dashboard.php";
                }else{
                    userProfile.innerHTML = '<i class="fa fa-lock"></i>';
                    location.href = "Page_Login.php";
                }
            }
        }
    }
    xhr.send();
}


for(let i=0; i<8; i++){
    const prvBtn = this.document.querySelectorAll(".market .zone .fa-chevron-circle-left")[i],
    nxtBtn = this.document.querySelectorAll(".market .zone .fa-chevron-circle-right")[i];

    const DivBlock = this.document.querySelectorAll(".zone .zone-col .div-block")[i],
    BlockContent = this.document.querySelectorAll(".zone .zone-col .div-block .product");
    const size = BlockContent[0].clientWidth + 40;

    let cnt = 0;

    nxtBtn.onclick = ()=>{
        cnt++;
        if(cnt==(6-4)){
            nxtBtn.style.display = "none";
        }

        if(cnt>0){
            prvBtn.style.display = "block";
        }else{
            prvBtn.style.display = "none";
        }

        if(cnt>(6-4)){
            cnt--;
            return;
        }else{
            DivBlock.style.transition = "transform 0.4s ease-in-out";
            DivBlock.style.transform = 'translateX('+ (-size*cnt) +'px)';
        }
    }

    prvBtn.onclick = ()=>{
        cnt--;
        if(cnt<(6-4)){
            nxtBtn.style.display = "block";
        }

        if(cnt>0){
            prvBtn.style.display = "block";
        }else{
            prvBtn.style.display = "none";
        }

        if(cnt<0){
            cnt++;
            return;
        }else{
            DivBlock.style.transition = "transform 0.4s ease-in-out";
            DivBlock.style.transform = 'translateX('+ (-size*cnt) +'px)';
        }
        DivBlock.style.transition = "transform 0.4s ease-in-out";
        DivBlock.style.transform = 'translateX('+ (-size*cnt) +'px)';
    }
}