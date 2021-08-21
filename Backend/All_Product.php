<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();
$category = $_REQUEST['cat'] ;

if($category == "All Products") $SELECT = "SELECT * FROM Products";
else $SELECT = "SELECT * FROM Products WHERE p_category = '{$category}'";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            echo '
            <div class="div1">
                <div class="row-content">
                    <div class="front-part">
                        <img src="../../Backend/storage/'.$row['p_image'].'">
                    </div>
                    <div class="back-part">
                        <div>
                            <h3>'.$row['p_name'].'</h3>
                            <h5>Price '.$row['p_unit_selling_price'].' &#2547;</h5>
                            <div class="add-curt">
                                 <i id="" class="fa fa-cart-plus"></i>
                                 <i class="fa fa-heart"></i>
                            </div>
                            <a href="Page_Single_Product.php?product_id='.$row['p_id'].'"><button>View</button></a>
                        </div>
                    </div>
                    <div class="product-name"><h4>Product Name</h4></div>
                </div>
            </div>
            ';
        }
        mysqli_free_result($result);
        DB_Connection_Close($connection);
    }
}

?>