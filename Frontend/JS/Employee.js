const employeeBtn = document.querySelector(".sidenav .employee-btn"),
        ContentE = document.querySelector(".body-part .main-content");

employeeBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();  // Creating XML object
    xhr.open("GET", "Page_Employees.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                Content.innerHTML = data;

                let addEmployee = document.querySelector(".head-bar .employee-btn .add-employee"),
                Form = document.querySelector(".add-employee-form");
                addEmployee.onclick = ()=>{
                    Form.classList.toggle("active-add-employee-form");
                }
                
                
                //console.log(selectBox);
                var Formpart = document.querySelector(".add-employee-form .form-part form");
                var formSubmit = Formpart.querySelector(".btn input");
               
                Formpart.onsubmit = (e)=>{
                    e.preventDefault();
                }

                formSubmit.onclick = ()=>{
                    phr = new XMLHttpRequest();
                    phr.open("POST","../../Backend/Add_employee.php", true);
                    phr.onload = ()=>{
                        if(phr.readyState === XMLHttpRequest.DONE){
                            if(phr.status == 200){
                                let data = phr.response;
                                console.log(data);
                            }
                        }
                    }
                    let formData = new FormData(Formpart);
                    phr.send(formData);
                }

                
            }
        }
    }
    xhr.send();
}