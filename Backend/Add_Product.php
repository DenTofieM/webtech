<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$category = $_REQUEST['category'];
$sub_category = $_REQUEST['sub_category'];
$p_name = mysqli_real_escape_string($connection, $_REQUEST['p_name']);
$buying_price = mysqli_real_escape_string($connection, $_REQUEST['p_buying_price']);
$buying_price = floatval($buying_price);
$selling_price = mysqli_real_escape_string($connection, $_REQUEST['p_selling_price']);
$selling_price = floatval($selling_price);
$quantity = mysqli_real_escape_string($connection, $_REQUEST['p_quantity']);
$quantity = floatval($quantity);
$unit = $_REQUEST['p_unit'];
$brand = mysqli_real_escape_string($connection, $_REQUEST['p_brand']);
$description = mysqli_real_escape_string($connection, $_REQUEST['p_description']);

if(!empty($category) && !empty($sub_category) && !empty($p_name) && !empty($buying_price) && !empty($selling_price) && !empty($quantity) && !empty($unit) && !empty($brand) && !empty($description)){
    if(isset($_FILES['p_image'])){
        $img_name = $_FILES['p_image']['name'];
        $img_type = $_FILES['p_image']['type'];
        $tmp_name = $_FILES['p_image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extentions = ['png', 'jpeg', 'jpg'];

        if(in_array($img_ext, $extentions)===true){
            $date = date('dmy');
            $time = time();
            $new_img_name = $date.'_'.$time.'.'.$img_ext;

            if(move_uploaded_file($tmp_name, "storage/".$new_img_name)){
                $INSERT = "INSERT INTO products(p_name, p_category, p_subcategory, p_unit_buying_price, p_unit_selling_price, p_available_amount, p_unit, p_brand, p_description, p_image) VALUES ('{$p_name}', '{$category}' , '{$sub_category}' , {$buying_price} , {$selling_price} , {$quantity} , '{$unit}' , '{$brand}', '{$description}' , '{$new_img_name}')";

                $SELECT = mysqli_query($connection, $INSERT);
                if($SELECT){
                    echo "Product added successfully";
                }
                else echo "something wrong here.please check!";
            }
        }
    }
}
else echo "Some information missing. please fill all requirememt.";
DB_Connection_Close($connection);

?>