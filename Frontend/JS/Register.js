var Form = document.querySelector(".registration-section .form-part form");
var formSubmit = Form.querySelector(".submit-btn");
var photo = document.getElementById("user_image");
var showImage = document.querySelector(".registration-section .form-part .photo img");

Form.onsubmit = (e)=>{
    e.preventDefault();
}

photo.onchange = ()=>{
    console.log(photo.files[0]);
    //showImage.src = photo.value;
}

formSubmit.onclick = ()=>{
    phr = new XMLHttpRequest();
    phr.open("POST","../../Backend/Customer_Registration.php", true);
    phr.onload = ()=>{
        if(phr.readyState === XMLHttpRequest.DONE){
            if(phr.status == 200){
                let data = phr.response;
                //console.log(data);
            }
        }
    }
    let formData = new FormData(Form);
    phr.send(formData);
}


// Register Page to Home page
const goToHomeR = document.querySelector(".registration-section .form-part .system-register");
goToHomeR.onclick = ()=>{
    location.href = "Page_Home.php";
}