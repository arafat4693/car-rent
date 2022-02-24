<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true){
        header("location: stafflogin.php");
    }
    $customerId = $_POST['customerId'];
    $regnr = $_POST['regnr'];
    $customerSql = "SELECT * FROM kund WHERE KundId = '$customerId'";
    $customerRes = mysqli_query($conn, $customerSql);
    $customerRow = mysqli_fetch_assoc($customerRes);

    $gruppSql = "SELECT *, Forsakring, Korttiddygn, korttidkm, Veckoslut, Veckoslutkm, Veckoslutfri FROM bil INNER JOIN gruppbet ON bil.Gruppbet = gruppbet.Gruppbet WHERE bil.Regnr = '$regnr'";
    $gruppRes = mysqli_query($conn, $gruppSql);
    $gruppRow = mysqli_fetch_assoc($gruppRes);
    switch ($_POST['hyrtyp']){
        case 'korttid':
            $kmCost = (intval($gruppRow['korttidkm'])*intval($_POST['totalDays']));
            break;
        case 'veckoslut':
            $kmCost = (intval($gruppRow['Veckoslutkm'])*$_POST['totalDays']);
            break;
        case 'veckoslutfri':
            $kmCost = (intval($gruppRow['Veckoslutfri']));
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To pay</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section class="to-pay">
    <h1 class="heading" style="margin-top:10px;">To <span>Pay</span></h1>
        <div class="pay-container">
            <div class="customerInfo">
                <p>Customer Id: <span><?php echo $customerRow['KundId']?></span></p>
                <p>Customer Name: <span><?php echo $customerRow['KundNamn']?></span></p>
                <p>Customer Adress: <span><?php echo $customerRow['Adress']?></span></p>
                <p>Customer Post-adress: <span><?php echo $customerRow['Postadress']?></span></p>
                <p>Customer contact: <span><?php echo $customerRow['Tel']?></span></p>
            </div>
            <div class="rentInfo">
                <p>Regnr: <span><?php echo $_POST['regnr']?></span></p>
                <p>Booking date: <span><?php echo $_POST['bookingDate']?></span></p>
                <p>Out date: <span><?php echo $_POST['outDate']?></span></p>
                <p>Entry date: <span><?php echo $_POST['entryDate']?></span></p>
                <p>Rent type: <span><?php echo $_POST['hyrtyp']?></span></p>
                <p>Total days: <span><?php echo $_POST['totalDays']?></span></p>
                <p>Number of km: <span><?php echo $_POST['numberOfKm']?></span></p>
            </div>
            <div class="costInfo">
                <p>Insurance: <span><?php echo intval($gruppRow['Forsakring'])*$_POST['totalDays'];?></span></p>
                <p>Total days: <span><?php echo intval($gruppRow['Forsakring'])*$_POST['totalDays'];?></span></p>
                <p>Km cost: <span><?php echo $kmCost;?></span></p>
            </div>
        </div>
    </section>
</body>
</html>