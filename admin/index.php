<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true || ($_SESSION['staffLogin'] == true && $_SESSION['grupp'] != 'admin')){
        header("location: ../kundmottagning/stafflogin.php");
        die;
    }
    if(isset($_GET['logout'])){
        $_SESSION['staffLogin'] = false;
        header("location: ../kundmottagning/stafflogin.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="buttons">
        <a href="users.php" class="btn">users</a>
        <a href="customers.php" class="btn">customers</a>
        <a href="cars.php" class="btn">cars</a>
        <a href="pricegroup.php" class="btn">price</a>
        <a href="../kundmottagning/index.php" class="btn">rented</a>
        <a href="index.php?logout=true" class="btn">log out</a>
    </div>
</body>
</html>