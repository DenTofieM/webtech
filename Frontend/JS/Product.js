const productBtn = document.querySelector(".sidenav .product-btn"),
        Content = document.querySelector(".body-part .main-content");

productBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();  // Creating XML object
    xhr.open("GET", "Page_Products.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                Content.innerHTML = data;

                let addProduct = document.querySelector(".head-bar .product-btn .add-product"),
                Form = document.querySelector(".add-product-form");
                addProduct.onclick = ()=>{
                    Form.classList.toggle("active-add-product-form");
                }

                var selectBox = document.getElementById("selectBox");
                var subCatBox = document.getElementById("subcatbox");
                selectBox.onchange = ()=>{
                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                    
                    let subrh = new XMLHttpRequest();
                    subrh.open("POST", "../../Backend/Get_SubCataegory.php", true);
                    subrh.onload = ()=>{
                        if(subrh.readyState === XMLHttpRequest.DONE){
                            if(subrh.status === 200){
                                let subcategory = subrh.response;
                                subCatBox.innerHTML = subcategory;
                            }
                        }
                    }
                    subrh.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    subrh.send("Category_value=" + selectedValue);
                }
                
                //console.log(selectBox);
                var Formpart = document.querySelector(".add-product-form .form-part form");
                var formSubmit = Formpart.querySelector(".btn input");
               
                Formpart.onsubmit = (e)=>{
                    e.preventDefault();
                }

                formSubmit.onclick = ()=>{
                    phr = new XMLHttpRequest();
                    phr.open("POST","../../Backend/Add_Product.php", true);
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

                //Content.innerHTML = '<img src="../Asset/p1.jpg">';
            }
        }
    }
    xhr.send();

}
