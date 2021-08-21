<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Asset/logo.jpg"/>
    <title>Super Shop</title>
    <link rel="stylesheet" href="../CSS/Style_Layout.css">
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

    <section class="ad-part">
        <div id="mySidenav" class="sidenav">
            <p class="logo">All Category</p>
            <section class="category-list">
            </section>
        </div>

        <div class="show-part">
            <h1>Super Shop</h1>
            <h5>Online Market</h5>
        </div>
    </section>


    <section class="show-product">
        <h1 class="headline">Top Product</h1>
        <section class="product-part">
            <div class="row">
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/test.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Groceries</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/fishmeat.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Fish & Meat</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/food.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Vegetable & Fruit</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/chochlate.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Chocolate & Icecream</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-col row-center goToAllProductPage">
                    <h2><a href="Page_All_Product.php?category=All Products">See All Products</a></h2>
                </div>
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/snacks.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Chips & Snacks</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/can_food.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Frozen & Can food</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/baby.png">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Baby Zone</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="row-content">
                        <div class="front-part">
                            <img src="../Asset/woman.jpg">
                        </div>
                        <div class="back-part">
                            <div>
                                <h3>Woman's Section</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <section class="market">
        <?php
            include_once "../../Database/DB_Connector.php";
            $connection = DB_Connection_Start();

            $SELECT = "SELECT * FROM Category";
            if($result = mysqli_query($connection, $SELECT)){
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)){
                        // Starting Point of category       
        ?>
        <section id="Category<?php echo $row['cat_id'];?>" class="zone">
            <h1 class="headline"><a href="Page_All_Product.php?category=<?php echo $row['cat_name'];?>"><?php echo $row['cat_name']; ?></a></h1>
            <i class="fa fa-chevron-circle-left"></i>
            <div class="zone-col">
                <div class="div-block">
                    <?php
                        $category_name = $row['cat_name'];
                        $SELECT1 = "SELECT * FROM Products WHERE p_category = '{$category_name}'";

                        if($result1 = mysqli_query($connection, $SELECT1)){
                            if(mysqli_num_rows($result1)>0){
                                while($row1 = mysqli_fetch_array($result1)){
                    ?>
                    <div class="product">
                        <img src="../../Backend/storage/<?php echo $row1['p_image'];?>">
                        <div class="layer">
                            <h2>Price : <?php echo $row1['p_unit_selling_price'];?> &#2547;</h2>
                            <div class="add-curt">
                                 <i id="<?php echo $row1['p_id'];?>" class="fa fa-cart-plus"></i>
                                 <i class="fa fa-heart"></i>
                            </div>
                            <a href="Page_Single_Product.php?product_id=<?php echo $row1['p_id'];?>"><button class="hero-btn red-btn">See More</button></a>
                        </div>
                        <h3><?php echo $row1['p_name']; ?></h3>
                    </div>

                    <?php
                                }
                                mysqli_free_result($result1);
                            }
                        }
                    ?>

                </div>
            </div>
            <i class="fa fa-chevron-circle-right"></i>
        </section>
        
        <?php
                // Ending point of category
                    }
                    mysqli_free_result($result);
                    DB_Connection_Close($connection);
                }
            }
        ?>

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
    <?php
        $totalProduct = 0;
        $connection = DB_Connection_Start();
        $SELECT = "SELECT * FROM Products";
        
        if($result = mysqli_query($connection, $SELECT)){
            if(mysqli_num_rows($result)>0){
        
                $totalProduct = mysqli_num_rows($result);
                mysqli_free_result($result);
                DB_Connection_Close($connection);
            }
        }
    ?>

    
    
    <script>
        const Session = '<?php if(isset($_SESSION['active_user'])) echo $_SESSION['active_user']; else echo "no_user"; ?>';
        const total = '<?php echo $totalProduct; ?>'; 
        const cart = [];
        var len = Math.max(0, '<?php if(isset($_SESSION['add_cart'])) $_SESSION['add_cart']; else 0;?>');
        for(let i = 0; i <= total; i++){
            let AddcartBtn = this.document.querySelectorAll(".zone .zone-col .div-block .product .layer .add-curt .fa-cart-plus")[i];
            let cartCnt = document.getElementById("cart-counter");
            let cartBtn = document.querySelector("header .fa-add-cart");
            
            AddcartBtn.onclick = ()=>{
                if(Session == "no_user"){
                    location.href = "Page_Login.php";
                }else{
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST","../../Backend/Get_Product.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState == XMLHttpRequest.DONE){
                            if(xhr.status == 200){
                                let data = JSON.parse(xhr.response);
                                cart[cart.length] = data;
                                len = cart.length;
                                cartCnt.innerHTML = len;
                            }
                        }
                    }
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("id="+AddcartBtn.id);
                }
            } 

            cartBtn.onclick = ()=>{
                if(len>=0){
                    let x = JSON.stringify(cart);
                    location.href = "Page_Order.php?product_list=" + x;
                }
            } 
        }
        
    </script>
    <script src="../JS/Home.js" type="text/javascript"></script>
    <script src="../JS/Get_Category.js" type="text/javascript"></script>
    
</body>
</html>