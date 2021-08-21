<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$val = $_REQUEST['Category_value'];
$SELECT = "SELECT * FROM Subcategory WHERE category_name = '$val'";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            echo '<option value="'.$row['subcat_name'].'">'.$row['subcat_name'].'</option>';
        }

        mysqli_free_result($result);
        DB_Connection_Close($connection);
    }
}



?>