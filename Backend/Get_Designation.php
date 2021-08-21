<?php

session_start();

if(isset($_SESSION['designation'] )){
    $des  = $_SESSION['designation'] ;
    if($des == "employee"){
        echo "employee";
    }else if($des == "customer"){
        echo "customer";
    }else if($des == "admin"){
        echo "admin";
    }
}else{
    echo "sorry";
}

?>