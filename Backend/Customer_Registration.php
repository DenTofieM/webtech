<?php

include "../Database/DB_Connector.php";

$user_name = $_REQUEST['user_name'];
$user_email = $_REQUEST['user_email'];
$user_phone = $_REQUEST['user_phone'];
$user_password = $_REQUEST['user_password'];
$confirm_password= $_REQUEST['user_con_password'];

if($user_password === $confirm_password){
    $connection = DB_Connection_Start();
    $SELECT = "SELECT c_email FROM Customers WHERE c_email = '{$user_email}'";

    if($result = mysqli_query($connection, $SELECT)){
        if(mysqli_num_rows($result) == 0){
            // This email is not exit yet in database
            $user_image = "";

            if(isset($_FILES['user_image'])){
                $img_name = $_FILES['user_image']['name'];
                $img_type = $_FILES['user_image']['type'];
                $tmp_name = $_FILES['user_image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extentions = ['png', 'jpeg', 'jpg'];

                if(in_array($img_ext, $extentions)===true){
                    $date = date('dmy');
                    $time = time();
                    $user_image = $date.'_'.$time.'.'.$img_ext;

                    if(move_uploaded_file($tmp_name, "storage/".$user_image)){
                        $INSERT = "INSERT INTO Customers(c_name, c_email, c_phone, c_password, c_image) VALUES('{$user_name}', '{$user_email}', '{$user_phone}', '{$user_password}', '{$user_image}')";
        
                        $SELECT = mysqli_query($connection, $INSERT);
                        if($SELECT){
                            echo "Registration successfully done.";
                        }
                        else{
                            echo "Something went wrong!!! Please check again.";
                        }
                    }

                }else{
                    echo "Your image format is not valid. Please input a valid image.";
                }
            }else{
                $user_image = "";
                $INSERT = "INSERT INTO Customers(c_name, c_email, c_phone, c_password, c_image) VALUES('{$user_name}', '{$user_email}', '{$user_phone}', '{$user_password}', '{$user_image}')";
        
                $SELECT = mysqli_query($connection, $INSERT);
                if($SELECT){
                    echo "Registration successfully done.";
                }
                else{
                    echo "Something went wrong!!! Please check again.";
                }
            }

            mysqli_free_result($result);
            DB_Connection_Close($connection);
        }else{
            echo "This email address is already registered";
        }
    }
}else{
    echo "Your password doesn't match!!!";
}


?>