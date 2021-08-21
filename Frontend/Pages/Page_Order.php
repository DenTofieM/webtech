<?php
    session_start();
    if(empty($_SESSION['active_user'])){
        header("location: Page_Login.php");
    }
    $uglylist = $_REQUEST['product_list'];

    $list = json_decode($uglylist);
    $_SESSION['add_cart'] = sizeof($list);
    //print_r(sizeof($val));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Asset/logo.jpg"/>
    <title>Super Shop</title>
    <link rel="stylesheet" href="../CSS/Style_Layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .product-part{
            display: block;
            width: 75%;
            margin: auto;
        }
        .product-part .show-order{
            width: 100%;
            background: transparent;
            display: block;
        }
        .product-part .show-order .order-col{
            height: 10vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .order-col div{
            text-align: center;
            flex-basis: 24%;
        }

        .order-head{
            font-size: 25px;
            font-weight: 500;
        }

        .name-col{
            margin-left: 5%;
        }

        .total-price-col{
            margin-right: 5%;
        }

        .product-part .order-part{
            height: 12vh;
            width: 100%;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .product-part .order-part div{
            margin: 5px 40px;
        }

        .product-part .order-part div button{
            padding: 10px 15px;
            border-radius: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            font-weight: 500;
            border: 0;
            outline: 0;
            background-color: rgb(44, 43, 43);
            color: #ccc;
            cursor: pointer;
            transition: 0.5s;
        }

        .product-part .order-part div button:hover{
            background: rgb(30, 121, 30);
        }

        .product-part .order-part div p{
            font-size: 20px;
            background: #ccc;
            padding: 10px 15px;
            border-radius: 10px;
        }

        .show-order .order-col .quantity-col .input_quantity{
            width: 50px;
        }
    </style>
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
            <div class="show-order">
                <div class="order-col order-head">
                    <div class="name-col">Name</div>
                    <div class="unit-price-col">Unit Price</div>
                    <div class="quantity-col">Quantity</div>
                    <div class="total-price-col">Total Price</div>
                </div>
                <hr>
                <?php
                    include "../../Database/DB_Connector.php";
                    $total = 0;

                    for($i = 0; $i<sizeof($list); $i++){
                        /*$connection = DB_Connection_Start();
                        $SELECT = "SELECT * FROM Products WHERE p_id = '{$list[$i]->id}'";

                        if($result = mysqli_query($connection, $SELECT)){
                            if(mysqli_num_rows($result)>0){
                                $row = mysqli_fetch_array($result);*/
                ?>
                <div class="order-col">
                    <div class="name-col"><?php echo $list[$i]->name;?></div>
                    <div class="unit-price-col"><span><?php echo $list[$i]->price;?></span> &#2547;</div>
                    <div class="quantity-col"> <input class="input_quantity" id="input_quantity<?php echo $list[$i]->id;?>" type="number" value="<?php echo $list[$i]->quantity;?>"></div>
                    <?php $total += floatval($list[$i]->price)*floatval($list[$i]->quantity);?>
                    <div class="total-price-col"><span><?php echo floatval($list[$i]->price)*floatval($list[$i]->quantity);?></span> &#2547;</div>
                    <span>x</span>
                </div>
                <hr>
                <?php
                         /*       mysqli_free_result($result);
                                DB_Connection_Close($connection);
                            }
                        }*/
                    }
                ?>
                
            </div>
            <div class="order-part">
                <div class="div-item"><p>Total Item : <?php echo sizeof($list);?></p></div>
                <div class="div-total"><p>Total Price : <span><?php echo $total;?></span> &#2547;</p></div>
                <div class="div-confirm"><button type="submit" class="confirm-btn">Confirm Order</button></div>
            </div>

            <center><div class="msg"></div></center>
        </section>
    </section>

    <footer>
        <hr>
        <div class="footer-row">
            <div class="footer-col">
                <ul>
                    <li>Return Policy</li>
                    <li>Search Our Store</li>
                    <li>Blog</li>
                    <li>Contact Us</li>
                    <li>About Us</li>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <li><i class="fa fa-facebook"></i>  Facebook</li>
                    <li><i class="fa fa-twitter"></i>  Twitter</li>
                    <li><i class="fa fa-instagram"></i>  Instagram</li>
                    <li><i class="fa fa-youtube"></i>  Youtube</li>
                    <li><i class="fa fa-google-plus"></i>  Google++</li>
                </ul>
            </div>
            <div class="footer-col">
                <address>
                    <h2>Main Office</h2>
                    <p>200/76, Mujahid Nagar<br>Rayerbug, Dhaka - 1362<br>Contact No: 01940909841 <br> 
                    Email: supershop@gmail.com
                    </p>
                </address>
            </div>
        </div>
    </footer>
    <section class="made">
        <p>Copyright by &#169; <a href="http://atiyakhan.epizy.com">Umma Atiya Maysha</a> & <a href="#">Atiqur Rahman Rasel</a></p>
    </section>

    <script>
        
        var Total = '<?php echo $total;?>';

        for(let i = 0; i<'<?php echo sizeof($list);?>'; i++){
            let inputQuantity = this.document.querySelectorAll(".show-order .order-col .quantity-col .input_quantity")[i];
            let totalPrice = this.document.querySelectorAll(".show-order .order-col .total-price-col span")[i];
            let UnitPrice = this.document.querySelectorAll(".show-order .order-col .unit-price-col span")[i];
            let FinalTotal = document.querySelector(".order-part .div-total p span");

            inputQuantity.onchange = (e)=>{
                let prevPrice = parseInt(totalPrice.innerHTML);
                let newPrice = parseInt(UnitPrice.innerHTML)*e.target.value;
                //let prevTotal = parseInt(totalPrice.innerHTML);
                Total = (Total - prevPrice) + newPrice;
                totalPrice.innerHTML = newPrice;
                FinalTotal.innerHTML = Total;
                //console.log(quantityval*e.target.value);
            }
        }

        let ConfirmBtn =  document.querySelector(".order-part .div-confirm .confirm-btn");
        ConfirmBtn.onclick = ()=>{
            let CustomerID = '<?php echo $_SESSION['active_user'];?>';
            let ProductList = '<?php $PL = ""; for($i=0; $i<sizeof($list); $i++){ $PL.=$list[$i]->name."#";} echo $PL;?>';
            let OrderObj = {
                "customer_id" : CustomerID,
                "product_list" : ProductList,
                "total_price" : Total,
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
                            document.querySelector(".product-part .msg").innerHTML = data;
                        }
                        //console.log(data);
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("Order=" + order);

            //console.log(OrderObj);
            
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