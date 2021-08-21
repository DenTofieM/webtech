<?php

include "../Database/DB_Connector.php";

$connection = DB_Connection_Start();

$e_id = mysqli_real_escape_string($connection, $_REQUEST['e_id']);
$e_password = $_REQUEST['e_password'];
$e_name = mysqli_real_escape_string($connection, $_REQUEST['e_name']);
$e_degsignation = mysqli_real_escape_string($connection, $_REQUEST['e_degsignation']);
$e_email = mysqli_real_escape_string($connection, $_REQUEST['e_email']);
$e_phone = mysqli_real_escape_string($connection, $_REQUEST['e_phone']);
$e_payment = mysqli_real_escape_string($connection, $_REQUEST['e_payment']);
$e_payment = floatval($e_payment);
$e_date_of_birth = $_REQUEST['e_date_of_birth'];
$e_blood_group = mysqli_real_escape_string($connection, $_REQUEST['e_blood_group']);
$e_nid_or_bc = mysqli_real_escape_string($connection, $_REQUEST['e_nid_or_bc']);
$e_father_name = mysqli_real_escape_string($connection, $_REQUEST['e_father_name']);
$e_mother_name = mysqli_real_escape_string($connection, $_REQUEST['e_mother_name']);
$e_present_address = mysqli_real_escape_string($connection, $_REQUEST['e_present_address']);
$e_permanent_address = mysqli_real_escape_string($connection, $_REQUEST['e_permanent_address']);

if(!empty($e_id) && !empty($e_name) && !empty($e_degsignation) && !empty($e_email) && !empty($e_phone) && !empty($e_payment) && !empty($e_date_of_birth) && !empty($e_blood_group) && !empty($e_nid_or_bc) && !empty($e_father_name) && !empty($e_mother_name)  && !empty($e_present_address) && !empty($e_permanent_address)){
    
    if(isset($_FILES['e_image'])){
        $img_name = $_FILES['e_image']['name'];
        $img_type = $_FILES['e_image']['type'];
        $tmp_name = $_FILES['e_image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extentions = ['png', 'jpeg', 'jpg'];

        if(in_array($img_ext, $extentions)===true){
            $date = date('dmy');
            $time = time();
            $new_img_name = $date.'_'.$time.'.'.$img_ext;

            if(move_uploaded_file($tmp_name, "storage/".$new_img_name)){
                $INSERT = "INSERT INTO employees(e_id, e_name, e_degsignation, e_email, e_phone, e_payment, e_date_of_birth, e_blood_group, e_nid_or_bc, e_father_name, e_mother_name, e_present_address, e_permanent_address, e_password, e_image) VALUES ('{$e_id}', '{$e_name}' , '{$e_degsignation}' , '{$e_email}', '{$e_phone}' , {$e_payment} , '{$e_date_of_birth}', '{$e_blood_group}', '{$e_nid_or_bc}', '{$e_father_name}', '{$e_mother_name}', '{$e_present_address}', '{$e_permanent_address}', '{$e_password}', '{$new_img_name}')";

                $SELECT = mysqli_query($connection, $INSERT);
                if($SELECT){
                    echo "Employee added successfully";
                }
                else echo "something wrong here.please check!";
            }
        }
    }
}
else echo "Some information missing. please fill all requirememt.";


?>