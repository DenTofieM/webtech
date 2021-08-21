<?php 
session_start();
if(empty($_SESSION['active_user'])){
    header("location: Page_Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile Page</title>
</head>
<body>
    <a href="../../Backend/Logout.php?logout_id=<?php echo $_SESSION['active_user'];?>">Logout</a>
    <a href="Page_Home.php">Home</a>
    <h1>User Session is <b><?php echo $_SESSION['active_user'];?></b></h1>
    <?php
        include "../../Database/DB_Connector.php";
        $connection = DB_Connection_Start();
        $user = $_SESSION['active_user'];
        $SELECT = "SELECT * FROM Employees WHERE e_id = '{$user}'";

        if($result = mysqli_query($connection, $SELECT)){
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
    ?>
    <ul>
        <li><img src="../../Backend/storage/<?php echo $row['e_image'];?>" height="120px" width="90px"> </li>
        <li>Name: <?php echo $row['e_name'];?></li>
        <li>Email: <?php echo $row['e_email'];?></li>
        <li>Phone: <?php echo $row['e_phone'];?></li>
    </ul>

    <?php
                mysqli_free_result($result);
                DB_Connection_Close($connection);
            }
        }
    ?>

</body>
</html>