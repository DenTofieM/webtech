<style>
     .main1-part{
         font-size: 20px;

     }
     .main1-part .head-bar{
         height: 7vh;
         width: 100%;
         background-color: blueviolet;
         display: flex;
         align-items: center;
         justify-content: center;
     }
     .main1-part .head-bar div button{
         height: 5vh;
         margin: 0 10px;
         cursor: pointer;
     }

     .main1-part .add-employee-form{
         width: 0;
         background-color: rgba(0, 0, 0, 0.5);
         transition: 1s;
         display: none;
     }

     .main1-part .active-add-employee-form{
         width: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .add-employee-form .form-part{
         display: block;
     }

     .add-employee-form .form-part h3{
         text-align: center;
     }

     .add-employee-form .form-part form{
         margin: 20px 0;
     }

     .add-employee-form .form-part form div{
         height: 7vh;
     }

     .add-employee-form .form-part form div input{
         width: 100%;
         height: 5vh;
         font-size: 16px;
     }

     .add-employee-form .form-part form div select{
        width: 102%;
        height: 5vh;
        font-size: 16px;
     }

     .add-employee-form .form-part form textarea{
         width: 100%;
         font-size: 16px;
     }

     .add-employee-form .form-part form .btn{
         display: flex;
         align-items: center;
         justify-content: center;
         height: 7vh;
     }

     .add-employee-form .form-part form .btn button{
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


<section class="main1-part">
    <div class="head-bar">
        <div class="employee-btn">
            <button class="add-employee">Add New Employee</button>
            <button>Edit Employee's Information</button>
            <button>Delete Employees</button>
        </div>
    </div>

    <div class="add-employee-form">
        <section class="form-part">
            <h3>Add New Employee</h3>
            <form action="#" enctype="multipart/form-data">
                <div>
                    <input type="text" name="e_id" placeholder="Employe's User ID " required>
                </div>

                <div>
                    <input type="password" name="e_password" placeholder="User Password " required>
                </div>

                <div>
                    <input type="text" name="e_name" placeholder="Enter employee's name " required>
                </div>

                <div>
                    <input type="text" name="e_degsignation" placeholder="Enter employee's degsignation " required>
                </div>

                <div>
                    <input type="email" name="e_email" placeholder="Enter employee's Email " required>
                </div>

                <div>
                    <input type="text" name="e_phone" placeholder="Enter employee's Contact number  " required>
                </div>

                <div>
                    <input type="text" name="e_payment" placeholder="Enter monthly payment" required>
                </div>

                <div>
                    <input type="date" name="e_date_of_birth" required>
                </div>

                <div>
                    <select name="e_blood_group" id="">
                        <option selected hidden>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>

                <div>
                    <input type="text" name="e_nid_or_bc" placeholder="Enter employee's NID or Birth Certificate Number" required>
                </div>

                <div>
                    <input type="text" name="e_father_name" placeholder="Enter employee's  father's name " required>
                </div>

                <div>
                    <input type="text" name="e_mother_name" placeholder="Enter employee's father's name " required>
                </div>

                <div>
                    <input type="file" name="e_image">
                </div>

                
                <textarea rows="5" placeholder="Employees Present Address" name="e_present_address"></textarea>

                <textarea rows="5" placeholder="Employees Permanent Addressn" name="e_permanent_address"></textarea>
                

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
                <div class="subcategory-col">Email</div>
                <div class="unit-price-col">Phone</div>
                <div class="quantity-col">User ID</div>
                <div class="total-price-col">Payment</div>
            </div>
            <hr>
            <?php
                include "../../Database/DB_Connector.php";

                $connection = DB_Connection_Start();
                
                $SELECT = "SELECT * FROM Employees";
                if($result = mysqli_query($connection, $SELECT)){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                            
            ?>
            <div class="order-col">
                <div class="name-col"><?php echo $row['e_name']; ?></div>
                <div class="subcategory-col"><?php echo $row['e_email']; ?></div>
                <div class="unit-price-col"><?php echo $row['e_phone']; ?> </div>
                <div class="quantity-col"><?php echo $row['e_id']; ?> </div>
                <div class="total-price-col"><?php echo $row['e_payment']; ?> &#2547;</div>
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