
const Form = document.querySelector(".login-section .form-part form"),
Btn = Form.querySelector(".login-btn"),
errorText = document.querySelector(".login-section .form-part .message-box");

Form.onsubmit = (e)=>{
    e.preventDefault();  // preventing form from submitting
}

Btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "../../Backend/Login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                //console.log(data);

                if(data == "admin"){
                    location.href = "Page_Dashboard.php";
                }else if(data == "customer"){
                    location.href = "Page_Customer_Profile.php";
                }else if(data == "employee"){
                    location.href = "Page_Employee_Profile.php";
                }else{
                    //alert(data);
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(Form);
    xhr.send(formData);
}

const goToHomeL = document.querySelector(".login-section .form-part .system-login");

goToHomeL.onclick = ()=>{
    location.href = "Page_Home.php";
}

