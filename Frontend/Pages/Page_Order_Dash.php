<style>

.number{
    display: flex;
    align-items: center;
    justify-content: center;
}
.number h1{
    margin: 0;
    padding: 10px;
    text-align: center;
    width: 100%;
    height: 6vh;
    font-size: 25px;
    background: #ccc;
    border-radius: 5px;
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

<div class="number">
    <h1>Customer Order History</h1>
</div>

<div class="product-part">
        <div class="show-order">
            <div class="order-col order-head">
                <div class="name-col">Order ID</div>
                <div class="subcategory-col">Customer</div>
                <div class="unit-price-col">Order List</div>
                <div class="quantity-col">Status</div>
                <div class="total-price-col">Price</div>
            </div>
            <hr>
            <?php
                include "../../Database/DB_Connector.php";

                $connection = DB_Connection_Start();
                
                $SELECT = "SELECT * FROM Orders";
                if($result = mysqli_query($connection, $SELECT)){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                            
            ?>
            <div class="order-col">
                <div class="name-col"><?php echo $row['order_id']; ?></div>
                <div class="subcategory-col"><?php echo $row['customer_id']; ?></div>
                <div class="unit-price-col"><?php echo $row['order_products_list'];; ?> </div>
                <div class="quantity-col"><?php echo $row['order_status']; ?> </div>
                <div class="total-price-col"><?php echo $row['order_price']; ?> &#2547;</div>
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