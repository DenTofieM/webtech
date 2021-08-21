<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$SELECT = "SELECT * FROM Category";
if($result = mysqli_query($connection, $SELECT)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            echo '<a href="#Category'.$row['cat_id'].'" class="icon-a dashboard"> &nbsp;&nbsp;'.$row['cat_name'].'</a>';
        }
        mysqli_free_result($result);
        DB_Connection_Close($connection);
    }
}

?>