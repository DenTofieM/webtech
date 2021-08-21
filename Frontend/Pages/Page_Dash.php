<?php
include "../../Database/DB_Connector.php";

$connection = DB_Connection_Start();
$Total_Category = 0;

$SELECT = "SELECT * FROM Category";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        
        $Total_Category = mysqli_num_rows($result);
            
        mysqli_free_result($result);
        //DB_Connection_Close($connection);
    }
}

$NumberOfProduct = 0;
$Total_Investment = 0;
$Total_Possible_Outcome = 0;

$SELECT = "SELECT * FROM Products";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        $NumberOfProduct = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)){
            $Total_Investment += $row['p_unit_buying_price'];
            $Total_Possible_Outcome += $row['p_unit_selling_price'];
        }
            
        mysqli_free_result($result);
        //DB_Connection_Close($connection);
    }
}

$Total_Possible_Profite = $Total_Possible_Outcome - $Total_Investment;

$NumberOfOrders = 0;
$Total_Income = 0;
$SELECT = "SELECT * FROM Orders";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        $NumberOfOrders = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)){
            $Total_Income += $row['order_price'];
        }
            
        mysqli_free_result($result);
        //DB_Connection_Close($connection);
    }
}

$Total_Member = 0;

$SELECT = "SELECT * FROM Customers";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        
        $Total_Member = mysqli_num_rows($result);
            
        mysqli_free_result($result);
        //DB_Connection_Close($connection);
    }
}

$Total_Employee = 0;
$Total_Emp_Payment = 0;

$SELECT = "SELECT * FROM Employees";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        $Total_Employee = mysqli_num_rows($result);

        while($row = mysqli_fetch_array($result)){
            $Total_Emp_Payment += $row['e_payment'];
        }
            
        mysqli_free_result($result);
        //DB_Connection_Close($connection);
    }
}

?>

<style>
    .div-main{
        width: 96%;
        height: 200px;
        margin: auto;
        display: grid;
        grid-template-columns: auto auto auto;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
    }

    .div-main .div-content{
        height: 150px;
        margin: 15px;
        width: 300px;
        border: 2px solid gray;
        border-radius: 5px;
        position: relative;
        background: #ccc;
        box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.5);
    }

    .div-main .div-content h1{
        position: absolute;
        font-size: 18px;
        top: 7%;
        left: 50%;
        transform: translate(-50%);
    }

    .div-main .div-content p{
        position: absolute;
        font-size: 35px;
        font-weight: 600;
        top: 25%;
        left: 50%;
        transform: translate(-50%);
    }

</style>

<section class="div-main">
    <div class="div-content">
        <h1>Total Category</h1>
        <p><?php echo $Total_Category;?></p>
    </div>
    <div class="div-content">
        <h1>Total Items</h1>
        <p><?php echo $NumberOfProduct;?></p>
    </div>
    <div class="div-content">
        <h1>Total Investemnt</h1>
        <p><?php echo $Total_Investment;?> &#2547;</p>
    </div>
    <div class="div-content">
        <h1>Possible Outcome</h1>
        <p><?php echo $Total_Possible_Outcome;?> &#2547;</p>
    </div>
    <div class="div-content">
        <h1>Possible Profite</h1>
        <p><?php echo $Total_Possible_Profite;?> &#2547;</p>
    </div>

    <div class="div-content">
        <h1>Total Order</h1>
        <p><?php echo $NumberOfOrders;?></p>
    </div>

    <div class="div-content">
        <h1>Total Income</h1>
        <p><?php echo $Total_Income;?> &#2547;</p>
    </div>

    <div class="div-content">
        <h1>Total Member</h1>
        <p><?php echo $Total_Member;?></p>
    </div>

    <div class="div-content">
        <h1>Total Employee</h1>
        <p><?php echo $Total_Employee;?> </p>
    </div>

    <div class="div-content">
        <h1>Employee Payment</h1>
        <p><?php echo $Total_Emp_Payment;?> &#2547;</p>
    </div>

    <div class="div-content">
        <h1>Final Cost</h1>
        <p><?php echo $Total_Emp_Payment+$Total_Investment;?> &#2547;</p>
    </div>
</section>