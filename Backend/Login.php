<?php
include "../Database/DB_Connector.php";

if(!empty($_POST['user_id']) && !empty($_POST['password'])){
    
    $user_id = $_REQUEST['user_id'];
    $user_pass = $_REQUEST['password'];

    session_start();
    
    if($user_id == "Admin" && $user_pass == "Admin"){
        $_SESSION['active_user'] = 'admin';
        $_SESSION['designation'] = "admin";
        echo "admin";
    }else{
        $user = "employee";
        for($i = 0; $i<strlen($user_id); $i++){
            if($user_id[$i]=='@'){
                $user = "customer";
                break;
            }
        }

        $connection = DB_Connection_Start();

        if($user == "customer"){
            $SELECT = "SELECT * FROM Customers WHERE c_email = '{$user_id}'";
            if($result = mysqli_query($connection, $SELECT)){
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result);
                    if($row['c_password'] == $user_pass){
                        $_SESSION['active_user'] = $user_id;
                        $_SESSION['designation'] = "customer";
                        $_SESSION['add_cart'] = 0;
                        echo "customer";
                    }else{
                        echo "Sorry, Invalid password!!!";
                    }
                    mysqli_free_result($result);
                    DB_Connection_Close($connection);
                }else{
                    echo "This email address is not register";
                }
            }
        }else if($user == "employee"){
            $SELECT = "SELECT * FROM Employees WHERE e_id = '{$user_id}'";
            if($result = mysqli_query($connection, $SELECT)){
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result);
                    if($row['e_password'] == $user_pass){
                        $_SESSION['active_user'] = $user_id;
                        $_SESSION['designation'] = "employee";
                        echo "employee";
                    }else{
                        echo "Sorry, Invalid password!!!";
                    }
                    mysqli_free_result($result);
                    DB_Connection_Close($connection);
                }else{
                    echo "This email address is not register";
                }
            }
        }else{
            echo "Sorry, Invalid User ID!!!";
        }
    }
}else{
    echo "User ID and Password must be needed!!";
}

?>