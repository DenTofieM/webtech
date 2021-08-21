<?php
session_start();
if(isset($_SESSION['active_user']) && $_SESSION['active_user'] !== "admin"){
    header("location: Page_Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../CSS/Style_Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div id="mySidenav" class="sidenav">
        <p class="logo"><span>ARAF</span> GROUP</p>
      <a href="#" class="icon-a dash-btn"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
      <a href="#" class="icon-a product-btn"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Products</a>
      <a href="#" class="icon-a customer-btn"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Customers</a>
      <a href="#" class="icon-a order-btn"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
      <a href="#" class="icon-a employee-btn"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Employees</a>
      
    </div>

    <section class="body-part">
        <nav>
            <div class="reorder">
                <i class="fa fa-reorder"></i>
            </div>
    
            <div class="side-top">
                <img src="../Asset/admin-side.jpg">
                <div>
                    <span><b>Atiya Khan</b></span><br>
                    <span>Admin / Owner</span>
                </div>

                <div class="sign-out">
                    <i class="fa fa-sign-out"></i>
                </div>
            </div>
        </nav>

        <section class="main-content">
                  <?php 
                    include "Page_Dash.php";
                  ?>      
        </section>
    </section>

    <script src="../JS/SignOut.js"></script>
    <script src="../JS/Product.js"></script>
    <script src="../JS/Employee.js"></script>
    <script src="../JS/Customer.js"></script>
    <script src="../JS/Order.js"></script>
    <script src="../JS/Dash.js"></script>
    <script>
    </script>
    
</body>
</html>