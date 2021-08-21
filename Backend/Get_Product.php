<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();
$p_id = floatval($_REQUEST['id']);
$SELECT = "SELECT * FROM Products WHERE p_id = '{$p_id}'";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        $product = new stdClass();
        $product->id = $row['p_id'];
        $product->name = $row['p_name'];
        $product->price = $row['p_unit_selling_price'];
        $product->quantity = 1;

        $myJSON = json_encode($product);
        echo $myJSON;
        //echo $row['p_id'].'#'.$row['p_name'].'#'.$row['p_unit_selling_price'].'#';

        mysqli_free_result($result);
        DB_Connection_Close($connection);
    }
}

?>