<?php
session_start();
include "../_connect.php";
if($_SESSION['staffLogin'] != true){
    header("location: stafflogin.php");
    die;
}

$hyrSql = "UPDATE hyr SET `AntalKm`='".$_POST['totalKm']."', `Kostnad`='".$_POST['totalCost']."', `Bensinkostnad`='".$_POST['fuel']."' WHERE `KundId`=".$_POST['KundId']." AND `Regnr`='".$_POST['regnr']."' AND `Bokningsdatum`='".$_POST['bookingDate']."'";
$hyrRes = mysqli_query($conn, $hyrSql);
$bilSql = "UPDATE bil SET `Matarstallning`='".$_POST['kmIn']."' WHERE `Regnr`='".$_POST['regnr']."'";
$bilRes = mysqli_query($conn, $bilSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciept</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section class="to-pay">
        <h1 class="heading" style="margin-top:10px;"><span>Reciept</span></h1>
        <div class="pay-container">
            <p>Customer Id: <span><?php echo $_POST['KundId']?></span></p>
            <p>Customer Name: <span><?php echo $_POST['KundNamn']?></span></p>
            <p>Customer Adress: <span><?php echo $_POST['Adress']?></span></p>
            <p>Customer Post-adress: <span><?php echo $_POST['Postadress']?></span></p>
            <p>Customer contact: <span><?php echo $_POST['Tel']?></span></p>
            <p>Regnr: <span><?php echo $_POST['regnr']?></span></p>
            <p>Booking date: <span><?php echo $_POST['bookingDate']?></span></p>
            <p>Out date: <span><?php echo $_POST['outDate']?></span></p>
            <p>Entry date: <span><?php echo $_POST['entryDate']?></span></p>
            <p>Rent type: <span><?php echo $_POST['hyrtyp']?></span></p>
            <p>Total days: <span><?php echo $_POST['totalDays']?></span></p>
            <p>Number of km driven: <span><?php echo $_POST['totalKm'];?></span></p>
            <p>Insurance: <span><?php echo $_POST['totalInsurance'];?></span></p>
            <p>Rent Cost: <span><?php echo $_POST['totalRent'];?></span></p>
            <p>Km cost: <span><?php echo $_POST['kmCost'];?></span></p>
            <p>Km cost: <span><?php echo $_POST['fuel'];?></span></p>
            <p>Total cost: <span><?php echo $_POST['totalCost']?></span></p>
        </div>
    </section>
</body>
</html>