<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true || ($_SESSION['staffLogin'] == true && $_SESSION['grupp'] != 'ekonom')){
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
    <title>ekonom</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="buttons">
        <a href="statistic.php" class="btn">Statistic</a>
        <a href="../admin/customers.php" class="btn">customers</a>
        <a href="../admin/cars.php" class="btn">cars</a>
        <a href="../admin/pricegroup.php" class="btn">price</a>
        <a href="../kundmottagning/index.php" class="btn">rented</a>
        <a href="index.php?logout=true" class="btn">log out</a>
    </div>
</body>
</html>