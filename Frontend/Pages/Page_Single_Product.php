<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Asset/logo.jpg"/>
    <title>Super Shop</title>
    <link rel="stylesheet" href="../CSS/Style_Layout.css">
    <link rel="stylesheet" href="../CSS/Style_Single_Product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <header>
        <div class="super_shop_logo">
            <img src="../Asset/super_shop_logo2.png">
        </div>

        <div class="icons-bar">
            <div>
                <i class="fa fa-heart"></i>
            </div>

            
            <div class="fa-add-cart">
                <i class="fa fa-shopping-cart"></i>
                <span id="cart-counter"><?php if(isset($_SESSION['add_cart'])) echo $_SESSION['add_cart'];?></span>
            </div>
            

            <div class="profile-btn">
                <span title="<?php if(isset($_SESSION['active_user'])) echo "Profile"; else echo "Login";?>">
                <i class="fa <?php if(isset($_SESSION['active_user'])) echo "fa-user"; else echo "fa-lock";?>"></i>
                </span>
            </div>
        </div>
    </header>

    <section class="show-product">
        <section class="product-part">
            <section class="show-item">
                <?php
                    $product_id = $_REQUEST['product_id'];
                    
                    include_once "../../Database/DB_Connector.php";
                    $connection = DB_Connection_Start();
                    
                    $SELECT = "SELECT * FROM Products WHERE p_id = '{$product_id}'";
                    if($result = mysqli_query($connection, $SELECT)){
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_array($result);

                            $product = new stdClass();
                            $product->id = $row['p_id'];
                            $product->name = $row['p_name'];
                            $product->price = $row['p_unit_selling_price'];
                            $product->quantity = 1;
                ?>
                <div class="item-col">
                    <img src="../../Backend/storage/<?php echo $row['p_image'];?>">
                </div>
                <div class="item-col">
                    <h1><?php echo $row['p_name'];?></h1>
                    
                    <div class="description">
                        <div>Category : <?php echo $row['p_subcategory'];?> </div>
                        <div>Available Quantity : <?php echo $row['p_available_amount'];?> <?php echo $row['p_unit'];?></div>
                        <div class="unit-price"><b>Unit Price: <span><?php echo $row['p_unit_selling_price'];?></span> &#2547; </b></div>
                        <div class="quantity-btn"> <i class="fa fa-minus-circle"></i>  <span> 1 </span>  <i class="fa fa-plus-circle"></i>  <button id="add-to-cart-btn"> Buy </button> </div>
                        <div class="total-price"><b>Total Price: <span><?php echo $row['p_unit_selling_price'];?></span> &#2547; </b></div>
                        <div>Description : <?php echo $row['p_description'];?></div>

                    </div>
                    
                </div>
                <?php
                                // Ending point of category
                            mysqli_free_result($result);
                            DB_Connection_Close($connection);
                        }
                    }
                ?>
            </section>
        </section>
    </section>

    
    <section class="made">
        <p>Copyright by &#169; <a href="http://atiyakhan.epizy.com">Umma Atiya Maysha</a> & <a href="#">Atiqur Rahman Rasel</a></p>
    </section>
    
    
    <script>

        const Session = '<?php if(isset($_SESSION['active_user'])) echo $_SESSION['active_user']; else echo "no_user"; ?>';

        let plusBtn = document.querySelector(".fa-plus-circle"),
        minusBtn = document.querySelector(".fa-minus-circle"),
        valueBtn = document.querySelector(".show-item .item-col .description .quantity-btn span");
        let unitPrice = document.querySelector(".show-item .item-col .description .unit-price span");
        let totalPrice = document.querySelector(".show-item .item-col .description .total-price span");

        var cnt = 1;

        plusBtn.onclick = ()=>{
            cnt++;
            valueBtn.innerHTML = cnt;
            totalPrice.innerHTML = cnt*parseInt(unitPrice.innerHTML);
        }

        minusBtn.onclick = ()=>{
            if(cnt>1) cnt--;
            valueBtn.innerHTML = cnt;
            totalPrice.innerHTML = cnt*parseInt(unitPrice.innerHTML);
        }

        let addCart = document.getElementById("add-to-cart-btn");
        addCart.onclick = ()=>{
            console.log("buy now");

            if(Session == "no_user"){
                location.href = "Page_Login.php";
            }else{
                let CustomerID = '<?php echo $_SESSION['active_user'];?>';
                let ProductList = '<?php echo $product->name;?>';
                let OrderObj = {
                    "customer_id" : CustomerID,
                    "product_list" : ProductList,
                    "total_price" : cnt*parseInt(unitPrice.innerHTML),
                    "status" : "online"
                };

                let order = JSON.stringify(OrderObj);
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../../Backend/Insert_Order.php", true);
                xhr.onload = ()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            if(data == "Order added successfully"){
                                //document.querySelector(".product-part .msg").innerHTML = data;
                                alert(data);
                            }
                            //console.log(data);
                        }
                    }
                }
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("Order=" + order);
            }
        }


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
    </script>
</body>
</html>