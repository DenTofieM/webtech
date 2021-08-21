 <style>
     .main-part{
         font-size: 20px;

     }
     .main-part .head-bar{
         height: 7vh;
         width: 100%;
         background-color: blueviolet;
         display: flex;
         align-items: center;
         justify-content: center;
     }
     .main-part .head-bar div button{
         height: 5vh;
         margin: 0 10px;
         cursor: pointer;
     }

     .main-part .add-product-form{
         width: 0;
         background-color: rgba(0, 0, 0, 0.5);
         transition: 1s;
         display: none;
     }

     .main-part .active-add-product-form{
         width: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .add-product-form .form-part{
         display: block;
     }

     .add-product-form .form-part h3{
         text-align: center;
     }

     .add-product-form .form-part form{
         margin: 20px 0;
     }

     .add-product-form .form-part form div{
         height: 7vh;
     }

     .add-product-form .form-part form div input{
         width: 100%;
         height: 5vh;
         font-size: 16px;
     }

     .add-product-form .form-part form div select{
        width: 103%;
        height: 5vh;
        font-size: 16px;
     }

     .add-product-form .form-part form textarea{
         width: 100%;
         font-size: 16px;
     }

     .add-product-form .form-part form .btn{
         display: flex;
         align-items: center;
         justify-content: center;
         height: 7vh;
     }

     .add-product-form .form-part form .btn button{
         cursor: pointer;
         font-size: 18px;
         background-color: green;
         color: #ccc;
         padding: 4px 6px;
         border-radius: 5px;
         border: 0;
         outline: 0;
     }

     .product-part{
            display: block;
            width: 96%;
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


<section class="main-part">
    <div class="head-bar">
        <div class="product-btn">
            <button class="add-product">Add Product</button>
            <button>Update Product</button>
            <button>Delete Product</button>
        </div>
    </div>

    <div class="add-product-form">
        <section class="form-part">
            <h3>Add Product</h3>
            <form action="#" enctype="multipart/form-data">
                <div>
                    <select id="selectBox" name="category">
                        <option selected hidden>Select Category</option>
                    <?php
                    
                        include "../../Database/DB_Connector.php";
                        $connection = DB_Connection_Start();
                        $SELECT = "SELECT * FROM Category";

                        if($result = mysqli_query($connection, $SELECT)){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){

                    ?>
                        <option value="<?php echo $row['cat_name']; ?>">
                        <?php echo $row['cat_name']; ?>
                        </option>
                    <?php
                                }
                                mysqli_free_result($result);
                                DB_Connection_Close($connection);
                            }
                        }
                    ?>
                    </select> 
                </div>

                <div>
                    <select id="subcatbox" name="sub_category">
                        <option selected hidden>Select Sub-category</option>
                    </select>
                </div>

                <div>
                    <input type="text" placeholder="Enter Product Name" name="p_name">
                </div>

                <div>
                    <input type="text" placeholder="Product Buying Price" name="p_buying_price">
                </div>

                <div>
                    <input type="text" placeholder="Product Selling Price" name="p_selling_price">
                </div>

                <div>
                    <input type="text" placeholder="Product Available Quantity" name="p_quantity">
                </div>

                <div>
                    <select name="p_unit" id="">
                        <option selected hidden>Select Unit</option>
                        <option value="kg">kg</option>
                        <option value="liter">liter</option>
                        <option value="piece">piece</option>
                        <option value="packet">packet</option>
                    </select>
                </div>

                <div>
                    <input type="text" placeholder="Product Brand Name" name="p_brand">
                </div>

                <div>
                    <input type="file" name="p_image">
                </div>

                
                <textarea rows="5" placeholder="Product Description" name="p_description"></textarea>
                

                <div class="btn">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </section>
    </div>

    <div class="product-part">
        <div class="show-order">
            <div class="order-col order-head">
                <div class="name-col">Name</div>
                <div class="subcategory-col">Category</div>
                <div class="unit-price-col">Unit Price</div>
                <div class="quantity-col">Quantity</div>
                <div class="total-price-col">Profite</div>
            </div>
            <hr>
            <?php
                //include "../../Database/DB_Connector.php";

                $connection = DB_Connection_Start();
                
                $SELECT = "SELECT * FROM Products";
                if($result = mysqli_query($connection, $SELECT)){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
            ?>
            <div class="order-col">
                <div class="name-col"><?php echo $row['p_name']; ?></div>
                <div class="subcategory-col"><?php echo $row['p_subcategory']; ?></div>
                <div class="unit-price-col"><?php echo $row['p_unit_selling_price']; ?> &#2547;</div>
                <div class="quantity-col"><?php echo $row['p_available_amount']; ?> <?php echo $row['p_unit']; ?></div>
                <div class="total-price-col"><?php echo $row['p_unit_selling_price']-$row['p_unit_buying_price']; ?> &#2547;</div>
            </div>
            <hr>
            <?php
                        }
                        mysqli_free_result($result);
                        DB_Connection_Close($connection);
                    }
                }
            ?>
        </div>
    </div>
</section>