<?php

session_start();
if($_SESSION['active_user']){
    if(isset($_GET['logout_id'])){
        unset($_SESSION['active_user']);
        unset($_SESSION['designation']);
        session_destroy();
        header("location: ../Frontend/Pages/Page_Login.php");
    }else{
        echo "error";
    }
}

?>