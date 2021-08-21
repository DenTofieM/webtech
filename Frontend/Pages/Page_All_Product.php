<?php

include "../../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$catList = array();

$SELECT = "SELECT * FROM Category";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            $catList[$row['cat_id']] = $row['cat_name'];
        }
        mysqli_free_result($result);
        DB_Connection_Close($connection);
    }
}
//print_r($catList);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Super Shop</title>
    <link rel="stylesheet" href="../CSS/Style_All_Product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <section class="product-name-show">
        <img src="../Asset/cover3.jpg">
        <h1>All Product</h1>
    </section>
    
    <section class="main-product-part">
        <div class="side-part">
            <div class="search-div">
                <input type="text" placeholder="Search product...">
            </div>

            <hr>
            <div class="items-col" id="option0">
                <p>All Products</p>
            </div>

            <hr>
            <div class="items-col" id="option9">
                <p>Top Sell</p>
            </div>

            <hr>
            <div class="items-col" id="option10">
                <p>Discount</p>
            </div>

            <?php
                for($i=1; $i<=sizeof($catList); $i++){
            ?>
                <hr>
                <div class="items-col" id="option<?php echo $i;?>">
                    <p><?php echo $catList[$i];?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="show-product-part">
            
            <div class="div1">
                <div class="row-content">
                    <div class="front-part">
                        <img src="../Asset/ice2.jpg">
                    </div>
                    <div class="back-part">
                        <div>
                            <h3>Product Name</h3>
                            <h5>Price 120</h5>
                            <div class="add-curt">
                                 <i id="" class="fa fa-cart-plus"></i>
                                 <i class="fa fa-heart"></i>
                            </div>
                            <button>View</button>
                        </div>
                    </div>
                    <div class="product-name"><h4>Product Name</h4></div>
                </div>
            </div>  
            
        </div>
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
        let TitleShow = document.querySelector(".product-name-show h1");
        let showProduct = document.querySelector(".show-product-part");
        let contentX = '<?php echo $_REQUEST['category'];?>';

        TitleShow.innerHTML = contentX;
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../../Backend/All_Product.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    showProduct.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("cat="+contentX);
    </script>
    <script src="../JS/All_Product.js"></script>
</body>
</html>