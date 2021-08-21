<?php
session_start();
include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$order = json_decode($_REQUEST['Order']);
//echo $order->product_list;

$INSERT = "INSERT INTO orders(customer_id, order_products_list, order_price, order_status) VALUES('{$order->customer_id}', '{$order->product_list}', {$order->total_price}, '{$order->status}')";

$SELECT = mysqli_query($connection, $INSERT);
if($SELECT){
    echo "Order added successfully";
    $_SESSION['add_cart'] = 0;
}
else echo "something wrong here.please check!";
DB_Connection_Close($connection);

?>